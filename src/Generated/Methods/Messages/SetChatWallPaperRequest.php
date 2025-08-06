<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputWallPaper;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\WallPaperSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.setChatWallPaper
 */
final class SetChatWallPaperRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8ffacae1;
    
    public string $_ = 'messages.setChatWallPaper';
    
    public function getMethodName(): string
    {
        return 'messages.setChatWallPaper';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param bool|null $forBoth
     * @param bool|null $revert
     * @param AbstractInputWallPaper|null $wallpaper
     * @param WallPaperSettings|null $settings
     * @param int|null $id
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?bool $forBoth = null,
        public readonly ?bool $revert = null,
        public readonly ?AbstractInputWallPaper $wallpaper = null,
        public readonly ?WallPaperSettings $settings = null,
        public readonly ?int $id = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forBoth) $flags |= (1 << 3);
        if ($this->revert) $flags |= (1 << 4);
        if ($this->wallpaper !== null) $flags |= (1 << 0);
        if ($this->settings !== null) $flags |= (1 << 2);
        if ($this->id !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $this->wallpaper->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->settings->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->id);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}