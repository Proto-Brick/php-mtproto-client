<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starsGiveawayWinnersOption
 */
final class StarsGiveawayWinnersOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0x54236209;
    
    public string $predicate = 'starsGiveawayWinnersOption';
    
    /**
     * @param int $users
     * @param int $perUserStars
     * @param true|null $default_
     */
    public function __construct(
        public readonly int $users,
        public readonly int $perUserStars,
        public readonly ?true $default_ = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->default_) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->users);
        $buffer .= Serializer::int64($this->perUserStars);
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
        $default_ = (($flags & (1 << 0)) !== 0) ? true : null;
        $users = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $perUserStars = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $users,
            $perUserStars,
            $default_
        );
    }
}