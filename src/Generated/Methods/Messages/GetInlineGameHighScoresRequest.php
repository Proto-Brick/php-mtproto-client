<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputBotInlineMessageID;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\HighScores;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getInlineGameHighScores
 */
final class GetInlineGameHighScoresRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf635e1b;
    
    public string $predicate = 'messages.getInlineGameHighScores';
    
    public function getMethodName(): string
    {
        return 'messages.getInlineGameHighScores';
    }
    
    public function getResponseClass(): string
    {
        return HighScores::class;
    }
    /**
     * @param AbstractInputBotInlineMessageID $id
     * @param AbstractInputUser $userId
     */
    public function __construct(
        public readonly AbstractInputBotInlineMessageID $id,
        public readonly AbstractInputUser $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();
        $buffer .= $this->userId->serialize();
        return $buffer;
    }
}