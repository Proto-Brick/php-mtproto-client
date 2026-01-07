<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.deleteBusinessChatLink
 */
final class DeleteBusinessChatLinkRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x60073674;
    
    public string $predicate = 'account.deleteBusinessChatLink';
    
    public function getMethodName(): string
    {
        return 'account.deleteBusinessChatLink';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
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