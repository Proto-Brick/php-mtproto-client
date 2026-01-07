<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractAuthorization;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPasskeyCredential;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.finishPasskeyLogin
 */
final class FinishPasskeyLoginRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9857ad07;
    
    public string $predicate = 'auth.finishPasskeyLogin';
    
    public function getMethodName(): string
    {
        return 'auth.finishPasskeyLogin';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAuthorization::class;
    }
    /**
     * @param InputPasskeyCredential $credential
     * @param int|null $fromDcId
     * @param int|null $fromAuthKeyId
     */
    public function __construct(
        public readonly InputPasskeyCredential $credential,
        public readonly ?int $fromDcId = null,
        public readonly ?int $fromAuthKeyId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->fromDcId !== null) {
            $flags |= (1 << 0);
        }
        if ($this->fromAuthKeyId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->credential->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->fromDcId);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->fromAuthKeyId);
        }
        return $buffer;
    }
}