<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Updates;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updates.state
 */
final class State extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa56c2a3e;
    
    public string $predicate = 'updates.state';
    
    /**
     * @param int $pts
     * @param int $qts
     * @param int $date
     * @param int $seq
     * @param int $unreadCount
     */
    public function __construct(
        public readonly int $pts,
        public readonly int $qts,
        public readonly int $date,
        public readonly int $seq,
        public readonly int $unreadCount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->qts);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->seq);
        $buffer .= Serializer::int32($this->unreadCount);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $pts = Deserializer::int32($stream);
        $qts = Deserializer::int32($stream);
        $date = Deserializer::int32($stream);
        $seq = Deserializer::int32($stream);
        $unreadCount = Deserializer::int32($stream);

        return new self(
            $pts,
            $qts,
            $date,
            $seq,
            $unreadCount
        );
    }
}