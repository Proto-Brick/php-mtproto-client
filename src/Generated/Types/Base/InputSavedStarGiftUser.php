<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputSavedStarGiftUser
 */
final class InputSavedStarGiftUser extends AbstractInputSavedStarGift
{
    public const CONSTRUCTOR_ID = 0x69279795;
    
    public string $predicate = 'inputSavedStarGiftUser';
    
    /**
     * @param int $msgId
     */
    public function __construct(
        public readonly int $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->msgId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $msgId = Deserializer::int32($__payload, $__offset);

        return new self(
            $msgId
        );
    }
}