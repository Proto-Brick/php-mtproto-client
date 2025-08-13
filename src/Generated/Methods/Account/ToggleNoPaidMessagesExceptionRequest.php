<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.toggleNoPaidMessagesException
 */
final class ToggleNoPaidMessagesExceptionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xfe2eda76;
    
    public string $predicate = 'account.toggleNoPaidMessagesException';
    
    public function getMethodName(): string
    {
        return 'account.toggleNoPaidMessagesException';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $userId
     * @param true|null $refundCharged
     * @param true|null $requirePayment
     * @param AbstractInputPeer|null $parentPeer
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly ?true $refundCharged = null,
        public readonly ?true $requirePayment = null,
        public readonly ?AbstractInputPeer $parentPeer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->refundCharged) {
            $flags |= (1 << 0);
        }
        if ($this->requirePayment) {
            $flags |= (1 << 2);
        }
        if ($this->parentPeer !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= $this->parentPeer->serialize();
        }
        $buffer .= $this->userId->serialize();
        return $buffer;
    }
}