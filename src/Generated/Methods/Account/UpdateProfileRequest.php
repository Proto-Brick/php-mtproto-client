<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updateProfile
 */
final class UpdateProfileRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x78515775;
    
    public string $predicate = 'account.updateProfile';
    
    public function getMethodName(): string
    {
        return 'account.updateProfile';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUser::class;
    }
    /**
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $about
     */
    public function __construct(
        public readonly ?string $firstName = null,
        public readonly ?string $lastName = null,
        public readonly ?string $about = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->firstName !== null) {
            $flags |= (1 << 0);
        }
        if ($this->lastName !== null) {
            $flags |= (1 << 1);
        }
        if ($this->about !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->firstName);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->lastName);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->about);
        }
        return $buffer;
    }
}