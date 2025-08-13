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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $name = Deserializer::bytes($stream);

        return new self(
            $name
        );
    }
}