<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractSentCode;
use ProtoBrick\MTProtoClient\Generated\Types\Base\CodeSettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.sendConfirmPhoneCode
 */
final class SendConfirmPhoneCodeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1b3faa88;
    
    public string $predicate = 'account.sendConfirmPhoneCode';
    
    public function getMethodName(): string
    {
        return 'account.sendConfirmPhoneCode';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSentCode::class;
    }
    /**
     * @param string $hash
     * @param CodeSettings $settings
     */
    public function __construct(
        public readonly string $hash,
        public readonly CodeSettings $settings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->hash);
        $buffer .= $this->settings->serialize();
        return $buffer;
    }
}