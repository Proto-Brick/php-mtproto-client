<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBusinessGreetingMessage;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updateBusinessGreetingMessage
 */
final class UpdateBusinessGreetingMessageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x66cdafc4;
    
    public string $predicate = 'account.updateBusinessGreetingMessage';
    
    public function getMethodName(): string
    {
        return 'account.updateBusinessGreetingMessage';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputBusinessGreetingMessage|null $message
     */
    public function __construct(
        public readonly ?InputBusinessGreetingMessage $message = null
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