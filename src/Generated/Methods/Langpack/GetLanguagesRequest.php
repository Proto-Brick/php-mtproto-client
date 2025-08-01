<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Langpack;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractLangPackLanguage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/langpack.getLanguages
 */
final class GetLanguagesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1120311183;
    
    public string $_ = 'langpack.getLanguages';
    
    public function getMethodName(): string
    {
        return 'langpack.getLanguages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractLangPackLanguage::class;
    }
    /**
     * @param string $langPack
     */
    public function __construct(
        public readonly string $langPack
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->langPack);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}