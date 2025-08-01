<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Updates;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updates.state
 */
final class State extends AbstractState
{
    public const CONSTRUCTOR_ID = 2775329342;
    
    public string $_ = 'updates.state';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->pts);
        $buffer .= $serializer->int32($this->qts);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int32($this->seq);
        $buffer .= $serializer->int32($this->unreadCount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $pts = $deserializer->int32($stream);
        $qts = $deserializer->int32($stream);
        $date = $deserializer->int32($stream);
        $seq = $deserializer->int32($stream);
        $unreadCount = $deserializer->int32($stream);
            return new self(
            $pts,
            $qts,
            $date,
            $seq,
            $unreadCount
        );
    }
}