<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChatInvite;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.checkChatInvite
 */
final class CheckChatInviteRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3eadb1bb;
    
    public string $predicate = 'messages.checkChatInvite';
    
    public function getMethodName(): string
    {
        return 'messages.checkChatInvite';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChatInvite::class;
    }
    /**
     * @param string $hash
     */
    public function __construct(
        public readonly string $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->hash);
        return $buffer;
    }
}