<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Users;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Birthday;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/users.suggestBirthday
 */
final class SuggestBirthdayRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xfc533372;
    
    public string $predicate = 'users.suggestBirthday';
    
    public function getMethodName(): string
    {
        return 'users.suggestBirthday';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputUser $id
     * @param Birthday $birthday
     */
    public function __construct(
        public readonly AbstractInputUser $id,
        public readonly Birthday $birthday
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();
        $buffer .= $this->birthday->serialize();
        return $buffer;
    }
}