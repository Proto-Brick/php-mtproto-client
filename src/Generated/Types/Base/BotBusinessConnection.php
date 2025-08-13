<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/botBusinessConnection
 */
final class BotBusinessConnection extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8f34b2f5;
    
    public string $predicate = 'botBusinessConnection';
    
    /**
     * @param string $connectionId
     * @param int $userId
     * @param int $dcId
     * @param int $date
     * @param true|null $disabled
     * @param BusinessBotRights|null $rights
     */
    public function __construct(
        public readonly string $connectionId,
        public readonly int $userId,
        public readonly int $dcId,
        public readonly int $date,
        public readonly ?true $disabled = null,
        public readonly ?BusinessBotRights $rights = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->disabled) $flags |= (1 << 1);
        if ($this->rights !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->connectionId);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->dcId);
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 2)) {
            $buffer .= $this->rights->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $disabled = ($flags & (1 << 1)) ? true : null;
        $connectionId = Deserializer::bytes($stream);
        $userId = Deserializer::int64($stream);
        $dcId = Deserializer::int32($stream);
        $date = Deserializer::int32($stream);
        $rights = ($flags & (1 << 2)) ? BusinessBotRights::deserialize($stream) : null;

        return new self(
            $connectionId,
            $userId,
            $dcId,
            $date,
            $disabled,
            $rights
        );
    }
}