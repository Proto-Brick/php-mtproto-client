<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputWallPaper;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWallPaper;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getWallPaper
 */
final class GetWallPaperRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 4237155306;
    
    public string $_ = 'account.getWallPaper';
    
    public function getMethodName(): string
    {
        return 'account.getWallPaper';
    }
    
    public function getResponseClass(): string
    {
        return AbstractWallPaper::class;
    }
    /**
     * @param AbstractInputWallPaper $wallpaper
     */
    public function __construct(
        public readonly AbstractInputWallPaper $wallpaper
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->wallpaper->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}