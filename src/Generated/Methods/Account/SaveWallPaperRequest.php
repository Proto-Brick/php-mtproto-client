<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputWallPaper;
use DigitalStars\MtprotoClient\Generated\Types\Base\WallPaperSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.saveWallPaper
 */
final class SaveWallPaperRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6c5a5b37;
    
    public string $_ = 'account.saveWallPaper';
    
    public function getMethodName(): string
    {
        return 'account.saveWallPaper';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputWallPaper $wallpaper
     * @param bool $unsave
     * @param WallPaperSettings $settings
     */
    public function __construct(
        public readonly AbstractInputWallPaper $wallpaper,
        public readonly bool $unsave,
        public readonly WallPaperSettings $settings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->wallpaper->serialize();
        $buffer .= ($this->unsave ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        $buffer .= $this->settings->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}