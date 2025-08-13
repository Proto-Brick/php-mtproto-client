<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messageRange
 */
final class MessageRange extends TlObject
{
    public const CONSTRUCTOR_ID = 0xae30253;
    
    public string $predicate = 'messageRange';
    
    /**
     * @param int $minId
     * @param int $maxId
     */
    public function __construct(
        public readonly int $minId,
        public readonly int $maxId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->minId);
        $buffer .= Serializer::int32($this->maxId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $minId = Deserializer::int32($stream);
        $maxId = Deserializer::int32($stream);

        return new self(
            $minId,
            $maxId
        );
    }
}