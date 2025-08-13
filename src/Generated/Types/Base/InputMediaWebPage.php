<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMediaWebPage
 */
final class InputMediaWebPage extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0xc21b8849;
    
    public string $predicate = 'inputMediaWebPage';
    
    /**
     * @param string $url
     * @param true|null $forceLargeMedia
     * @param true|null $forceSmallMedia
     * @param true|null $optional
     */
    public function __construct(
        public readonly string $url,
        public readonly ?true $forceLargeMedia = null,
        public readonly ?true $forceSmallMedia = null,
        public readonly ?true $optional = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forceLargeMedia) {
            $flags |= (1 << 0);
        }
        if ($this->forceSmallMedia) {
            $flags |= (1 << 1);
        }
        if ($this->optional) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->url);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $forceLargeMedia = (($flags & (1 << 0)) !== 0) ? true : null;
        $forceSmallMedia = (($flags & (1 << 1)) !== 0) ? true : null;
        $optional = (($flags & (1 << 2)) !== 0) ? true : null;
        $url = Deserializer::bytes($stream);

        return new self(
            $url,
            $forceLargeMedia,
            $forceSmallMedia,
            $optional
        );
    }
}