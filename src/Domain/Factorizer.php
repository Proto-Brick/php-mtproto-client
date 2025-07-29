<?php
// File: src/MTProto/Factorizer.php

namespace DigitalStars\MtprotoClient\Domain;

use Brick\Math\BigInteger;
use DigitalStars\MtprotoClient\Exception\FactorizationException;
use FFI;

class Factorizer
{
    private const REMOTE_FACTORIZER_URL = 'http://127.0.0.1:8000/factorize'; // URL вашего будущего микросервиса

    private static ?FFI $ffi = null;
    private static bool $ffiAttempted = false;

    /**
     * Разлагает число на два простых множителя p и q.
     * Использует наилучший доступный метод в заданном порядке.
     *
     * @param BigInteger $pq Число для факторизации.
     * @return array|null Массив [p, q] или null.
     */
    public static function factorize(BigInteger $pq): ?array
    {
        // 1. Попытка через кастомный C++ модуль FFI (самый быстрый ~5мс)
        if ($result = self::tryFfi($pq)) {
            return $result;
        }

        // 2. Попытка через нативную команду Linux 'factor' (быстро, если доступно ~5мс)
        if ($result = self::tryFactorCommand($pq)) {
            return $result;
        }

        // 3. Попытка через удаленный сервис (резервный вариант)
        if ($result = self::tryRemoteService($pq)) {
            return $result;
        }

        throw new FactorizationException(self::generateFailureMessage());
    }

    private static function generateFailureMessage(): string
    {
        $suggestions = [];

        // --- Диагностика FFI ---
        if (!extension_loaded("ffi")) {
            $php_version = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION;
            if (PHP_OS_FAMILY === 'Linux') {
                $suggestions[] = "Установите PHP-расширение FFI: `sudo apt install php{$php_version}-ffi` (для Debian/Ubuntu).";
            } else {
                $suggestions[] = "Включите расширение FFI в вашем php.ini (раскомментируйте `extension=ffi`).";
            }
        } elseif (!in_array(ini_get('ffi.enable'), ['true', '1', 'On'], true)) {
            $ini_path = php_ini_loaded_file() ?: 'вашем php.ini';
            $suggestions[] = "Включите FFI в '{$ini_path}', установив `ffi.enable = 1`.";
        }

        // --- Диагностика 'factor' (только для Linux) ---
        // Проверяем, доступна ли команда 'factor'
        if ((PHP_OS_FAMILY === 'Linux') && !shell_exec('command -v factor')) {
            $suggestions[] = "Установите системную утилиту 'factor' для более быстрой работы: `sudo apt install coreutils`.";
        }

        // --- Общий резервный вариант ---
        $suggestions[] = "Укажите URL вашего API через `Factorizer::setRemoteFactorizerUrl()`. API должен по GET-запросу `?number={число}` возвращать JSON: `{\"p\": \"...\", \"q\": \"...\"}`.";

        $message = "Не удалось найти быстрый метод для факторизации.\n" .
            "Пожалуйста, выполните одно из наиболее подходящих для вашей системы действий:\n";

        foreach ($suggestions as $suggestion) {
            $message .= "- {$suggestion}\n";
        }

        return $message."\n";
    }

    /**
     * Пытается факторизовать через FFI, используя вашу проверенную логику.
     */
    private static function tryFfi(BigInteger $pq): ?array
    {
        // Инициализируем FFI только один раз
        if (!self::$ffiAttempted) {
            self::$ffiAttempted = true;
            if (extension_loaded("ffi")) {
                // Пытаемся включить FFI, если он выключен
                if (!in_array(ini_get('ffi.enable'), ['true', '1', 'On'], true)) {
                    @ini_set('ffi.enable', 'On');
                }

                if (in_array(ini_get('ffi.enable'), ['true', '1', 'On'], true)) {
                    // Определяем сигнатуру нашей C++ функции
                    $header = "int64_t factorizeFFI(const char* number_str);";
                    $library_path = null;

                    if (PHP_OS_FAMILY === 'Windows') {
                        $library_path = dirname(__DIR__) . '/cpp/primemodule.dll';

                        // ВАШ ХАК для путей с не-ASCII символами на Windows
                        if ($library_path && preg_match('/[^\x20-\x7E]/', $library_path)) {
                            $short_path = exec('for %I in ("' . $library_path . '") do @echo %~sI');
                            if ($short_path && file_exists($short_path)) {
                                $library_path = $short_path;
                            }
                        }

                    } elseif (PHP_OS_FAMILY === 'Linux') {
                        $library_path = dirname(__DIR__) . '/cpp/libprimemodule.so';
                    }

                    if ($library_path && file_exists($library_path)) {
                        try {
                            self::$ffi = FFI::cdef($header, $library_path);
                        } catch (FFI\Exception $e) {
                            self::$ffi = null;
                        }
                    }
                }
            }
        }

        // Если FFI успешно инициализирован, используем его
        if (self::$ffi !== null) {
            $p_val = self::$ffi->factorizeFFI($pq->__toString());
            echo "DEBUG: FFI функция вернула: " . var_export($p_val, true) . "\n";
            return self::checkAndReturnFactors($pq, $p_val);
        }

        return null;
    }


    private static function tryFactorCommand(BigInteger $pq): ?array
    {
        if (stripos(PHP_OS, 'WIN') === 0 || !function_exists('shell_exec')) {
            return null;
        }
        // escapeshellarg для безопасности
        $command = 'factor ' . escapeshellarg($pq->__toString());
        $output = shell_exec($command);

        if (!$output) {
            return null;
        }

        // "factor" выводит: "12345: 3 5 823"
        $parts = explode(' ', trim($output));
        if (count($parts) !== 3) { // Ожидаем два простых сомножителя
            return null;
        }

        return self::checkAndReturnFactors($pq, $parts[1]);
    }

    private static function tryPythonScript(BigInteger $pq): ?array
    {
        if (!function_exists('shell_exec')) {
            return null;
        }

        $scriptPath = __DIR__ . '/../../prime_solver.py'; // Путь к скрипту
        if (!file_exists($scriptPath)) {
            return null;
        }

        $command = 'python3 ' . escapeshellarg($scriptPath) . ' ' . escapeshellarg($pq->__toString());
        $output = shell_exec($command);

        if (!$output || !is_numeric(trim($output))) {
            return null;
        }

        return self::checkAndReturnFactors($pq, trim($output));
    }

    // На удивление рабочее решение, но 40с на рабочем ноуте на WSL
    // На винде еще в разы дольше
    /* private static function tryPurePhp(BigInteger $pq): ?array
    {
        if ($pq->isEven()) {
            return self::checkAndReturnFactors($pq, 2);
        }

        $one = BigInteger::one();
        $y = BigInteger::of(2);
        $c = BigInteger::of(1);
        $m = BigInteger::of(100);

        $g = $one;
        $r = $one;
        $q = $one;

        $max_iterations = 50; // Ограничение, чтобы не уйти в бесконечный цикл
        $i = 0;

        while ($g->isEqualTo($one) && $i++ < $max_iterations) {
            $x = $y;
            for ($j = 0; $j < (int)$r->toBase(10); $j++) {
                $y = $y->multipliedBy($y)->plus($c)->remainder($pq);
            }
            $k = 0;
            while ($k < (int)$r->toBase(10) && $g->isEqualTo($one)) {
                $ys = $y;
                $limit = min((int)$m->toBase(10), (int)$r->minus($k)->toBase(10));
                for ($j = 0; $j < $limit; $j++) {
                    $y = $y->multipliedBy($y)->plus($c)->remainder($pq);
                    $q = $q->multipliedBy($x->minus($y)->abs())->remainder($pq);
                }
                $g = self::gcd($q, $pq);
                $k += (int)$m->toBase(10);
            }
            $r = $r->multipliedBy(2);
        }

        if ($g->isEqualTo($pq)) {
            $g = $one;
            while ($g->isEqualTo($one)) {
                $ys = $ys->multipliedBy($ys)->plus($c)->remainder($pq);
                $g = self::gcd($x->minus($ys)->abs(), $pq);
            }
        }

        return self::checkAndReturnFactors($pq, $g->toBase(10));
    }

    private static function gcd(BigInteger $a, BigInteger $b): BigInteger
    {
        return $b->isZero() ? $a : self::gcd($b, $a->remainder($b));
    } */

    private static function tryRemoteService(BigInteger $pq): ?array
    {
        // Это заглушка для вашего будущего сервиса.
        // Он должен принимать GET-запрос с параметром 'number'
        // и возвращать JSON вида {"p": "...", "q": "..."}
        try {
            $url = self::REMOTE_FACTORIZER_URL . '?number=' . $pq->__toString();
            $response = @file_get_contents($url); // @, чтобы подавить ошибки, если сервис недоступен

            if (!$response) {
                return null;
            }

            $json = json_decode($response, true);
            if (!isset($json['p'])) {
                return null;
            }

            return self::checkAndReturnFactors($pq, $json['p']);
        } catch (\Throwable $e) {
            return null;
        }
    }

    /**
     * Вспомогательный метод для проверки множителя и возврата пары [p, q]
     */
    private static function checkAndReturnFactors(BigInteger $pq, $p_val): ?array
    {
        if (!$p_val || $p_val <= 1) {
            return null;
        }

        try {
            $p = BigInteger::of($p_val);
            if ($p->isGreaterThanOrEqualTo($pq)) {
                return null;
            } // Множитель не может быть >= числа

            $q = $pq->dividedBy($p);

            if ($pq->isEqualTo($p->multipliedBy($q))) {
                return $p->isLessThan($q) ? [$p, $q] : [$q, $p];
            }
        } catch (\Exception $e) {
            return null; // Ошибка преобразования в BigInteger
        }

        return null;
    }
}