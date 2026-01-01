<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Logger;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Умная прослойка для всех логгеров.
 * 1. Фильтрует каналы.
 * 2. Скрывает пароли/коды (Security).
 * 3. Упрощает объекты до строк (Normalization).
 */
final class InternalLogger extends AbstractLogger
{
    private LoggerInterface $targetLogger;
    private array $enabledChannels = [];

    // Поля, которые нужно маскировать
    private const SENSITIVE_FIELDS = [
        'phone_code', 'password', 'new_password',
        'api_hash', 'secret', 'auth_key'
    ];

    public function __construct(?LoggerInterface $targetLogger, array $activeChannels)
    {
        $this->targetLogger = $targetLogger ?? new NullLogger();
        foreach ($activeChannels as $channel) {
            $this->enabledChannels[$channel->value] = true;
        }
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        // 1. Фильтрация по каналу
        if (isset($context['channel']) && $context['channel'] instanceof LogChannel) {
            if (!isset($this->enabledChannels[$context['channel']->value])) {
                return;
            }
            $context['channel'] = $context['channel']->value;
        }

        // 2. Санитизация и нормализация данных
        $context = $this->cleanContext($context);

        $this->targetLogger->log($level, $message, $context);
    }

    /**
     * Рекурсивно очищает и упрощает контекст
     */
    private function cleanContext(array $context): array
    {
        $clean = [];
        foreach ($context as $key => $value) {
            // Маскировка чувствительных данных
            if (in_array($key, self::SENSITIVE_FIELDS, true)) {
                $clean[$key] = '***HIDDEN***';
                continue;
            }

            // Частичная маскировка телефона
            if ($key === 'phone_number' && is_string($value)) {
                $clean[$key] = (strlen($value) > 5)
                    ? substr($value, 0, 4) . '***' . substr($value, -2)
                    : '***';
                continue;
            }

            // Упрощение объектов (чтобы не дампить всё дерево объектов в лог)
            if (is_object($value)) {
                if ($value instanceof \Throwable) {
                    // Вместо передачи объекта, передаем строку или массив,
                    // который гарантированно попадет в логи даже через json_encode
                    $clean[$key] = sprintf(
                        "[%s] %s (at %s:%d)",
                        get_class($value),
                        $value->getMessage(),
                        basename($value->getFile()),
                        $value->getLine()
                    );
                } else {
                    $clean[$key] = $this->summarizeObject($value);
                }
                continue;
            }

            if (is_array($value)) {
                $clean[$key] = $this->cleanContext($value);
                continue;
            }

            $clean[$key] = $value;
        }
        return $clean;
    }

    private function summarizeObject(object $obj): string
    {
        $className = (new \ReflectionClass($obj))->getShortName();
        if (isset($obj->count)) {
            return "{$className} (n={$obj->count})";
        }
        return $className;
    }
}