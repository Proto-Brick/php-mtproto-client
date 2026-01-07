<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.changePhone
 */
final class ChangePhoneRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x70c32edb;
    
    public string $predicate = 'account.changePhone';
    
    public function getMethodName(): string
    {
        return 'account.changePhone';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUser::class;
    }
    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string $phoneCode
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $phoneCodeHash,
        public readonly string $phoneCode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::bytes($this->phoneCodeHash);
        $buffer .= Serializer::bytes($this->phoneCode);
        return $buffer;
    }
}