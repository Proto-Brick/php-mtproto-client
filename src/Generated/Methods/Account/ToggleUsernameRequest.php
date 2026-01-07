<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.toggleUsername
 */
final class ToggleUsernameRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x58d6b376;
    
    public string $predicate = 'account.toggleUsername';
    
    public function getMethodName(): string
    {
        return 'account.toggleUsername';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $username
     * @param bool $active
     */
    public function __construct(
        public readonly string $username,
        public readonly bool $active
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->username);
        $buffer .= ($this->active ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}