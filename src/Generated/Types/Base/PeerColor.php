<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/peerColor
 */
final class PeerColor extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb54b5acf;
    
    public string $predicate = 'peerColor';
    
    /**
     * @param int|null $color
     * @param int|null $backgroundEmojiId
     */
    public function __construct(
        public readonly ?int $color = null,
        public readonly ?int $backgroundEmojiId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->color !== null) $flags |= (1 << 0);
        if ($this->backgroundEmojiId !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->color);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int64($this->backgroundEmojiId);
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
        $color = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $backgroundEmojiId = ($flags & (1 << 1)) ? Deserializer::int64($stream) : null;

        return new self(
            $color,
            $backgroundEmojiId
        );
    }
}