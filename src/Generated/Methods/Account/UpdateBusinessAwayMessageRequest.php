<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBusinessAwayMessage;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updateBusinessAwayMessage
 */
final class UpdateBusinessAwayMessageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa26a7fa5;
    
    public string $predicate = 'account.updateBusinessAwayMessage';
    
    public function getMethodName(): string
    {
        return 'account.updateBusinessAwayMessage';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputBusinessAwayMessage|null $message
     */
    public function __construct(
        public readonly ?InputBusinessAwayMessage $message = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->message !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->message->serialize();
        }
        return $buffer;
    }
}