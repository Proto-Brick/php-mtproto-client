<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starGiftAttributeBackdrop
 */
final class StarGiftAttributeBackdrop extends AbstractStarGiftAttribute
{
    public const CONSTRUCTOR_ID = 0xd93d859c;
    
    public string $predicate = 'starGiftAttributeBackdrop';
    
    /**
     * @param string $name
     * @param int $backdropId
     * @param int $centerColor
     * @param int $edgeColor
     * @param int $patternColor
     * @param int $textColor
     * @param int $rarityPermille
     */
    public function __construct(
        public readonly string $name,
        public readonly int $backdropId,
        public readonly int $centerColor,
        public readonly int $edgeColor,
        public readonly int $patternColor,
        public readonly int $textColor,
        public readonly int $rarityPermille
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->name);
        $buffer .= Serializer::int32($this->backdropId);
        $buffer .= Serializer::int32($this->centerColor);
        $buffer .= Serializer::int32($this->edgeColor);
        $buffer .= Serializer::int32($this->patternColor);
        $buffer .= Serializer::int32($this->textColor);
        $buffer .= Serializer::int32($this->rarityPermille);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $name = Deserializer::bytes($stream);
        $backdropId = Deserializer::int32($stream);
        $centerColor = Deserializer::int32($stream);
        $edgeColor = Deserializer::int32($stream);
        $patternColor = Deserializer::int32($stream);
        $textColor = Deserializer::int32($stream);
        $rarityPermille = Deserializer::int32($stream);

        return new self(
            $name,
            $backdropId,
            $centerColor,
            $edgeColor,
            $patternColor,
            $textColor,
            $rarityPermille
        );
    }
}