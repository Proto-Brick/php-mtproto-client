<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Langpack;

use DigitalStars\MtprotoClient\Generated\Types\Base\LangPackLanguage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/langpack.getLanguage
 */
final class GetLanguageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6a596502;
    
    public string $_ = 'langpack.getLanguage';
    
    public function getMethodName(): string
    {
        return 'langpack.getLanguage';
    }
    
    public function getResponseClass(): string
    {
        return LangPackLanguage::class;
    }
    /**
     * @param string $langPack
     * @param string $langCode
     */
    public function __construct(
        public readonly string $langPack,
        public readonly string $langCode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->langPack);
        $buffer .= Serializer::bytes($this->langCode);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}