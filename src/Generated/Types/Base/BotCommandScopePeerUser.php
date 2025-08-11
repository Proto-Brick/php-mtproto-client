<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/botCommandScopePeerUser
 */
final class BotCommandScopePeerUser extends AbstractBotCommandScope
{
    public const CONSTRUCTOR_ID = 0xa1321f3;
    
    public string $_ = 'botCommandScopePeerUser';
    
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputUser $userId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputUser $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->userId->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $peer = AbstractInputPeer::deserialize($stream);
        $userId = AbstractInputUser::deserialize($stream);
        return new self(
            $peer,
            $userId
        );
    }
}