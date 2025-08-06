<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputSingleMedia
 */
final class InputSingleMedia extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1cc6e91f;
    
    public string $_ = 'inputSingleMedia';
    
    /**
     * @param AbstractInputMedia $media
     * @param int $randomId
     * @param string $message
     * @param list<AbstractMessageEntity>|null $entities
     */
    public function __construct(
        public readonly AbstractInputMedia $media,
        public readonly int $randomId,
        public readonly string $message,
        public readonly ?array $entities = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->entities !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->media->serialize($serializer);
        $buffer .= $serializer->int64($this->randomId);
        $buffer .= $serializer->bytes($this->message);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfObjects($this->entities);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $media = AbstractInputMedia::deserialize($deserializer, $stream);
        $randomId = $deserializer->int64($stream);
        $message = $deserializer->bytes($stream);
        $entities = ($flags & (1 << 0)) ? $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        return new self(
            $media,
            $randomId,
            $message,
            $entities
        );
    }
}