<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.promoData
 */
final class PromoData extends AbstractPromoData
{
    public const CONSTRUCTOR_ID = 0x8c39793f;
    
    public string $_ = 'help.promoData';
    
    /**
     * @param int $expires
     * @param AbstractPeer $peer
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param bool|null $proxy
     * @param string|null $psaType
     * @param string|null $psaMessage
     */
    public function __construct(
        public readonly int $expires,
        public readonly AbstractPeer $peer,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?bool $proxy = null,
        public readonly ?string $psaType = null,
        public readonly ?string $psaMessage = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->proxy) $flags |= (1 << 0);
        if ($this->psaType !== null) $flags |= (1 << 1);
        if ($this->psaMessage !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->expires);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->psaType);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->psaMessage);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $proxy = ($flags & (1 << 0)) ? true : null;
        $expires = Deserializer::int32($stream);
        $peer = AbstractPeer::deserialize($stream);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $psaType = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $psaMessage = ($flags & (1 << 2)) ? Deserializer::bytes($stream) : null;
        return new self(
            $expires,
            $peer,
            $chats,
            $users,
            $proxy,
            $psaType,
            $psaMessage
        );
    }
}