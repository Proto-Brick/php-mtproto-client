<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionSetChatWallPaper
 */
final class MessageActionSetChatWallPaper extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x5060a3f4;
    
    public string $predicate = 'messageActionSetChatWallPaper';
    
    /**
     * @param AbstractWallPaper $wallpaper
     * @param true|null $same
     * @param true|null $forBoth
     */
    public function __construct(
        public readonly AbstractWallPaper $wallpaper,
        public readonly ?true $same = null,
        public readonly ?true $forBoth = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->same) {
            $flags |= (1 << 0);
        }
        if ($this->forBoth) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->wallpaper->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $same = (($flags & (1 << 0)) !== 0) ? true : null;
        $forBoth = (($flags & (1 << 1)) !== 0) ? true : null;
        $wallpaper = AbstractWallPaper::deserialize($stream);

        return new self(
            $wallpaper,
            $same,
            $forBoth
        );
    }
}