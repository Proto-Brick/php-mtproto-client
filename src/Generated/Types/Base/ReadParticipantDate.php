<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/readParticipantDate
 */
final class ReadParticipantDate extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4a4ff172;
    
    public string $predicate = 'readParticipantDate';
    
    /**
     * @param int $userId
     * @param int $date
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->date);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $userId = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);

        return new self(
            $userId,
            $date
        );
    }
}