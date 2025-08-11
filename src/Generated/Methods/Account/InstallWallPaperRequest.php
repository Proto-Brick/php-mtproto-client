<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputWallPaper;
use DigitalStars\MtprotoClient\Generated\Types\Base\WallPaperSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.installWallPaper
 */
final class InstallWallPaperRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfeed5769;
    
    public string $_ = 'account.installWallPaper';
    
    public function getMethodName(): string
    {
        return 'account.installWallPaper';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputWallPaper $wallpaper
     * @param WallPaperSettings $settings
     */
    public function __construct(
        public readonly AbstractInputWallPaper $wallpaper,
        public readonly WallPaperSettings $settings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->wallpaper->serialize();
        $buffer .= $this->settings->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}