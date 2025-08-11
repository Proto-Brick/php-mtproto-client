<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Langpack;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractLangPackString;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/langpack.getStrings
 */
final class GetStringsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xefea3803;
    
    public string $_ = 'langpack.getStrings';
    
    public function getMethodName(): string
    {
        return 'langpack.getStrings';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . AbstractLangPackString::class . '>';
    }
    /**
     * @param string $langPack
     * @param string $langCode
     * @param list<string> $keys
     */
    public function __construct(
        public readonly string $langPack,
        public readonly string $langCode,
        public readonly array $keys
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->langPack);
        $buffer .= Serializer::bytes($this->langCode);
        $buffer .= Serializer::vectorOfStrings($this->keys);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}