<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Logger;

use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;

final class ConsoleLogger extends AbstractLogger
{
    private const LEVEL_PRIORITY = [
        LogLevel::DEBUG => 100, LogLevel::INFO => 200, LogLevel::NOTICE => 250,
        LogLevel::WARNING => 300, LogLevel::ERROR => 400, LogLevel::CRITICAL => 500,
        LogLevel::ALERT => 550, LogLevel::EMERGENCY => 600,
    ];

    private const C_RESET  = "\033[0m";
    private const C_GRAY   = "\033[90m";
    private const C_WHITE  = "\033[97m";
    private const C_YELLOW = "\033[33m";
    private const C_CYAN   = "\033[36m";
    private const C_RED    = "\033[31m";

    private const LEVEL_COLORS = [
        LogLevel::DEBUG     => "\033[36m",
        LogLevel::INFO      => "\033[32m",
        LogLevel::NOTICE    => "\033[34m",
        LogLevel::WARNING   => "\033[33m",
        LogLevel::ERROR     => "\033[31m",
        LogLevel::CRITICAL  => "\033[1;31m",
        LogLevel::ALERT     => "\033[1;31m",
        LogLevel::EMERGENCY => "\033[1;31m",
    ];

    private const CHANNEL_COLORS = [
        'net'     => "\033[36m", 'rpc' => "\033[35m", 'auth' => "\033[33m",
        'session' => "\033[34m", 'default' => "\033[37m",
    ];

    private int $minPriority;

    public function __construct(string $minLevel = LogLevel::INFO)
    {
        $this->minPriority = self::LEVEL_PRIORITY[$minLevel] ?? 200;
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $priority = self::LEVEL_PRIORITY[$level] ?? 0;
        if ($priority < $this->minPriority) {
            return;
        }

        $message = (string)$message;
        $message = str_replace(
            ['→', '←'],
            [self::C_CYAN . '→' . self::C_RESET, self::C_CYAN . '←' . self::C_RESET], // Можете заменить на C_GREEN для ←
            $message
        );

        // --- 1. ТАЙМШТАМП, УРОВЕНЬ, КАНАЛ ---
        $time = (new \DateTimeImmutable())->format('H:i:s.v');
        $colTime = self::C_GRAY . $time . self::C_RESET;

        $lvlColor = self::LEVEL_COLORS[$level] ?? self::C_WHITE;
        $colLevel = $lvlColor . strtoupper(substr($level, 0, 4)) . self::C_RESET;

        $chanRaw = $context['channel'] ?? 'APP';
        if ($chanRaw instanceof \UnitEnum) $chanRaw = $chanRaw->value;
        unset($context['channel']);

        $chanColor = self::CHANNEL_COLORS[$chanRaw] ?? self::CHANNEL_COLORS['default'];
        $colChan = $chanColor . str_pad(strtoupper((string)$chanRaw), 7) . self::C_RESET;

        // --- 2. ОБРАБОТКА ИСКЛЮЧЕНИЙ ---
        if (isset($context['exception']) && $context['exception'] instanceof \Throwable) {
            $context['error'] = $context['exception']->getMessage();
            unset($context['exception']);
        }

        // --- 3. ЦВЕТ СООБЩЕНИЯ (Красный для ошибок) ---
        $isError = $priority >= 400;
        $msgColor = $isError ? self::C_RED : self::C_WHITE;
        $msgStr = $msgColor . $message . self::C_RESET;

        // --- 4. КОНТЕКСТ ---
        $ctxStr = '';
        if (!empty($context)) {
            $parts = [];
            foreach ($context as $k => $v) {
                if ($v === null) continue;

                if ($k === 'error') {
                    // Ошибку красим целиком в красный (и ключ, и значение)
                    $parts[] = sprintf("%s%s=%s%s", self::C_RED, $k, $v, self::C_RESET);
                } else {
                    $parts[] = sprintf("%s%s=%s%s", self::C_GRAY, $k, self::C_RESET, $this->formatVal($v));
                }
            }
            $arrow = self::C_GRAY . " » " . self::C_RESET;
            $ctxStr = $arrow . implode('  ', $parts);
        }

        $sep = self::C_GRAY . ' | ' . self::C_RESET;

        $line = sprintf(
            "%s %s %s %s %s %s %s%s\n",
            $colTime, $sep, $colLevel, $sep, $colChan, $sep, $msgStr, $ctxStr
        );

        $stream = $priority >= 400 ? STDERR : STDOUT;
        fwrite($stream, $line);
        fflush($stream);
    }

    private function formatVal(mixed $v): string
    {
        if (is_bool($v)) return $v ? 'true' : 'false';

        // Покраска чисел и системных величин (желтый)
        // Убираем запятые из регекса (просто цифры с точкой)
        if (is_int($v) || is_float($v) || (is_string($v) && preg_match('/^\d+(\.\d+)?(ms|KB|B|MB)$/', $v))) {
            return self::C_YELLOW . str_replace(',', '', (string)$v) . self::C_RESET;
        }

        if (is_string($v)) {
            // Если в строке есть (n=...), подсветим число внутри желтым
            if (str_contains($v, '(n=')) {
                $v = preg_replace_callback('/\(n=(\d+)\)/', function($m) {
                    return "(n=" . self::C_YELLOW . $m[1] . self::C_CYAN . ")";
                }, $v);
            }
            return self::C_CYAN . $v . self::C_RESET;
        }

        return json_encode($v, JSON_UNESCAPED_UNICODE);
    }
}