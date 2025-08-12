<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/statsGroupTopPoster
 */
final class StatsGroupTopPoster extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9d04af9b;
    
    public string $predicate = 'statsGroupTopPoster';
    
    /**
     * @param int $userId
     * @param int $messages
     * @param int $avgChars
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $messages,
        public readonly int $avgChars
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->messages);
        $buffer .= Serializer::int32($this->avgChars);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $userId = Deserializer::int64($stream);
        $messages = Deserializer::int32($stream);
        $avgChars = Deserializer::int32($stream);

        return new self(
            $userId,
            $messages,
            $avgChars
        );
    }
}