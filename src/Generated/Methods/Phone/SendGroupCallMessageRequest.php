<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\TextWithEntities;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.sendGroupCallMessage
 */
final class SendGroupCallMessageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb1d11410;
    
    public string $predicate = 'phone.sendGroupCallMessage';
    
    public function getMethodName(): string
    {
        return 'phone.sendGroupCallMessage';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param int $randomId
     * @param TextWithEntities $message
     * @param int|null $allowPaidStars
     * @param AbstractInputPeer|null $sendAs
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly int $randomId,
        public readonly TextWithEntities $message,
        public readonly ?int $allowPaidStars = null,
        public readonly ?AbstractInputPeer $sendAs = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->allowPaidStars !== null) {
            $flags |= (1 << 0);
        }
        if ($this->sendAs !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::int64($this->randomId);
        $buffer .= $this->message->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->allowPaidStars);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->sendAs->serialize();
        }
        return $buffer;
    }
}