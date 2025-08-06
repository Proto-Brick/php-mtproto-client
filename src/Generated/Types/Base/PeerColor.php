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
    
    public string $_ = 'peerColor';
    
    /**
     * @param int|null $color
     * @param int|null $backgroundEmojiId
     */
    public function __construct(
        public readonly ?int $color = null,
        public readonly ?int $backgroundEmojiId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->color !== null) $flags |= (1 << 0);
        if ($this->backgroundEmojiId !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->color);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int64($this->backgroundEmojiId);
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

        $color = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $backgroundEmojiId = ($flags & (1 << 1)) ? $deserializer->int64($stream) : null;
        return new self(
            $color,
            $backgroundEmojiId
        );
    }
}