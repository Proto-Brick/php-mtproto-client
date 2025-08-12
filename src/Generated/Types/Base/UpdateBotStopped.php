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
    public const CONSTRUCTOR_ID = 0xc4870a49;
    
    public string $predicate = 'updateBotStopped';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->date);
        $buffer .= ($this->stopped ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        $buffer .= Serializer::int32($this->qts);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $userId = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);
        $stopped = (Deserializer::int32($stream) === 0x997275b5);
        $qts = Deserializer::int32($stream);

        return new self(
            $userId,
            $date,
            $stopped,
            $qts
        );
    }
}