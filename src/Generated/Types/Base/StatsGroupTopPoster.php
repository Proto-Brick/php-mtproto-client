<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/statsGroupTopPoster
 */
final class StatsGroupTopPoster extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9d04af9b;
    
    public string $predicate = 'statsGroupTopPoster';
    
    /**
     * @param int $userId
     * @param int $messages
     * @param int $avgChars
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $messages,
        public readonly int $avgChars
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->messages);
        $buffer .= Serializer::int32($this->avgChars);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $userId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $messages = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $avgChars = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $userId,
            $messages,
            $avgChars
        );
    }
}