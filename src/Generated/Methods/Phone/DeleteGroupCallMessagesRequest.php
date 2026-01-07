<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.deleteGroupCallMessages
 */
final class DeleteGroupCallMessagesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf64f54f7;
    
    public string $predicate = 'phone.deleteGroupCallMessages';
    
    public function getMethodName(): string
    {
        return 'phone.deleteGroupCallMessages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param list<int> $messages
     * @param true|null $reportSpam
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly array $messages,
        public readonly ?true $reportSpam = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->reportSpam) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::vectorOfInts($this->messages);
        return $buffer;
    }
}