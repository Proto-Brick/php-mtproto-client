<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractSentCode;
use ProtoBrick\MTProtoClient\Generated\Types\Base\CodeSettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.sendChangePhoneCode
 */
final class SendChangePhoneCodeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x82574ae5;
    
    public string $predicate = 'account.sendChangePhoneCode';
    
    public function getMethodName(): string
    {
        return 'account.sendChangePhoneCode';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSentCode::class;
    }
    /**
     * @param string $phoneNumber
     * @param CodeSettings $settings
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly CodeSettings $settings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= $this->settings->serialize();
        return $buffer;
    }
}