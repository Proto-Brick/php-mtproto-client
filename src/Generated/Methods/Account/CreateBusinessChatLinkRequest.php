<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\BusinessChatLink;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBusinessChatLink;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.createBusinessChatLink
 */
final class CreateBusinessChatLinkRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8851e68e;
    
    public string $predicate = 'account.createBusinessChatLink';
    
    public function getMethodName(): string
    {
        return 'account.createBusinessChatLink';
    }
    
    public function getResponseClass(): string
    {
        return BusinessChatLink::class;
    }
    /**
     * @param InputBusinessChatLink $link
     */
    public function __construct(
        public readonly InputBusinessChatLink $link
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->link->serialize();
        return $buffer;
    }
}