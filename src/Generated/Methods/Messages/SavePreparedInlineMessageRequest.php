<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputBotInlineResult;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InlineQueryPeerType;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\BotPreparedInlineMessage;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.savePreparedInlineMessage
 */
final class SavePreparedInlineMessageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf21f7f2f;
    
    public string $predicate = 'messages.savePreparedInlineMessage';
    
    public function getMethodName(): string
    {
        return 'messages.savePreparedInlineMessage';
    }
    
    public function getResponseClass(): string
    {
        return BotPreparedInlineMessage::class;
    }
    /**
     * @param AbstractInputBotInlineResult $result
     * @param AbstractInputUser $userId
     * @param list<InlineQueryPeerType>|null $peerTypes
     */
    public function __construct(
        public readonly AbstractInputBotInlineResult $result,
        public readonly AbstractInputUser $userId,
        public readonly ?array $peerTypes = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->peerTypes !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->result->serialize();
        $buffer .= $this->userId->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->peerTypes);
        }
        return $buffer;
    }
}