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
    
    public string $predicate = 'inputSingleMedia';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->entities !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->media->serialize();
        $buffer .= Serializer::int64($this->randomId);
        $buffer .= Serializer::bytes($this->message);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $media = AbstractInputMedia::deserialize($stream);
        $randomId = Deserializer::int64($stream);
        $message = Deserializer::bytes($stream);
        $entities = ($flags & (1 << 0)) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;

        return new self(
            $media,
            $randomId,
            $message,
            $entities
        );
    }
}