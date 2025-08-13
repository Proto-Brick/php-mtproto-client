<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Users;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/users.getUsers
 */
final class GetUsersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd91a548;
    
    public string $predicate = 'users.getUsers';
    
    public function getMethodName(): string
    {
        return 'users.getUsers';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . AbstractUser::class . '>';
    }
    /**
     * @param list<AbstractInputUser> $id
     */
    public function __construct(
        public readonly array $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->id);
        return $buffer;
    }
}