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
    
    public string $_ = 'statsGroupTopPoster';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->int32($this->messages);
        $buffer .= $serializer->int32($this->avgChars);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $userId = $deserializer->int64($stream);
        $messages = $deserializer->int32($stream);
        $avgChars = $deserializer->int32($stream);
        return new self(
            $userId,
            $messages,
            $avgChars
        );
    }
}