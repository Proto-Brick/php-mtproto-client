<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient;

use DigitalStars\MtprotoClient\Transport\TransportProtocol;

/**
 * Неизменяемый DTO для хранения настроек клиента.
 * Соответствует принципам: Immutability, Конфигурируемость.
 */
final readonly class Settings
{
    public function __construct(
        public int $api_id,
        public string $api_hash,
        public string $server_address = '149.154.167.50',
        public int $server_port = 443,
        public TransportProtocol $transport = TransportProtocol::Intermediate,
        public int $connect_timeout_seconds = 5,
        public int $read_timeout_seconds = 30,
        public int $write_timeout_seconds = 30,
        public int $reconnect_initial_delay_ms = 200,
        public int $reconnect_max_delay_ms = 5000,
        public float $reconnect_backoff_multiplier = 2.0,
    ) {}
}
