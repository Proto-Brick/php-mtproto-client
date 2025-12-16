<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateStickerSets
 */
final class UpdateStickerSets extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x31c24808;
    
    public string $predicate = 'updateStickerSets';
    
    /**
     * @param true|null $masks
     * @param true|null $emojis
     */
    public function __construct(
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
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $masks = (($flags & (1 << 0)) !== 0) ? true : null;
        $emojis = (($flags & (1 << 1)) !== 0) ? true : null;

        return new self(
            $masks,
            $emojis
        );
    }
}