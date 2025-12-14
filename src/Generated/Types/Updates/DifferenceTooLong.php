<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Updates;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updates.differenceTooLong
 */
final class DifferenceTooLong extends AbstractDifference
{
    public const CONSTRUCTOR_ID = 0x4afe8f6d;
    
    public string $predicate = 'updates.differenceTooLong';
    
    /**
     * @param int $pts
     */
    public function __construct(
        public readonly int $pts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->pts);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $pts = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $pts
        );
    }
}