<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\TmpPassword;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getTmpPassword
 */
final class GetTmpPasswordRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x449e0b51;
    
    public string $predicate = 'account.getTmpPassword';
    
    public function getMethodName(): string
    {
        return 'account.getTmpPassword';
    }
    
    public function getResponseClass(): string
    {
        return TmpPassword::class;
    }
    /**
     * @param AbstractInputCheckPasswordSRP $password
     * @param int $period
     */
    public function __construct(
        public readonly AbstractInputCheckPasswordSRP $password,
        public readonly int $period
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->password->serialize();
        $buffer .= Serializer::int32($this->period);
        return $buffer;
    }
}