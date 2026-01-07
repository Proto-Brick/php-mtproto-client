<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.inviteToGroupCall
 */
final class InviteToGroupCallRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7b393160;
    
    public string $predicate = 'phone.inviteToGroupCall';
    
    public function getMethodName(): string
    {
        return 'phone.inviteToGroupCall';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param list<AbstractInputUser> $users
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
}