<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateDeleteMessages
 */
final class UpdateDeleteMessages extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xa20db0e5;
    
    public string $predicate = 'updateDeleteMessages';
    
    /**
     * @param list<int> $messages
     * @param int $pts
     * @param int $ptsCount
     */
    public function __construct(
        public readonly array $messages,
        public readonly int $pts,
        public readonly int $ptsCount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfInts($this->messages);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $messages = Deserializer::vectorOfInts($stream);
        $pts = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $ptsCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $messages,
            $pts,
            $ptsCount
        );
    }
}