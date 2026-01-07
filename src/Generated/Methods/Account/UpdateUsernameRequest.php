<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updateUsername
 */
final class UpdateUsernameRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3e0bdd7c;
    
    public string $predicate = 'account.updateUsername';
    
    public function getMethodName(): string
    {
        return 'account.updateUsername';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUser::class;
    }
    /**
     * @param string $username
     */
    public function __construct(
        public readonly string $username
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->username);
        return $buffer;
    }
}