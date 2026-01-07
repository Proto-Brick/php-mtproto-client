<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStarGiftAuction
 */
final class InputStarGiftAuction extends AbstractInputStarGiftAuction
{
    public const CONSTRUCTOR_ID = 0x2e16c98;
    
    public string $predicate = 'inputStarGiftAuction';
    
    /**
     * @param int $giftId
     */
    public function __construct(
        public readonly int $giftId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->giftId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $giftId = Deserializer::int64($__payload, $__offset);

        return new self(
            $giftId
        );
    }
}