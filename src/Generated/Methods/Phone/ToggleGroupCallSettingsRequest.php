<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.toggleGroupCallSettings
 */
final class ToggleGroupCallSettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x974392f2;
    
    public string $predicate = 'phone.toggleGroupCallSettings';
    
    public function getMethodName(): string
    {
        return 'phone.toggleGroupCallSettings';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param true|null $resetInviteHash
     * @param bool|null $joinMuted
     * @param bool|null $messagesEnabled
     * @param int|null $sendPaidMessagesStars
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly ?true $resetInviteHash = null,
        public readonly ?bool $joinMuted = null,
        public readonly ?bool $messagesEnabled = null,
        public readonly ?int $sendPaidMessagesStars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->resetInviteHash) {
            $flags |= (1 << 1);
        }
        if ($this->joinMuted !== null) {
            $flags |= (1 << 0);
        }
        if ($this->messagesEnabled !== null) {
            $flags |= (1 << 2);
        }
        if ($this->sendPaidMessagesStars !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= ($this->joinMuted ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 2)) {
            $buffer .= ($this->messagesEnabled ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int64($this->sendPaidMessagesStars);
        }
        return $buffer;
    }
}