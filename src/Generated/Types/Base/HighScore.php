<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/highScore
 */
final class HighScore extends AbstractHighScore
{
    public const CONSTRUCTOR_ID = 1940093419;
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->pos);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->int32($this->score);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $pos = $deserializer->int32($stream);
        $userId = $deserializer->int64($stream);
        $score = $deserializer->int32($stream);
            return new self(
            $pos,
            $userId,
            $score
        );
    }
}