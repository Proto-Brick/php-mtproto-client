<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputBotAppID
 */
final class InputBotAppID extends AbstractInputBotApp
{
    public const CONSTRUCTOR_ID = 0xa920bd7a;
    
    public string $predicate = 'inputBotAppID';
    
    /**
     * @param int $id
     * @param int $accessHash
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $id = Deserializer::int64($__payload, $__offset);
        $accessHash = Deserializer::int64($__payload, $__offset);

        return new self(
            $id,
            $accessHash
        );
    }
}