<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageMediaGame
 */
final class MessageMediaGame extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 4256272392;
    
    public string $_ = 'messageMediaGame';
    
    /**
     * @param AbstractGame $game
     */
    public function __construct(
        public readonly AbstractGame $game
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->game->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $game = AbstractGame::deserialize($deserializer, $stream);
            return new self(
            $game
        );
    }
}