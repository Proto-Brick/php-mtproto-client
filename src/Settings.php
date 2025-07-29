<?php declare(strict_types=1);

namespace DigitalStars\MtprotoClient;

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
        public string $transport = 'Intermediate' // Пока используется только этот
    ) {}
}