<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotStopped
 */
final class UpdateBotStopped extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 3297184329;
    
    public string $_ = 'updateBotStopped';
    
    /**
     * @param int $userId
     * @param int $date
     * @param bool $stopped
     * @param int $qts
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $date,
        public readonly bool $stopped,
        public readonly int $qts
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->int32($this->date);
        $buffer .= ($this->stopped ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        $buffer .= $serializer->int32($this->qts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $userId = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $stopped = ($deserializer->int32($stream) === 0x997275b5);
        $qts = $deserializer->int32($stream);
            return new self(
            $userId,
            $date,
            $stopped,
            $qts
        );
    }
}