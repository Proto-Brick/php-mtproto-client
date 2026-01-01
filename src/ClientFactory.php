<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient;

use ProtoBrick\MTProtoClient\Auth\Storage\FileAuthKeyStorage;
use ProtoBrick\MTProtoClient\Logger\ConsoleLogger;
use ProtoBrick\MTProtoClient\Logger\InternalLogger;
use ProtoBrick\MTProtoClient\Peer\PeerManager;
use ProtoBrick\MTProtoClient\Peer\Storage\FilePeerStorage;
use ProtoBrick\MTProtoClient\Session\Storage\FileSessionStorage;
use ProtoBrick\MTProtoClient\Session\Storage\SessionStorage;
use Psr\Log\LoggerInterface;

class ClientFactory
{
    /**
     * Creates a fully initialized Client instance with file-based storage.
     *
     * @param Settings $settings Client configuration
     * @param string $storagePath Directory path to store session data (auth keys, peers)
     */
    public static function create(Settings $settings, string $storagePath = './session', ?LoggerInterface $logger = null): Client
    {
        // Ensure storage directory exists
        if (!is_dir($storagePath)) {
            mkdir($storagePath, 0777, true);
        }

        // Initialize persistent storage
        // Note: FileAuthKeyStorage currently stores only one key.
        // In the future, it should support storing keys per DC ID (e.g. auth_dc2.key).
        $authKeyStorage = new FileAuthKeyStorage($storagePath . '/auth.key');

        $peerStorage = new FilePeerStorage($storagePath . '/peers.json');
        $peerManager = new PeerManager($peerStorage);

        $internalLogger = new InternalLogger(
            $logger ?? new ConsoleLogger($settings->logger_level),
            $settings->logger_channels
        );

        $sessionStorage = new FileSessionStorage($storagePath);

        // We no longer need to manually instantiate Transport, Crypto, Session, etc.
        // The Client internals (ConnectionManager) handle this based on Settings.
        return new Client(
            $settings,
            $authKeyStorage,
            $peerManager,
            $sessionStorage,
            $internalLogger
        );
    }
}