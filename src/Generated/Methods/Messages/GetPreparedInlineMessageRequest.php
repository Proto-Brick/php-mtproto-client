<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\PreparedInlineMessage;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getPreparedInlineMessage
 */
final class GetPreparedInlineMessageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x857ebdb8;
    
    public string $predicate = 'messages.getPreparedInlineMessage';
    
    public function getMethodName(): string
    {
        return 'messages.getPreparedInlineMessage';
    }
    
    public function getResponseClass(): string
    {
        return PreparedInlineMessage::class;
    }
    /**
     * @param AbstractInputUser $bot
     * @param string $id
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly string $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::bytes($this->id);
        return $buffer;
    }
}