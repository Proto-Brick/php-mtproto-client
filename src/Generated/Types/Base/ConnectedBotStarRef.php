<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/connectedBotStarRef
 */
final class ConnectedBotStarRef extends TlObject
{
    public const CONSTRUCTOR_ID = 0x19a13f71;
    
    public string $predicate = 'connectedBotStarRef';
    
    /**
     * @param string $url
     * @param int $date
     * @param int $botId
     * @param int $commissionPermille
     * @param int $participants
     * @param int $revenue
     * @param true|null $revoked
     * @param int|null $durationMonths
     */
    public function __construct(
        public readonly string $url,
        public readonly int $date,
        public readonly int $botId,
        public readonly int $commissionPermille,
        public readonly int $participants,
        public readonly int $revenue,
        public readonly ?true $revoked = null,
        public readonly ?int $durationMonths = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revoked) {
            $flags |= (1 << 1);
        }
        if ($this->durationMonths !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int64($this->botId);
        $buffer .= Serializer::int32($this->commissionPermille);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->durationMonths);
        }
        $buffer .= Serializer::int64($this->participants);
        $buffer .= Serializer::int64($this->revenue);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $revoked = (($flags & (1 << 1)) !== 0) ? true : null;
        $url = Deserializer::bytes($stream);
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $botId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $commissionPermille = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $durationMonths = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;
        $participants = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $revenue = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $url,
            $date,
            $botId,
            $commissionPermille,
            $participants,
            $revenue,
            $revoked,
            $durationMonths
        );
    }
}