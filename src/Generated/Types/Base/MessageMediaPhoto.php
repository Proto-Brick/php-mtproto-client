<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageMediaPhoto
 */
final class MessageMediaPhoto extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0x695150d7;
    
    public string $predicate = 'messageMediaPhoto';
    
    /**
     * @param true|null $spoiler
     * @param AbstractPhoto|null $photo
     * @param int|null $ttlSeconds
     */
    public function __construct(
        public readonly ?true $spoiler = null,
        public readonly ?AbstractPhoto $photo = null,
        public readonly ?int $ttlSeconds = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->spoiler) $flags |= (1 << 3);
        if ($this->photo !== null) $flags |= (1 << 0);
        if ($this->ttlSeconds !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->photo->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->ttlSeconds);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $spoiler = ($flags & (1 << 3)) ? true : null;
        $photo = ($flags & (1 << 0)) ? AbstractPhoto::deserialize($stream) : null;
        $ttlSeconds = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;

        return new self(
            $spoiler,
            $photo,
            $ttlSeconds
        );
    }
}