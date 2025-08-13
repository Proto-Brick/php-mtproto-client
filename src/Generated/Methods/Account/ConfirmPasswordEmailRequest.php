<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.confirmPasswordEmail
 */
final class ConfirmPasswordEmailRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8fdf1920;
    
    public string $predicate = 'account.confirmPasswordEmail';
    
    public function getMethodName(): string
    {
        return 'account.confirmPasswordEmail';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $code
     */
    public function __construct(
        public readonly string $code
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->code);
        return $buffer;
    }
}