<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionGameScore
 */
final class MessageActionGameScore extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 2460428406;
    
    public string $_ = 'messageActionGameScore';
    
    /**
     * @param int $gameId
     * @param int $score
     */
    public function __construct(
        public readonly int $gameId,
        public readonly int $score
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->gameId);
        $buffer .= $serializer->int32($this->score);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $gameId = $deserializer->int64($stream);
        $score = $deserializer->int32($stream);
            return new self(
            $gameId,
            $score
        );
    }
}