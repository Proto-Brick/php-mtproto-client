<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\BusinessChatLink;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBusinessChatLink;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.editBusinessChatLink
 */
final class EditBusinessChatLinkRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8c3410af;
    
    public string $predicate = 'account.editBusinessChatLink';
    
    public function getMethodName(): string
    {
        return 'account.editBusinessChatLink';
    }
    
    public function getResponseClass(): string
    {
        return BusinessChatLink::class;
    }
    /**
     * @param string $slug
     * @param InputBusinessChatLink $link
     */
    public function __construct(
        public readonly string $slug,
        public readonly InputBusinessChatLink $link
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->slug);
        $buffer .= $this->link->serialize();
        return $buffer;
    }
}