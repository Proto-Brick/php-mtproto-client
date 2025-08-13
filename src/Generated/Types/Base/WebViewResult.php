<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/webViewResultUrl
 */
final class WebViewResult extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4d22ff98;
    
    public string $predicate = 'webViewResultUrl';
    
    /**
     * @param string $url
     * @param true|null $fullsize
     * @param true|null $fullscreen
     * @param int|null $queryId
     */
    public function __construct(
        public readonly string $url,
        public readonly ?true $fullsize = null,
        public readonly ?true $fullscreen = null,
        public readonly ?int $queryId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->fullsize) {
            $flags |= (1 << 1);
        }
        if ($this->fullscreen) {
            $flags |= (1 << 2);
        }
        if ($this->queryId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->queryId);
        }
        $buffer .= Serializer::bytes($this->url);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $fullsize = (($flags & (1 << 1)) !== 0) ? true : null;
        $fullscreen = (($flags & (1 << 2)) !== 0) ? true : null;
        $queryId = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($stream) : null;
        $url = Deserializer::bytes($stream);

        return new self(
            $url,
            $fullsize,
            $fullscreen,
            $queryId
        );
    }
}