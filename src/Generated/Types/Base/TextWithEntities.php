<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/textWithEntities
 */
final class TextWithEntities extends AbstractTextWithEntities
{
    public const CONSTRUCTOR_ID = 1964978502;
    
    public string $_ = 'textWithEntities';
    
    /**
     * @param string $text
     * @param list<AbstractMessageEntity> $entities
     */
    public function __construct(
        public readonly string $text,
        public readonly array $entities
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->text);
        $buffer .= $serializer->vectorOfObjects($this->entities);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $text = $deserializer->bytes($stream);
        $entities = $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']);
            return new self(
            $text,
            $entities
        );
    }
}