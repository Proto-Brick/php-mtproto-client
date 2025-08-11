<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Contacts\AbstractTopPeers;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.getTopPeers
 */
final class GetTopPeersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x973478b6;
    
    public string $_ = 'contacts.getTopPeers';
    
    public function getMethodName(): string
    {
        return 'contacts.getTopPeers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractTopPeers::class;
    }
    /**
     * @param int $offset
     * @param int $limit
     * @param int $hash
     * @param bool|null $correspondents
     * @param bool|null $botsPm
     * @param bool|null $botsInline
     * @param bool|null $phoneCalls
     * @param bool|null $forwardUsers
     * @param bool|null $forwardChats
     * @param bool|null $groups
     * @param bool|null $channels
     * @param bool|null $botsApp
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $limit,
        public readonly int $hash,
        public readonly ?bool $correspondents = null,
        public readonly ?bool $botsPm = null,
        public readonly ?bool $botsInline = null,
        public readonly ?bool $phoneCalls = null,
        public readonly ?bool $forwardUsers = null,
        public readonly ?bool $forwardChats = null,
        public readonly ?bool $groups = null,
        public readonly ?bool $channels = null,
        public readonly ?bool $botsApp = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->correspondents) $flags |= (1 << 0);
        if ($this->botsPm) $flags |= (1 << 1);
        if ($this->botsInline) $flags |= (1 << 2);
        if ($this->phoneCalls) $flags |= (1 << 3);
        if ($this->forwardUsers) $flags |= (1 << 4);
        if ($this->forwardChats) $flags |= (1 << 5);
        if ($this->groups) $flags |= (1 << 10);
        if ($this->channels) $flags |= (1 << 15);
        if ($this->botsApp) $flags |= (1 << 16);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->limit);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}