<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/highScore
 */
final class HighScore extends TlObject
{
    public const CONSTRUCTOR_ID = 0x73a379eb;
    
    public string $_ = 'highScore';
    
    /**
     * @param int $pos
     * @param int $userId
     * @param int $score
     */
    public function __construct(
        public readonly int $pos,
        public readonly int $userId,
        public readonly int $score
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->pos);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->score);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $pos = Deserializer::int32($stream);
        $userId = Deserializer::int64($stream);
        $score = Deserializer::int32($stream);
        return new self(
            $pos,
            $userId,
            $score
        );
    }
}