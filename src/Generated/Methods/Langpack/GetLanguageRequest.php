<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Langpack;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractLangPackLanguage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/langpack.getLanguage
 */
final class GetLanguageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1784243458;
    
    public string $_ = 'langpack.getLanguage';
    
    public function getMethodName(): string
    {
        return 'langpack.getLanguage';
    }
    
    public function getResponseClass(): string
    {
        return AbstractLangPackLanguage::class;
    }
    /**
     * @param string $langPack
     * @param string $langCode
     */
    public function __construct(
        public readonly string $langPack,
        public readonly string $langCode
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->langPack);
        $buffer .= $serializer->bytes($this->langCode);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}