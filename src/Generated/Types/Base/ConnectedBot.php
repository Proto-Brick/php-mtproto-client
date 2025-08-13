<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/connectedBot
 */
final class ConnectedBot extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcd64636c;
    
    public string $predicate = 'connectedBot';
    
    /**
     * @param int $botId
     * @param BusinessBotRecipients $recipients
     * @param BusinessBotRights $rights
     */
    public function __construct(
        public readonly int $botId,
        public readonly BusinessBotRecipients $recipients,
        public readonly BusinessBotRights $rights
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->botId);
        $buffer .= $this->recipients->serialize();
        $buffer .= $this->rights->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $botId = Deserializer::int64($stream);
        $recipients = BusinessBotRecipients::deserialize($stream);
        $rights = BusinessBotRights::deserialize($stream);

        return new self(
            $botId,
            $recipients,
            $rights
        );
    }
}