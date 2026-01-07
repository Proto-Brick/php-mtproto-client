<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.inviteConferenceCallParticipant
 */
final class InviteConferenceCallParticipantRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xbcf22685;
    
    public string $predicate = 'phone.inviteConferenceCallParticipant';
    
    public function getMethodName(): string
    {
        return 'phone.inviteConferenceCallParticipant';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param AbstractInputUser $userId
     * @param true|null $video
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly AbstractInputUser $userId,
        public readonly ?true $video = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->video) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();
        $buffer .= $this->userId->serialize();
        return $buffer;
    }
}