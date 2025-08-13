<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/importedContact
 */
final class ImportedContact extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc13e3c50;
    
    public string $predicate = 'importedContact';
    
    /**
     * @param int $userId
     * @param int $clientId
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $clientId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int64($this->clientId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $userId = Deserializer::int64($stream);
        $clientId = Deserializer::int64($stream);

        return new self(
            $userId,
            $clientId
        );
    }
}