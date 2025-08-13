<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/receivedNotifyMessage
 */
final class ReceivedNotifyMessage extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa384b779;
    
    public string $predicate = 'receivedNotifyMessage';
    
    /**
     * @param int $id
     * @param int $flags
     */
    public function __construct(
        public readonly int $id,
        public readonly int $flags
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int32($this->flags);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $id = Deserializer::int32($stream);
        $flags = Deserializer::int32($stream);

        return new self(
            $id,
            $flags
        );
    }
}