<?php

namespace ProtoBrick\MTProtoClient\Crypto;

use ProtoBrick\MTProtoClient\Exception\FactorizationException;
use Exception;

class Factorizer
{
    /**
     * Decomposes a number into two prime factors p and q.
     *
     * @param int|string $pq Number to factorize (up to 2^63 - 1).
     * @return int[] Array [p, q], where p < q.
     * @throws FactorizationException
     */
    public static function factorize(int|string $pq): array
    {
        $target = (int)$pq;

        // Check for 64-bit int overflow
        if ((string)$target !== (string)$pq) {
            throw new FactorizationException("Number exceeds 64-bit integer limit (" . PHP_INT_MAX . ").");
        }

        // Attempt via native Linux 'factor' command (~1ms Linux)
        if ($result = self::tryFactorCommand($target)) {
            return $result;
        }

        /**
         * @see https://github.com/Tak-Pesar/tgcrypto
         */
        if ($result = self::tryTgCrypto($target)) {
            return $result;
        }

        // Attempt via GMP (~100ms Windows, ~100ms Linux)
        if ($result = self::tryGmp($target)) {
            return $result;
        }

        // Attempt via Native PHP (~700ms Windows, ~200ms Linux)
        if ($result = self::tryNative($target)) {
            return $result;
        }

        throw new FactorizationException(self::generateFailureMessage());
    }

    private static function generateFailureMessage(): string
    {
        $message = "Failed to factorize the number.\n";
        if (!extension_loaded('gmp')) {
            $message .= "Recommendation: Install the PHP GMP extension.\n";
        }
        if (PHP_OS_FAMILY === 'Linux' && !shell_exec('command -v factor')) {
            $message .= "Recommendation: Install the system 'factor' utility (coreutils).\n";
        }
        return $message;
    }

    private static function tryFactorCommand(int $pq): ?array
    {
        if (PHP_OS_FAMILY === 'Windows' || !function_exists('shell_exec')) {
            return null;
        }

        $output = shell_exec('factor ' . escapeshellarg((string)$pq));
        if (!$output) {
            return null;
        }

        $parts = explode(' ', trim($output));
        if (count($parts) < 3) {
            return null;
        }

        return self::checkAndReturnFactors($pq, (int)$parts[1]);
    }

    /**
     * @see https://github.com/Tak-Pesar/tgcrypto
     */
    private static function tryTgCrypto(int $pq): ?array
    {
        if (!function_exists('tg_factorize')) {
            return null;
        }

        try {
            $factors = array_values(\tg_factorize($pq));

            if (!isset($factors[0])) {
                return null;
            }

            return self::checkAndReturnFactors($pq, (int)$factors[0]);
        } catch (Exception) {
            return null;
        }
    }

    private static function tryGmp(int $pq): ?array
    {
        if (!extension_loaded('gmp')) {
            return null;
        }

        try {
            $p_val = self::pollardGmp($pq);
            return self::checkAndReturnFactors($pq, (int)$p_val);
        } catch (Exception) {
            return null;
        }
    }

    private static function tryNative(int $pq): ?array
    {
        try {
            $p_val = self::pollardNative($pq);
            return self::checkAndReturnFactors($pq, $p_val);
        } catch (Exception) {
            return null;
        }
    }

    private static function checkAndReturnFactors(int $pq, int $p): ?array
    {
        if ($p <= 1 || $p >= $pq) {
            return null;
        }
        if ($pq % $p !== 0) {
            return null;
        }

        $q = (int)($pq / $p);
        return $p < $q ? [$p, $q] : [$q, $p];
    }

    private static function pollardNative(int $modulus): int
    {
        $gcdVal = 0;

        for ($i = 0; $i < 3; $i++) {
            $q = (mt_rand(0, 127) & 15) + 17;
            $x = mt_rand(0, 1000000000) + 1;
            $y = $x;

            $limit = 1 << ($i + 18);

            for ($j = 1; $j < $limit; $j++) {
                $x = self::modularMulAdd($x, $x, $q, $modulus);

                $diff = ($x < $y) ? ($y - $x) : ($x - $y);
                $gcdVal = self::binaryGcd($diff, $modulus);

                if ($gcdVal !== 1) {
                    break;
                }

                if (($j & ($j - 1)) === 0) {
                    $y = $x;
                }
            }

            if ($gcdVal > 1) {
                break;
            }
        }

        return $gcdVal;
    }

    /**
     * Modular multiplication with addition: (base * multiplier + carry) % modulus.
     * Implements multiplication via addition and bitwise shifts to avoid
     * float overflow when multiplying large ints in PHP.
     */
    private static function modularMulAdd(int $base, int $multiplier, int $carry, int $modulus): int
    {
        while ($multiplier !== 0) {
            if (($multiplier & 1) !== 0) {
                $carry += $base;
                if ($carry >= $modulus) {
                    $carry -= $modulus;
                }
            }

            $base += $base;
            if ($base >= $modulus) {
                $base -= $modulus;
            }

            $multiplier >>= 1;
        }
        return $carry;
    }

    /**
     * Binary GCD algorithm.
     * Works faster than the standard Euclidean algorithm due to bitwise operations.
     */
    private static function binaryGcd(int $a, int $b): int
    {
        if ($a === 0) {
            return $b;
        }
        if ($b === 0) {
            return $a;
        }

        $shift = 0;
        while ((($a | $b) & 1) === 0) {
            $a >>= 1;
            $b >>= 1;
            $shift++;
        }

        while (($a & 1) === 0) {
            $a >>= 1;
        }

        do {
            while (($b & 1) === 0) {
                $b >>= 1;
            }

            if ($a > $b) {
                $temp = $a;
                $a = $b;
                $b = $temp;
            }

            $b -= $a;
        } while ($b !== 0);

        return $a << $shift;
    }

    private static function pollardGmp(int $target): int
    {
        $n = gmp_init($target);
        $one = gmp_init(1);

        $y = gmp_random_range($one, gmp_sub($n, $one));
        $c = gmp_random_range($one, gmp_sub($n, $one));

        $g = $one;
        $r = 1;
        $q = $one;

        $x = $y;

        while (gmp_cmp($g, $one) === 0) {
            $x = $y;

            for ($i = 0; $i < $r; $i++) {
                $y = gmp_mod(gmp_add(gmp_powm($y, gmp_init(2), $n), $c), $n);
            }

            $k = 0;
            while ($k < $r && gmp_cmp($g, $one) === 0) {
                $ys = $y;
                $chunkSize = min(128, $r - $k);

                for ($i = 0; $i < $chunkSize; $i++) {
                    $y = gmp_mod(gmp_add(gmp_powm($y, gmp_init(2), $n), $c), $n);
                    $q = gmp_mod(gmp_mul($q, gmp_abs(gmp_sub($x, $y))), $n);
                }

                $g = gmp_gcd($q, $n);
                $k += $chunkSize;
            }
            $r *= 2;
        }

        if (gmp_cmp($g, $n) === 0) {
            while (true) {
                $ys = gmp_mod(gmp_add(gmp_powm($ys, gmp_init(2), $n), $c), $n);
                $g = gmp_gcd(gmp_abs(gmp_sub($x, $ys)), $n);
                if (gmp_cmp($g, $one) > 0) {
                    break;
                }
            }
        }

        return gmp_intval($g);
    }
}
