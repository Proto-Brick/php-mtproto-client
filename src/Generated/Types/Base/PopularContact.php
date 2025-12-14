<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/popularContact
 */
final class PopularContact extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5ce14175;
    
    public string $predicate = 'popularContact';
    
    /**
     * @param int $clientId
     * @param int $importers
     */
    public function __construct(
        public readonly int $clientId,
        public readonly int $importers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->clientId);
        $buffer .= Serializer::int32($this->importers);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $clientId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $importers = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $clientId,
            $importers
        );
    }
}