<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputWallPaper;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWallPaperSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.saveWallPaper
 */
final class SaveWallPaperRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1817860919;
    
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
     * @param AbstractWallPaperSettings $settings
     */
    public function __construct(
        public readonly AbstractInputWallPaper $wallpaper,
        public readonly bool $unsave,
        public readonly AbstractWallPaperSettings $settings
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->wallpaper->serialize($serializer);
        $buffer .= ($this->unsave ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        $buffer .= $this->settings->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}