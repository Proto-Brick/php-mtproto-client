<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/readParticipantDate
 */
final class ReadParticipantDate extends AbstractReadParticipantDate
{
    public const CONSTRUCTOR_ID = 1246753138;
    
    public string $_ = 'readParticipantDate';
    
    /**
     * @param int $userId
     * @param int $date
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $date
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->int32($this->date);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $userId = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
            return new self(
            $userId,
            $date
        );
    }
}