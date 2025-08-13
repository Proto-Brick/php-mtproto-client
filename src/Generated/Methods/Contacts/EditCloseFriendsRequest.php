<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.editCloseFriends
 */
final class EditCloseFriendsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xba6705f0;
    
    public string $predicate = 'contacts.editCloseFriends';
    
    public function getMethodName(): string
    {
        return 'contacts.editCloseFriends';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<int> $id
     */
    public function __construct(
        public readonly array $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfLongs($this->id);
        return $buffer;
    }
}