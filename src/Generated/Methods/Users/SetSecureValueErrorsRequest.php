<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Users;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractSecureValueError;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/users.setSecureValueErrors
 */
final class SetSecureValueErrorsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x90c894b5;
    
    public string $predicate = 'users.setSecureValueErrors';
    
    public function getMethodName(): string
    {
        return 'users.setSecureValueErrors';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $id
     * @param list<AbstractSecureValueError> $errors
     */
    public function __construct(
        public readonly AbstractInputUser $id,
        public readonly array $errors
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();
        $buffer .= Serializer::vectorOfObjects($this->errors);
        return $buffer;
    }
}