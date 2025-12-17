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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $botId = Deserializer::int64($__payload, $__offset);
        $recipients = BusinessBotRecipients::deserialize($__payload, $__offset);
        $rights = BusinessBotRights::deserialize($__payload, $__offset);

        return new self(
            $botId,
            $recipients,
            $rights
        );
    }
}