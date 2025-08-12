<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Bots\PreviewInfo;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.getPreviewInfo
 */
final class GetPreviewInfoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x423ab3ad;
    
    public string $predicate = 'bots.getPreviewInfo';
    
    public function getMethodName(): string
    {
        return 'bots.getPreviewInfo';
    }
    
    public function getResponseClass(): string
    {
        return PreviewInfo::class;
    }
    /**
     * @param AbstractInputUser $bot
     * @param string $langCode
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly string $langCode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::bytes($this->langCode);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}