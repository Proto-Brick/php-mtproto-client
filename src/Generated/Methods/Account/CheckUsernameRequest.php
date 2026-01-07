<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.checkUsername
 */
final class CheckUsernameRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2714d86c;
    
    public string $predicate = 'account.checkUsername';
    
    public function getMethodName(): string
    {
        return 'account.checkUsername';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
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