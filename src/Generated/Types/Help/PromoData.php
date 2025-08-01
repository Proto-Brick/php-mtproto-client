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
    public const CONSTRUCTOR_ID = 2352576831;
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->proxy) $flags |= (1 << 0);
        if ($this->psaType !== null) $flags |= (1 << 1);
        if ($this->psaMessage !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->expires);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->psaType);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->psaMessage);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $proxy = ($flags & (1 << 0)) ? true : null;
        $expires = $deserializer->int32($stream);
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $psaType = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $psaMessage = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
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