<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.declineConferenceCallInvite
 */
final class DeclineConferenceCallInviteRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3c479971;
    
    public string $predicate = 'phone.declineConferenceCallInvite';
    
    public function getMethodName(): string
    {
        return 'phone.declineConferenceCallInvite';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param int $msgId
     */
    public function __construct(
        public readonly int $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->msgId);
        return $buffer;
    }
}