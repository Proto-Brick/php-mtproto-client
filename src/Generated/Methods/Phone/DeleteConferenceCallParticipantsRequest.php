<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.deleteConferenceCallParticipants
 */
final class DeleteConferenceCallParticipantsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8ca60525;
    
    public string $predicate = 'phone.deleteConferenceCallParticipants';
    
    public function getMethodName(): string
    {
        return 'phone.deleteConferenceCallParticipants';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param list<int> $ids
     * @param string $block
     * @param true|null $onlyLeft
     * @param true|null $kick
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly array $ids,
        public readonly string $block,
        public readonly ?true $onlyLeft = null,
        public readonly ?true $kick = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->onlyLeft) {
            $flags |= (1 << 0);
        }
        if ($this->kick) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::vectorOfLongs($this->ids);
        $buffer .= Serializer::bytes($this->block);
        return $buffer;
    }
}