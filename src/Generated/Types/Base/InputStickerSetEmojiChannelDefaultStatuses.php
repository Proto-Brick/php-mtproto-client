<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStickerSetEmojiChannelDefaultStatuses
 */
final class InputStickerSetEmojiChannelDefaultStatuses extends AbstractInputStickerSet
{
    public const CONSTRUCTOR_ID = 0x49748553;
    
    public string $predicate = 'inputStickerSetEmojiChannelDefaultStatuses';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID

        return new self();
    }
}