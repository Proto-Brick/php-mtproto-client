<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractEmailVerified;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmailVerification;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmailVerifyPurpose;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.verifyEmail
 */
final class VerifyEmailRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x32da4cf;
    
    public string $predicate = 'account.verifyEmail';
    
    public function getMethodName(): string
    {
        return 'account.verifyEmail';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEmailVerified::class;
    }
    /**
     * @param AbstractEmailVerifyPurpose $purpose
     * @param AbstractEmailVerification $verification
     */
    public function __construct(
        public readonly AbstractEmailVerifyPurpose $purpose,
        public readonly AbstractEmailVerification $verification
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->purpose->serialize();
        $buffer .= $this->verification->serialize();
        return $buffer;
    }
}