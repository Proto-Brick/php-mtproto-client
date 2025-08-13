<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Users;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Users\UserFull;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/users.getFullUser
 */
final class GetFullUserRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb60f5918;
    
    public string $predicate = 'users.getFullUser';
    
    public function getMethodName(): string
    {
        return 'users.getFullUser';
    }
    
    public function getResponseClass(): string
    {
        return UserFull::class;
    }
    /**
     * @param AbstractInputUser $id
     */
    public function __construct(
        public readonly AbstractInputUser $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();
        return $buffer;
    }
}