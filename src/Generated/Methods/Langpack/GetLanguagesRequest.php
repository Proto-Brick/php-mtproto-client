<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Langpack;

use DigitalStars\MtprotoClient\Generated\Types\Base\LangPackLanguage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/langpack.getLanguages
 */
final class GetLanguagesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x42c6978f;
    
    public string $predicate = 'langpack.getLanguages';
    
    public function getMethodName(): string
    {
        return 'langpack.getLanguages';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . LangPackLanguage::class . '>';
    }
    /**
     * @param string $langPack
     */
    public function __construct(
        public readonly string $langPack
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->langPack);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}