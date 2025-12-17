<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/webPageEmpty
 */
final class WebPageEmpty extends AbstractWebPage
{
    public const CONSTRUCTOR_ID = 0x211a1788;
    
    public string $predicate = 'webPageEmpty';
    
    /**
     * @param int $id
     * @param string|null $url
     */
    public function __construct(
        public readonly int $id,
        public readonly ?string $url = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->url !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->url);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $id = Deserializer::int64($__payload, $__offset);
        $url = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $id,
            $url
        );
    }
}