<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputWallPaper;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWallPaperSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.installWallPaper
 */
final class InstallWallPaperRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 4276967273;
    
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
     * @param AbstractWallPaperSettings $settings
     */
    public function __construct(
        public readonly AbstractInputWallPaper $wallpaper,
        public readonly AbstractWallPaperSettings $settings
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->wallpaper->serialize($serializer);
        $buffer .= $this->settings->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}