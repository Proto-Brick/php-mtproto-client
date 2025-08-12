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
    public const CONSTRUCTOR_ID = 0xfb52dc99;
    
    public string $predicate = 'inputMediaDocumentExternal';
    
    /**
     * @param string $url
     * @param true|null $spoiler
     * @param int|null $ttlSeconds
     */
    public function __construct(
        public readonly string $url,
        public readonly ?true $spoiler = null,
        public readonly ?int $ttlSeconds = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->spoiler) $flags |= (1 << 1);
        if ($this->ttlSeconds !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->url);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->ttlSeconds);
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

        return new self(
            $url,
            $spoiler,
            $ttlSeconds
        );
    }
}