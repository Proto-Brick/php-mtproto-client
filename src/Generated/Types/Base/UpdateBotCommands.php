<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractPeer::deserialize($stream);
        $botId = Deserializer::int64($stream);
        $commands = Deserializer::vectorOfObjects($stream, [BotCommand::class, 'deserialize']);

        return new self(
            $peer,
            $botId,
            $commands
        );
    }
}