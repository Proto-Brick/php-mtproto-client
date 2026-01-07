<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\HighScores;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getGameHighScores
 */
final class GetGameHighScoresRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe822649d;
    
    public string $predicate = 'messages.getGameHighScores';
    
    public function getMethodName(): string
    {
        return 'messages.getGameHighScores';
    }
    
    public function getResponseClass(): string
    {
        return HighScores::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param AbstractInputUser $userId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly AbstractInputUser $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        $buffer .= $this->userId->serialize();
        return $buffer;
    }
}