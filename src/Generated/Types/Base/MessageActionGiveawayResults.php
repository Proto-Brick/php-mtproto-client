<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionGiveawayResults
 */
final class MessageActionGiveawayResults extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x87e2f155;
    
    public string $predicate = 'messageActionGiveawayResults';
    
    /**
     * @param int $winnersCount
     * @param int $unclaimedCount
     * @param true|null $stars
     */
    public function __construct(
        public readonly int $winnersCount,
        public readonly int $unclaimedCount,
        public readonly ?true $stars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->stars) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->winnersCount);
        $buffer .= Serializer::int32($this->unclaimedCount);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $stars = (($flags & (1 << 0)) !== 0) ? true : null;
        $winnersCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $unclaimedCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $winnersCount,
            $unclaimedCount,
            $stars
        );
    }
}