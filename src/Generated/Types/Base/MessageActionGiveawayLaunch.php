<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionGiveawayLaunch
 */
final class MessageActionGiveawayLaunch extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xa80f51e4;
    
    public string $predicate = 'messageActionGiveawayLaunch';
    
    /**
     * @param int|null $stars
     */
    public function __construct(
        public readonly ?int $stars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->stars !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->stars);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $stars = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($stream) : null;

        return new self(
            $stars
        );
    }
}