<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractSentCode;
use ProtoBrick\MTProtoClient\Generated\Types\Base\CodeSettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.sendCode
 */
final class SendCodeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa677244f;
    
    public string $predicate = 'auth.sendCode';
    
    public function getMethodName(): string
    {
        return 'auth.sendCode';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSentCode::class;
    }
    /**
     * @param string $phoneNumber
     * @param int $apiId
     * @param string $apiHash
     * @param CodeSettings $settings
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly int $apiId,
        public readonly string $apiHash,
        public readonly CodeSettings $settings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::int32($this->apiId);
        $buffer .= Serializer::bytes($this->apiHash);
        $buffer .= $this->settings->serialize();
        return $buffer;
    }
}