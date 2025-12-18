<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/webPagePending
 */
final class WebPagePending extends AbstractWebPage
{
    public const CONSTRUCTOR_ID = 0xb0d13e47;
    
    public string $predicate = 'webPagePending';
    
    /**
     * @param int $id
     * @param int $date
     * @param string|null $url
     */
    public function __construct(
        public readonly int $id,
        public readonly int $date,
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
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $id = Deserializer::int64($__payload, $__offset);
        $url = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $date = Deserializer::int32($__payload, $__offset);

        return new self(
            $id,
            $date,
            $url
        );
    }
}