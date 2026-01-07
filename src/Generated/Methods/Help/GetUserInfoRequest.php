<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractUserInfo;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getUserInfo
 */
final class GetUserInfoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x38a08d3;
    
    public string $predicate = 'help.getUserInfo';
    
    public function getMethodName(): string
    {
        return 'help.getUserInfo';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUserInfo::class;
    }
    /**
     * @param AbstractInputUser $userId
     */
    public function __construct(
        public readonly AbstractInputUser $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        return $buffer;
    }
}