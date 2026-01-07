<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.deleteAccount
 */
final class DeleteAccountRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa2c0cf74;
    
    public string $predicate = 'account.deleteAccount';
    
    public function getMethodName(): string
    {
        return 'account.deleteAccount';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $reason
     * @param AbstractInputCheckPasswordSRP|null $password
     */
    public function __construct(
        public readonly string $reason,
        public readonly ?AbstractInputCheckPasswordSRP $password = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->password !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->reason);
        if ($flags & (1 << 0)) {
            $buffer .= $this->password->serialize();
        }
        return $buffer;
    }
}