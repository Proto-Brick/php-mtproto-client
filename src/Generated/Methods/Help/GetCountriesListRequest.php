<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractCountriesList;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getCountriesList
 */
final class GetCountriesListRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x735787a8;
    
    public string $_ = 'help.getCountriesList';
    
    public function getMethodName(): string
    {
        return 'help.getCountriesList';
    }
    
    public function getResponseClass(): string
    {
        return AbstractCountriesList::class;
    }
    /**
     * @param string $langCode
     * @param int $hash
     */
    public function __construct(
        public readonly string $langCode,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->langCode);
        $buffer .= Serializer::int32($this->hash);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}