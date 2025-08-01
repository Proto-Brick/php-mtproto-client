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
    public const CONSTRUCTOR_ID = 1299263278;
    
    public string $_ = 'updateBotCommands';
    
    /**
     * @param AbstractPeer $peer
     * @param int $botId
     * @param list<AbstractBotCommand> $commands
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $botId,
        public readonly array $commands
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int64($this->botId);
        $buffer .= $serializer->vectorOfObjects($this->commands);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $botId = $deserializer->int64($stream);
        $commands = $deserializer->vectorOfObjects($stream, [AbstractBotCommand::class, 'deserialize']);
            return new self(
            $peer,
            $botId,
            $commands
        );
    }
}