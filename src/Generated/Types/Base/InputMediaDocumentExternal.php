<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaDocumentExternal
 */
final class InputMediaDocumentExternal extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0x779600f9;
    
    public string $predicate = 'inputMediaDocumentExternal';
    
    /**
     * @param string $url
     * @param true|null $spoiler
     * @param int|null $ttlSeconds
     * @param AbstractInputPhoto|null $videoCover
     * @param int|null $videoTimestamp
     */
    public function __construct(
        public readonly string $url,
        public readonly ?true $spoiler = null,
        public readonly ?int $ttlSeconds = null,
        public readonly ?AbstractInputPhoto $videoCover = null,
        public readonly ?int $videoTimestamp = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->spoiler) $flags |= (1 << 1);
        if ($this->ttlSeconds !== null) $flags |= (1 << 0);
        if ($this->videoCover !== null) $flags |= (1 << 2);
        if ($this->videoTimestamp !== null) $flags |= (1 << 3);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->url);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->ttlSeconds);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->videoCover->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->videoTimestamp);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $spoiler = ($flags & (1 << 1)) ? true : null;
        $url = Deserializer::bytes($stream);
        $ttlSeconds = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $videoCover = ($flags & (1 << 2)) ? AbstractInputPhoto::deserialize($stream) : null;
        $videoTimestamp = ($flags & (1 << 3)) ? Deserializer::int32($stream) : null;

        return new self(
            $url,
            $spoiler,
            $ttlSeconds,
            $videoCover,
            $videoTimestamp
        );
    }
}