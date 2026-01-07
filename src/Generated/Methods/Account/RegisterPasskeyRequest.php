<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPasskeyCredential;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Passkey;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.registerPasskey
 */
final class RegisterPasskeyRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x55b41fd6;
    
    public string $predicate = 'account.registerPasskey';
    
    public function getMethodName(): string
    {
        return 'account.registerPasskey';
    }
    
    public function getResponseClass(): string
    {
        return Passkey::class;
    }
    /**
     * @param InputPasskeyCredential $credential
     */
    public function __construct(
        public readonly InputPasskeyCredential $credential
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->credential->serialize();
        return $buffer;
    }
}