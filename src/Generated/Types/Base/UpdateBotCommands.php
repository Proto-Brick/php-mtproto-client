<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBotCommands
 */
final class UpdateBotCommands extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x4d712f2e;
    
    public string $predicate = 'updateBotCommands';
    
    /**
     * @param AbstractPeer $peer
     * @param int $botId
     * @param list<BotCommand> $commands
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $botId,
        public readonly array $commands
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->botId);
        $buffer .= Serializer::vectorOfObjects($this->commands);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $botId = Deserializer::int64($__payload, $__offset);
        $commands = Deserializer::vectorOfObjects($__payload, $__offset, [BotCommand::class, 'deserialize']);

        return new self(
            $peer,
            $botId,
            $commands
        );
    }
}