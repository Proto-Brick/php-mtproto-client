<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient;

use ProtoBrick\MTProtoClient\Logger\LogChannel;
use ProtoBrick\MTProtoClient\Transport\TransportProtocol;
use Psr\Log\LogLevel;

/**
 * Immutable DTO for client configuration.
 * Follows principles: Immutability, Configurability.
 */
final readonly class Settings
{
    public function __construct(
        public int $api_id,
        public string $api_hash,
        // Default DC 2 IP (Europe)
        public string $server_address = '149.154.167.50',
        public int $server_port = 443,
        public TransportProtocol $transport = TransportProtocol::Abridged,
        public string $logger_level = LogLevel::INFO,
        public array $logger_channels = [
            LogChannel::APP,
            LogChannel::NET,
            LogChannel::AUTH,
            LogChannel::SESSION,
//            LogChannel::STORAGE,
//            LogChannel::RPC,
//            LogChannel::CRYPTO,
//            LogChannel::PEER,
//            LogChannel::SERVICE,
//            LogChannel::UPDATE
        ],
        public int $connect_timeout_seconds = 5,
        public int $read_timeout_seconds = 30,
        public int $write_timeout_seconds = 30,
        public int $reconnect_initial_delay_ms = 200,
        public int $reconnect_max_delay_ms = 5000,
        public float $reconnect_backoff_multiplier = 2.0,

        /**
         * Whether to use Obfuscated2 protocol (avoids DPI blocking).
         */
        public bool $use_obfuscation = false,

        /**
         * Secret for MTProxy (hex string or raw bytes), if applicable.
         */
        public ?string $obfuscation_secret = null,

        /**
         * The DC ID we are connecting to.
         * Important for Obfuscated2 handshake validation.
         */
        public int $dc_id = 2,
    ) {}
}