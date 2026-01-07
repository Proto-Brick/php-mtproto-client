<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/webPageNotModified
 */
final class WebPageNotModified extends AbstractWebPage
{
    public const CONSTRUCTOR_ID = 0x7311ca11;
    
    public string $predicate = 'webPageNotModified';
    
    /**
     * @param int|null $cachedPageViews
     */
    public function __construct(
        public readonly ?int $cachedPageViews = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->cachedPageViews !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->cachedPageViews);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $cachedPageViews = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $cachedPageViews
        );
    }
}