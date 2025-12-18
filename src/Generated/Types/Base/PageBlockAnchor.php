<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockAnchor
 */
final class PageBlockAnchor extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0xce0d37b0;
    
    public string $predicate = 'pageBlockAnchor';
    
    /**
     * @param string $name
     */
    public function __construct(
        public readonly string $name
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->name);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $name = Deserializer::bytes($__payload, $__offset);

        return new self(
            $name
        );
    }
}