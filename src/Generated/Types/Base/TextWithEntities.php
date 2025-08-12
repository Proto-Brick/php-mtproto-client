<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/textWithEntities
 */
final class TextWithEntities extends TlObject
{
    public const CONSTRUCTOR_ID = 0x751f3146;
    
    public string $predicate = 'textWithEntities';
    
    /**
     * @param string $text
     * @param list<AbstractMessageEntity> $entities
     */
    public function __construct(
        public readonly string $text,
        public readonly array $entities
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::vectorOfObjects($this->entities);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $text = Deserializer::bytes($stream);
        $entities = Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']);

        return new self(
            $text,
            $entities
        );
    }
}