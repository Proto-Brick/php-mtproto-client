<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBotCallbackQuery
 */
final class UpdateBotCallbackQuery extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xb9cfc48d;
    
    public string $predicate = 'updateBotCallbackQuery';
    
    /**
     * @param int $queryId
     * @param int $userId
     * @param AbstractPeer $peer
     * @param int $msgId
     * @param int $chatInstance
     * @param string|null $data
     * @param string|null $gameShortName
     */
    public function __construct(
        public readonly int $queryId,
        public readonly int $userId,
        public readonly AbstractPeer $peer,
        public readonly int $msgId,
        public readonly int $chatInstance,
        public readonly ?string $data = null,
        public readonly ?string $gameShortName = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->data !== null) {
            $flags |= (1 << 0);
        }
        if ($this->gameShortName !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->queryId);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::int64($this->chatInstance);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->data);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->gameShortName);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $queryId = Deserializer::int64($__payload, $__offset);
        $userId = Deserializer::int64($__payload, $__offset);
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $msgId = Deserializer::int32($__payload, $__offset);
        $chatInstance = Deserializer::int64($__payload, $__offset);
        $data = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $gameShortName = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $queryId,
            $userId,
            $peer,
            $msgId,
            $chatInstance,
            $data,
            $gameShortName
        );
    }
}