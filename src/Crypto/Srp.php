<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Crypto;

use phpseclib3\Math\BigInteger;
use ProtoBrick\MTProtoClient\Generated\Types\Account\Password;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputCheckPasswordSRP;
use Random\RandomException;

/**
 * Implements the client-side mathematics for Telegram's 2-Factor Authentication.
 *
 * This utility handles the Secure Remote Password (SRP) protocol calculations,
 * allowing the client to prove knowledge of the password without sending it
 * over the network.
 *
 * @see https://core.telegram.org/api/srp
 */
class Srp
{
    /**
     * Computes SRP parameters for Cloud Password (2FA) verification.
     *
     * @param Password $passwordSettings The settings returned by 'account.getPassword'.
     * @param string $password The user's password.
     * @return InputCheckPasswordSRP The prepared object to be sent to 'auth.checkPassword'.
     * @throws RandomException
     */
    public static function compute(Password $passwordSettings, string $password): InputCheckPasswordSRP
    {
        $algo = $passwordSettings->currentAlgo;
        if (!$algo || !str_contains($algo->predicate, 'SHA256ModPow')) {
            throw new \RuntimeException("Unsupported 2FA algorithm: " . ($algo->predicate ?? 'unknown'));
        }

        $salt1 = $algo->salt1;
        $salt2 = $algo->salt2;
        $g_int = $algo->g;
        $p_bin = $algo->p;
        $g_b_bin = $passwordSettings->srpB;
        $srp_id = $passwordSettings->srpId;

        if (!$g_b_bin || !$srp_id) {
            throw new \RuntimeException("Missing SRP parameters (B or ID).");
        }

        $H = static fn(string $data): string => hash('sha256', $data, true);
        $SH = static fn(string $data, string $salt): string => $H($salt . $data . $salt);

        // 1. Calculate x (Password Hash)
        $ph1_res = $SH($SH($password, $salt1), $salt2);
        $pbkdf2 = hash_pbkdf2('sha512', $ph1_res, $salt1, 100000, 64, true);
        $x_bin = $SH($pbkdf2, $salt2);

        $x_bi = new BigInteger($x_bin, 256);
        $p_bi = new BigInteger($p_bin, 256);
        $g_bi = new BigInteger($g_int);
        $g_b_bi = new BigInteger($g_b_bin, 256);

        $p_len = strlen($p_bin);
        $pad = static fn(string $bin) => str_pad($bin, $p_len, "\0", STR_PAD_LEFT);

        $p_bin_padded = $pad($p_bi->toBytes());
        $g_bin_padded = $pad($g_bi->toBytes());

        // 2. k = H(p | g)
        $k_bi = new BigInteger($H($p_bin_padded . $g_bin_padded), 256);

        // 3. g_x = g^x mod p
        $g_x_bi = $g_bi->modPow($x_bi, $p_bi);

        // 4. a = random, A = g^a mod p
        $a_bin = random_bytes(256);
        $a_bi = new BigInteger($a_bin, 256);
        $g_a_bi = $g_bi->modPow($a_bi, $p_bi);

        $g_a_bin_padded = $pad($g_a_bi->toBytes());
        $g_b_bin_padded = $pad($g_b_bi->toBytes());

        // 5. u = H(A | B)
        $u_bi = new BigInteger($H($g_a_bin_padded . $g_b_bin_padded), 256);

        // 6. S = (B - k * g^x)^(a + u * x) mod p
        $k_g_x_bi = $k_bi->multiply($g_x_bi);
        $base_bi = $g_b_bi->subtract($k_g_x_bi);
        $exponent_bi = $a_bi->add($u_bi->multiply($x_bi));

        $s_a_bi = $base_bi->modPow($exponent_bi, $p_bi);
        $s_a_bin_padded = $pad($s_a_bi->toBytes());

        // 7. K = H(S)
        $k_a_bin = $H($s_a_bin_padded);

        // 8. M1 Calculation
        $p_hash = $H($p_bin_padded);
        $g_hash = $H($g_bin_padded);
        $pxorg_hash = $p_hash ^ $g_hash;

        $M1 = $H(
            $pxorg_hash .
            $H($salt1) .
            $H($salt2) .
            $g_a_bin_padded .
            $g_b_bin_padded .
            $k_a_bin
        );

        return new InputCheckPasswordSRP(
            srpId: $srp_id,
            a: $g_a_bin_padded,
            m1: $M1
        );
    }
}
