<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\SentEmailCode;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmailVerifyPurpose;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.sendVerifyEmailCode
 */
final class SendVerifyEmailCodeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x98e037bb;
    
    public string $predicate = 'account.sendVerifyEmailCode';
    
    public function getMethodName(): string
    {
        return 'account.sendVerifyEmailCode';
    }
    
    public function getResponseClass(): string
    {
        return SentEmailCode::class;
    }
    /**
     * @param AbstractEmailVerifyPurpose $purpose
     * @param string $email
     */
    public function __construct(
        public readonly AbstractEmailVerifyPurpose $purpose,
        public readonly string $email
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->purpose->serialize();
        $buffer .= Serializer::bytes($this->email);
        return $buffer;
    }
}