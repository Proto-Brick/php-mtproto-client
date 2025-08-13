<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateMessageID
 */
final class UpdateMessageID extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x4e90bfd6;
    
    public string $predicate = 'updateMessageID';
    
    /**
     * @param int $id
     * @param int $randomId
     */
    public function __construct(
        public readonly int $id,
        public readonly int $randomId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int64($this->randomId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = Deserializer::int32($stream);
        $randomId = Deserializer::int64($stream);

        return new self(
            $id,
            $randomId
        );
    }
}