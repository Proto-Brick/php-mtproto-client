<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/connectedBot
 */
final class ConnectedBot extends TlObject
{
    public const CONSTRUCTOR_ID = 0xbd068601;
    
    public string $_ = 'connectedBot';
    
    /**
     * @param int $botId
     * @param BusinessBotRecipients $recipients
     * @param bool|null $canReply
     */
    public function __construct(
        public readonly int $botId,
        public readonly BusinessBotRecipients $recipients,
        public readonly ?bool $canReply = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canReply) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->botId);
        $buffer .= $this->recipients->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $canReply = ($flags & (1 << 0)) ? true : null;
        $botId = Deserializer::int64($stream);
        $recipients = BusinessBotRecipients::deserialize($stream);
        return new self(
            $botId,
            $recipients,
            $canReply
        );
    }
}