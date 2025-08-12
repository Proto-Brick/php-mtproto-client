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
    public const CONSTRUCTOR_ID = 0x56022f4d;
    
    public string $predicate = 'updateLangPack';
    
    /**
     * @param LangPackDifference $difference
     */
    public function __construct(
        public readonly LangPackDifference $difference
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->difference->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $difference = LangPackDifference::deserialize($stream);

        return new self(
            $difference
        );
    }
}