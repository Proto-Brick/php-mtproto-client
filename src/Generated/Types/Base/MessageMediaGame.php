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
    public const CONSTRUCTOR_ID = 0xfdb19008;
    
    public string $predicate = 'messageMediaGame';
    
    /**
     * @param Game $game
     */
    public function __construct(
        public readonly Game $game
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->game->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $game = Game::deserialize($stream);

        return new self(
            $game
        );
    }
}