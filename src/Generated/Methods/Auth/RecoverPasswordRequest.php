<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Account\PasswordInputSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractAuthorization;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.recoverPassword
 */
final class RecoverPasswordRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x37096c70;
    
    public string $predicate = 'auth.recoverPassword';
    
    public function getMethodName(): string
    {
        return 'auth.recoverPassword';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAuthorization::class;
    }
    /**
     * @param string $code
     * @param PasswordInputSettings|null $newSettings
     */
    public function __construct(
        public readonly string $code,
        public readonly ?PasswordInputSettings $newSettings = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->newSettings !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->code);
        if ($flags & (1 << 0)) {
            $buffer .= $this->newSettings->serialize();
        }
        return $buffer;
    }
}