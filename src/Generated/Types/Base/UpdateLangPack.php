<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateLangPack
 */
final class UpdateLangPack extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 1442983757;
    
    public string $_ = 'updateLangPack';
    
    /**
     * @param AbstractLangPackDifference $difference
     */
    public function __construct(
        public readonly AbstractLangPackDifference $difference
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->difference->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $difference = AbstractLangPackDifference::deserialize($deserializer, $stream);
            return new self(
            $difference
        );
    }
}