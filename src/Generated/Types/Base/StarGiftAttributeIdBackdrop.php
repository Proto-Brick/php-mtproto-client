<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starGiftAttributeIdBackdrop
 */
final class StarGiftAttributeIdBackdrop extends AbstractStarGiftAttributeId
{
    public const CONSTRUCTOR_ID = 0x1f01c757;
    
    public string $predicate = 'starGiftAttributeIdBackdrop';
    
    /**
     * @param int $backdropId
     */
    public function __construct(
        public readonly int $backdropId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->backdropId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $backdropId = Deserializer::int32($stream);

        return new self(
            $backdropId
        );
    }
}