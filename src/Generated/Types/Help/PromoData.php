<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PendingSuggestion;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/help.promoData
 */
final class PromoData extends AbstractPromoData
{
    public const CONSTRUCTOR_ID = 0x8a4d87a;
    
    public string $predicate = 'help.promoData';
    
    /**
     * @param int $expires
     * @param list<string> $pendingSuggestions
     * @param list<string> $dismissedSuggestions
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param true|null $proxy
     * @param AbstractPeer|null $peer
     * @param string|null $psaType
     * @param string|null $psaMessage
     * @param PendingSuggestion|null $customPendingSuggestion
     */
    public function __construct(
        public readonly int $expires,
        public readonly array $pendingSuggestions,
        public readonly array $dismissedSuggestions,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?true $proxy = null,
        public readonly ?AbstractPeer $peer = null,
        public readonly ?string $psaType = null,
        public readonly ?string $psaMessage = null,
        public readonly ?PendingSuggestion $customPendingSuggestion = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->proxy) {
            $flags |= (1 << 0);
        }
        if ($this->peer !== null) {
            $flags |= (1 << 3);
        }
        if ($this->psaType !== null) {
            $flags |= (1 << 1);
        }
        if ($this->psaMessage !== null) {
            $flags |= (1 << 2);
        }
        if ($this->customPendingSuggestion !== null) {
            $flags |= (1 << 4);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->expires);
        if ($flags & (1 << 3)) {
            $buffer .= $this->peer->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->psaType);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->psaMessage);
        }
        $buffer .= Serializer::vectorOfStrings($this->pendingSuggestions);
        $buffer .= Serializer::vectorOfStrings($this->dismissedSuggestions);
        if ($flags & (1 << 4)) {
            $buffer .= $this->customPendingSuggestion->serialize();
        }
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $proxy = (($flags & (1 << 0)) !== 0) ? true : null;
        $expires = Deserializer::int32($stream);
        $peer = (($flags & (1 << 3)) !== 0) ? AbstractPeer::deserialize($stream) : null;
        $psaType = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;
        $psaMessage = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($stream) : null;
        $pendingSuggestions = Deserializer::vectorOfStrings($stream);
        $dismissedSuggestions = Deserializer::vectorOfStrings($stream);
        $customPendingSuggestion = (($flags & (1 << 4)) !== 0) ? PendingSuggestion::deserialize($stream) : null;
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $expires,
            $pendingSuggestions,
            $dismissedSuggestions,
            $chats,
            $users,
            $proxy,
            $peer,
            $psaType,
            $psaMessage,
            $customPendingSuggestion
        );
    }
}