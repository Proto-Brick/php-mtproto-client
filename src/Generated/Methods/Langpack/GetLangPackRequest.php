<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Langpack;

use DigitalStars\MtprotoClient\Generated\Types\Base\LangPackDifference;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/langpack.getLangPack
 */
final class GetLangPackRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf2f2330a;
    
    public string $_ = 'langpack.getLangPack';
    
    public function getMethodName(): string
    {
        return 'langpack.getLangPack';
    }
    
    public function getResponseClass(): string
    {
        return LangPackDifference::class;
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