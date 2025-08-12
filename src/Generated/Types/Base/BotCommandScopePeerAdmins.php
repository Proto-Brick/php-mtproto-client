<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/botCommandScopePeerAdmins
 */
final class BotCommandScopePeerAdmins extends AbstractBotCommandScope
{
    public const CONSTRUCTOR_ID = 0x3fd863d1;
    
    public string $predicate = 'botCommandScopePeerAdmins';
    
    /**
     * @param AbstractInputPeer $peer
     */
    public function __construct(
        public readonly AbstractInputPeer $peer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractInputPeer::deserialize($stream);

        return new self(
            $peer
        );
    }
}