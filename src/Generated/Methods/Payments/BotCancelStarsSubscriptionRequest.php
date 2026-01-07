<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.botCancelStarsSubscription
 */
final class BotCancelStarsSubscriptionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6dfa0622;
    
    public string $predicate = 'payments.botCancelStarsSubscription';
    
    public function getMethodName(): string
    {
        return 'payments.botCancelStarsSubscription';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $userId
     * @param string $chargeId
     * @param true|null $restore
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly string $chargeId,
        public readonly ?true $restore = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->restore) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::bytes($this->chargeId);
        return $buffer;
    }
}