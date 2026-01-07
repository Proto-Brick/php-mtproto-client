<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.setGameScore
 */
final class SetGameScoreRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8ef8ecc0;
    
    public string $predicate = 'messages.setGameScore';
    
    public function getMethodName(): string
    {
        return 'messages.setGameScore';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param AbstractInputUser $userId
     * @param int $score
     * @param true|null $editMessage
     * @param true|null $force
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly AbstractInputUser $userId,
        public readonly int $score,
        public readonly ?true $editMessage = null,
        public readonly ?true $force = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->editMessage) {
            $flags |= (1 << 0);
        }
        if ($this->force) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::int32($this->score);
        return $buffer;
    }
}