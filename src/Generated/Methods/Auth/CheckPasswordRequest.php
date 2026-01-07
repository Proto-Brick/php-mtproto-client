<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractAuthorization;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.checkPassword
 */
final class CheckPasswordRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd18b4d16;
    
    public string $predicate = 'auth.checkPassword';
    
    public function getMethodName(): string
    {
        return 'auth.checkPassword';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAuthorization::class;
    }
    /**
     * @param AbstractInputCheckPasswordSRP $password
     */
    public function __construct(
        public readonly AbstractInputCheckPasswordSRP $password
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->password->serialize();
        return $buffer;
    }
}