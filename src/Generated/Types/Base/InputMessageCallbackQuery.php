<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMessageCallbackQuery
 */
final class InputMessageCallbackQuery extends AbstractInputMessage
{
    public const CONSTRUCTOR_ID = 0xacfa1a7e;
    
    public string $predicate = 'inputMessageCallbackQuery';
    
    /**
     * @param int $id
     * @param int $queryId
     */
    public function __construct(
        public readonly int $id,
        public readonly int $queryId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int64($this->queryId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $queryId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $id,
            $queryId
        );
    }
}