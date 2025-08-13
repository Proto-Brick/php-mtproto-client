<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.toggleSponsoredMessages
 */
final class ToggleSponsoredMessagesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb9d9a38d;
    
    public string $predicate = 'account.toggleSponsoredMessages';
    
    public function getMethodName(): string
    {
        return 'account.toggleSponsoredMessages';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param bool $enabled
     */
    public function __construct(
        public readonly bool $enabled
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= ($this->enabled ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}