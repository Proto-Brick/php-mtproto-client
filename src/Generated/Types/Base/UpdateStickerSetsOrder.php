<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateStickerSetsOrder
 */
final class UpdateStickerSetsOrder extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xbb2d201;
    
    public string $predicate = 'updateStickerSetsOrder';
    
    /**
     * @param list<int> $order
     * @param true|null $masks
     * @param true|null $emojis
     */
    public function __construct(
        public readonly array $order,
        public readonly ?true $masks = null,
        public readonly ?true $emojis = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->masks) {
            $flags |= (1 << 0);
        }
        if ($this->emojis) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::vectorOfLongs($this->order);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $masks = (($flags & (1 << 0)) !== 0) ? true : null;
        $emojis = (($flags & (1 << 1)) !== 0) ? true : null;
        $order = Deserializer::vectorOfLongs($stream);

        return new self(
            $order,
            $masks,
            $emojis
        );
    }
}