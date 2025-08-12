<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stickers;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stickers.suggestedShortName
 */
final class SuggestedShortName extends TlObject
{
    public const CONSTRUCTOR_ID = 0x85fea03f;
    
    public string $predicate = 'stickers.suggestedShortName';
    
    /**
     * @param string $shortName
     */
    public function __construct(
        public readonly string $shortName
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->shortName);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $shortName = Deserializer::bytes($stream);

        return new self(
            $shortName
        );
    }
}