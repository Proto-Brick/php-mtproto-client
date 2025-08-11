<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionSetChatWallPaper
 */
final class MessageActionSetChatWallPaper extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x5060a3f4;
    
    public string $_ = 'messageActionSetChatWallPaper';
    
    /**
     * @param AbstractWallPaper $wallpaper
     * @param bool|null $same
     * @param bool|null $forBoth
     */
    public function __construct(
        public readonly AbstractWallPaper $wallpaper,
        public readonly ?bool $same = null,
        public readonly ?bool $forBoth = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->same) $flags |= (1 << 0);
        if ($this->forBoth) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->wallpaper->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $same = ($flags & (1 << 0)) ? true : null;
        $forBoth = ($flags & (1 << 1)) ? true : null;
        $wallpaper = AbstractWallPaper::deserialize($stream);
        return new self(
            $wallpaper,
            $same,
            $forBoth
        );
    }
}