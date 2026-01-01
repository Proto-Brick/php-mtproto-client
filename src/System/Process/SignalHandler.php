<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\System\Process;

use Revolt\EventLoop;

class SignalHandler
{
    /** @var string[] ID коллбэков Revolt */
    private array $callbackIds = [];

    /** @var callable[] */
    private array $shutdownHooks = [];

    private bool $shuttingDown = false;

    public function __construct()
    {
        if (PHP_OS_FAMILY === 'Windows') {
            if (function_exists('sapi_windows_set_ctrl_handler')) {
                sapi_windows_set_ctrl_handler(function (int $event) {
                    if ($event === PHP_WINDOWS_EVENT_CTRL_C || $event === PHP_WINDOWS_EVENT_CTRL_BREAK) {
                        // Оборачиваем в defer, чтобы код выполнился в безопасном контексте цикла,
                        // а не в контексте прерывания Windows.
                        EventLoop::defer(function () {
                            $sigInt = defined('SIGINT') ? \SIGINT : 2;
                            $this->handleSignal($sigInt);
                        });
                    }
                });
            }
        } else {
            $signals = [];
            if (defined('SIGINT')) {
                $signals[] = \SIGINT;
            }
            if (defined('SIGTERM')) {
                $signals[] = \SIGTERM;
            }
            if (defined('SIGQUIT')) {
                $signals[] = \SIGQUIT;
            }

            foreach ($signals as $signal) {
                try {
                    $this->callbackIds[] = EventLoop::onSignal($signal, function () use ($signal) {
                        $this->handleSignal($signal);
                    });
                } catch (\Throwable) {}
            }
        }
    }

    public function onShutdown(callable $hook): void
    {
        $this->shutdownHooks[] = $hook;
    }

    private function handleSignal(int $signal): void
    {
        if ($this->shuttingDown) {
            return;
        }
        $this->shuttingDown = true;

        // 2. Отменяем подписку на сигналы, чтобы следующий Ctrl+C убил процесс мгновенно (стандартное поведение CLI)
        foreach ($this->callbackIds as $callbackId) {
            EventLoop::cancel($callbackId);
        }
        $this->callbackIds = [];

        if (PHP_OS_FAMILY === 'Windows' && function_exists('sapi_windows_set_ctrl_handler')) {
            // Удаляем кастомный хендлер, возвращая управление Windows
            sapi_windows_set_ctrl_handler(null);
        }

        foreach ($this->shutdownHooks as $hook) {
            try {
                $hook();
            } catch (\Throwable $e) {
                fprintf(STDERR, "[System] Error in shutdown hook: %s\n", $e->getMessage());
            }
        }

        try {
            $watchdogId = EventLoop::delay(3.0, static function () {
                fprintf(STDERR, "[System] ⚠️ Shutdown timed out (3s). Force killing process.\n");
                exit(1);
            });
            EventLoop::unreference($watchdogId);
        } catch (\Throwable $e) {
        }

        try {
            $driver = EventLoop::getDriver();
            if ($driver->isRunning()) {
                $driver->stop();
            }
        } catch (\Throwable $e) {
            fprintf(STDERR, "[System] Driver stop failed: %s\n", $e->getMessage());
            exit(0);
        }
    }
}