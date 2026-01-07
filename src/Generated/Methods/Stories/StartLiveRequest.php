<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPrivacyRule;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessageEntity;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.startLive
 */
final class StartLiveRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd069ccde;
    
    public string $predicate = 'stories.startLive';
    
    public function getMethodName(): string
    {
        return 'stories.startLive';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<AbstractInputPrivacyRule> $privacyRules
     * @param int $randomId
     * @param true|null $pinned
     * @param true|null $noforwards
     * @param true|null $rtmpStream
     * @param string|null $caption
     * @param list<AbstractMessageEntity>|null $entities
     * @param bool|null $messagesEnabled
     * @param int|null $sendPaidMessagesStars
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $privacyRules,
        public readonly int $randomId,
        public readonly ?true $pinned = null,
        public readonly ?true $noforwards = null,
        public readonly ?true $rtmpStream = null,
        public readonly ?string $caption = null,
        public readonly ?array $entities = null,
        public readonly ?bool $messagesEnabled = null,
        public readonly ?int $sendPaidMessagesStars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) {
            $flags |= (1 << 2);
        }
        if ($this->noforwards) {
            $flags |= (1 << 4);
        }
        if ($this->rtmpStream) {
            $flags |= (1 << 5);
        }
        if ($this->caption !== null) {
            $flags |= (1 << 0);
        }
        if ($this->entities !== null) {
            $flags |= (1 << 1);
        }
        if ($this->messagesEnabled !== null) {
            $flags |= (1 << 6);
        }
        if ($this->sendPaidMessagesStars !== null) {
            $flags |= (1 << 7);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->caption);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        $buffer .= Serializer::vectorOfObjects($this->privacyRules);
        $buffer .= Serializer::int64($this->randomId);
        if ($flags & (1 << 6)) {
            $buffer .= ($this->messagesEnabled ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::int64($this->sendPaidMessagesStars);
        }
        return $buffer;
    }
}