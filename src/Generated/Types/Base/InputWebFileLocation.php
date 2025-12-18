<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputWebFileLocation
 */
final class InputWebFileLocation extends AbstractInputWebFileLocation
{
    public const CONSTRUCTOR_ID = 0xc239d686;
    
    public string $predicate = 'inputWebFileLocation';
    
    /**
     * @param string $url
     * @param int $accessHash
     */
    public function __construct(
        public readonly string $url,
        public readonly int $accessHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int64($this->accessHash);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $url = Deserializer::bytes($__payload, $__offset);
        $accessHash = Deserializer::int64($__payload, $__offset);

        return new self(
            $url,
            $accessHash
        );
    }
}