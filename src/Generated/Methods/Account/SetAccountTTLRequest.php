<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AccountDaysTTL;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.setAccountTTL
 */
final class SetAccountTTLRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2442485e;
    
    public string $predicate = 'account.setAccountTTL';
    
    public function getMethodName(): string
    {
        return 'account.setAccountTTL';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AccountDaysTTL $ttl
     */
    public function __construct(
        public readonly AccountDaysTTL $ttl
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->ttl->serialize();
        return $buffer;
    }
}