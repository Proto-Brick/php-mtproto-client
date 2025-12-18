<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageExtendedMedia
 */
final class MessageExtendedMedia extends AbstractMessageExtendedMedia
{
    public const CONSTRUCTOR_ID = 0xee479c64;
    
    public string $predicate = 'messageExtendedMedia';
    
    /**
     * @param AbstractMessageMedia $media
     */
    public function __construct(
        public readonly AbstractMessageMedia $media
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->media->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $media = AbstractMessageMedia::deserialize($__payload, $__offset);

        return new self(
            $media
        );
    }
}