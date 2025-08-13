<?php

declare(strict_types=1);

use ProtoBrick\MTProtoClient\ClientFactory;
use ProtoBrick\MTProtoClient\Settings;
use ProtoBrick\MTProtoClient\Transport\TransportProtocol;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class TransportProtocolsTest extends TestCase
{
    public static function protocols(): array
    {
        return [
            [TransportProtocol::Abridged],
            [TransportProtocol::Intermediate],
            [TransportProtocol::PaddedIntermediate],
        ];
    }

    #[DataProvider('protocols')]
    public function testGetConfigAcrossProtocols(TransportProtocol $protocol): void
    {
        $settings = new Settings(
            api_id: (int) $_ENV['MT_API_ID'] ?: throw new \RuntimeException('MT_API_ID is not set in .env'),
            api_hash: $_ENV['MT_API_HASH'] ?: throw new \RuntimeException('MT_API_HASH is not set in .env'),
            transport: $protocol,
        );

        $client = ClientFactory::create($settings, __DIR__ . '/../../Tests/session_phpunit_' . strtolower($protocol->value));
        $client->connect();
        $config = $client->help->getConfig();
        self::assertNotNull($config);
    }
}


