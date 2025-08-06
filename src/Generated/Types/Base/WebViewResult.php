<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/webViewResultUrl
 */
final class WebViewResult extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4d22ff98;
    
    public string $_ = 'webViewResultUrl';
    
    /**
     * @param string $url
     * @param bool|null $fullsize
     * @param bool|null $fullscreen
     * @param int|null $queryId
     */
    public function __construct(
        public readonly string $url,
        public readonly ?bool $fullsize = null,
        public readonly ?bool $fullscreen = null,
        public readonly ?int $queryId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->fullsize) $flags |= (1 << 1);
        if ($this->fullscreen) $flags |= (1 << 2);
        if ($this->queryId !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int64($this->queryId);
        }
        $buffer .= $serializer->bytes($this->url);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $fullsize = ($flags & (1 << 1)) ? true : null;
        $fullscreen = ($flags & (1 << 2)) ? true : null;
        $queryId = ($flags & (1 << 0)) ? $deserializer->int64($stream) : null;
        $url = $deserializer->bytes($stream);
        return new self(
            $url,
            $fullsize,
            $fullscreen,
            $queryId
        );
    }
}