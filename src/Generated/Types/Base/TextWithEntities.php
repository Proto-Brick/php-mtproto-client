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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $text = $deserializer->bytes($stream);
        $entities = $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']);
        return new self(
            $text,
            $entities
        );
    }
}