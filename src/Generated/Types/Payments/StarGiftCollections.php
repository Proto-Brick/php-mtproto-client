<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\StarGiftCollection;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.starGiftCollections
 */
final class StarGiftCollections extends AbstractStarGiftCollections
{
    public const CONSTRUCTOR_ID = 0x8a2932f3;
    
    public string $predicate = 'payments.starGiftCollections';
    
    /**
     * @param list<StarGiftCollection> $collections
     */
    public function __construct(
        public readonly array $collections
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->collections);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $collections = Deserializer::vectorOfObjects($stream, [StarGiftCollection::class, 'deserialize']);

        return new self(
            $collections
        );
    }
}