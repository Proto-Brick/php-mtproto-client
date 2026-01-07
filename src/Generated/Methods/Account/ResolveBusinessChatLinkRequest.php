<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\ResolvedBusinessChatLinks;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.resolveBusinessChatLink
 */
final class ResolveBusinessChatLinkRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x5492e5ee;
    
    public string $predicate = 'account.resolveBusinessChatLink';
    
    public function getMethodName(): string
    {
        return 'account.resolveBusinessChatLink';
    }
    
    public function getResponseClass(): string
    {
        return ResolvedBusinessChatLinks::class;
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