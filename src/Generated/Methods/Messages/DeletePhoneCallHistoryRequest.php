<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AffectedFoundMessages;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.deletePhoneCallHistory
 */
final class DeletePhoneCallHistoryRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf9cbe409;
    
    public string $predicate = 'messages.deletePhoneCallHistory';
    
    public function getMethodName(): string
    {
        return 'messages.deletePhoneCallHistory';
    }
    
    public function getResponseClass(): string
    {
        return AffectedFoundMessages::class;
    }
    /**
     * @param true|null $revoke
     */
    public function __construct(
        public readonly ?true $revoke = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revoke) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }
}