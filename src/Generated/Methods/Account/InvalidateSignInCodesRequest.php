<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.invalidateSignInCodes
 */
final class InvalidateSignInCodesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xca8ae8ba;
    
    public string $predicate = 'account.invalidateSignInCodes';
    
    public function getMethodName(): string
    {
        return 'account.invalidateSignInCodes';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<string> $codes
     */
    public function __construct(
        public readonly array $codes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfStrings($this->codes);
        return $buffer;
    }
}