<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Langpack;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractLangPackDifference;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/langpack.getDifference
 */
final class GetDifferenceRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3449309861;
    
    public string $_ = 'langpack.getDifference';
    
    public function getMethodName(): string
    {
        return 'langpack.getDifference';
    }
    
    public function getResponseClass(): string
    {
        return AbstractLangPackDifference::class;
    }
    /**
     * @param string $langPack
     * @param string $langCode
     * @param int $fromVersion
     */
    public function __construct(
        public readonly string $langPack,
        public readonly string $langCode,
        public readonly int $fromVersion
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->langPack);
        $buffer .= $serializer->bytes($this->langCode);
        $buffer .= $serializer->int32($this->fromVersion);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}