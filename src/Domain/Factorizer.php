<?php
namespace DigitalStars\MtprotoClient\Domain;

use Exception;
use phpseclib3\Math\BigInteger;
use DigitalStars\MtprotoClient\Exception\FactorizationException;
use FFI;
use Throwable;

class Factorizer
{
    private const REMOTE_FACTORIZER_URL = 'http://127.0.0.1:8000/factorize';

    private static ?FFI $ffi = null;
    private static bool $ffiAttempted = false;

    /**
     * Разлагает число на два простых множителя p и q.
     * Использует наилучший доступный метод в заданном порядке.
     *
     * @param BigInteger $pq Число для факторизации.
     * @return array|null Массив [p, q] или null.
     * @throws FactorizationException
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
                        } catch (FFI\Exception) {
                            self::$ffi = null;
                        }
                    }
                }
            }
        }

        // Если FFI успешно инициализирован, используем его
        if (self::$ffi !== null) {
            $p_val = self::$ffi->factorizeFFI($pq->__toString());
            return self::checkAndReturnFactors($pq, $p_val);
        }

        return null;
    }


    private static function tryFactorCommand(BigInteger $pq): ?array
    {
        if (PHP_OS_FAMILY === 'Windows' || !function_exists('shell_exec')) {
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
        } catch (Throwable) {
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
            $p = new BigInteger($p_val);
            if ($p->compare($pq) >= 0) {
                return null;
            } // Множитель не может быть >= числа

            [$q] = $pq->divide($p);

            if ($pq->equals($p->multiply($q))) {
                return $p->compare($q) < 0 ? [$p, $q] : [$q, $p];
            }
        } catch (Exception) {
            return null; // Ошибка преобразования в BigInteger
        }

        return null;
    }
}