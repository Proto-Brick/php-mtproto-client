<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaDocument
 */
final class InputMediaDocument extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 860303448;
    
    public string $_ = 'inputMediaDocument';
    
    /**
     * @param AbstractInputDocument $id
     * @param bool|null $spoiler
     * @param int|null $ttlSeconds
     * @param string|null $query
     */
    public function __construct(
        public readonly AbstractInputDocument $id,
        public readonly ?bool $spoiler = null,
        public readonly ?int $ttlSeconds = null,
        public readonly ?string $query = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->spoiler) $flags |= (1 << 2);
        if ($this->ttlSeconds !== null) $flags |= (1 << 0);
        if ($this->query !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->id->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->ttlSeconds);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->query);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $spoiler = ($flags & (1 << 2)) ? true : null;
        $id = AbstractInputDocument::deserialize($deserializer, $stream);
        $ttlSeconds = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $query = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
            return new self(
            $id,
            $spoiler,
            $ttlSeconds,
            $query
        );
    }
}