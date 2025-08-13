<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessageEntity;
use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractUserInfo;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.editUserInfo
 */
final class EditUserInfoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x66b91b70;
    
    public string $predicate = 'help.editUserInfo';
    
    public function getMethodName(): string
    {
        return 'help.editUserInfo';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUserInfo::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param string $message
     * @param list<AbstractMessageEntity> $entities
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly string $message,
        public readonly array $entities
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::bytes($this->message);
        $buffer .= Serializer::vectorOfObjects($this->entities);
        return $buffer;
    }
}