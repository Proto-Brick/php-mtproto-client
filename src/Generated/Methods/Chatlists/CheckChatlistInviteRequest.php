<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Chatlists;

use ProtoBrick\MTProtoClient\Generated\Types\Chatlists\AbstractChatlistInvite;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/chatlists.checkChatlistInvite
 */
final class CheckChatlistInviteRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x41c10fff;
    
    public string $predicate = 'chatlists.checkChatlistInvite';
    
    public function getMethodName(): string
    {
        return 'chatlists.checkChatlistInvite';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChatlistInvite::class;
    }
    /**
     * @param string $slug
     */
    public function __construct(
        public readonly string $slug
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->slug);
        return $buffer;
    }
}