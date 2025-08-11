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
    public const CONSTRUCTOR_ID = 0x33473058;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->spoiler) $flags |= (1 << 2);
        if ($this->ttlSeconds !== null) $flags |= (1 << 0);
        if ($this->query !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->id->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->ttlSeconds);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->query);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $spoiler = ($flags & (1 << 2)) ? true : null;
        $id = AbstractInputDocument::deserialize($stream);
        $ttlSeconds = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $query = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        return new self(
            $id,
            $spoiler,
            $ttlSeconds,
            $query
        );
    }
}