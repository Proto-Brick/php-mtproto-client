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
    public const CONSTRUCTOR_ID = 0x896433b4;
    
    public string $_ = 'botBusinessConnection';
    
    /**
     * @param string $connectionId
     * @param int $userId
     * @param int $dcId
     * @param int $date
     * @param bool|null $canReply
     * @param bool|null $disabled
     */
    public function __construct(
        public readonly string $connectionId,
        public readonly int $userId,
        public readonly int $dcId,
        public readonly int $date,
        public readonly ?bool $canReply = null,
        public readonly ?bool $disabled = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canReply) $flags |= (1 << 0);
        if ($this->disabled) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->connectionId);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->int32($this->dcId);
        $buffer .= $serializer->int32($this->date);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $canReply = ($flags & (1 << 0)) ? true : null;
        $disabled = ($flags & (1 << 1)) ? true : null;
        $connectionId = $deserializer->bytes($stream);
        $userId = $deserializer->int64($stream);
        $dcId = $deserializer->int32($stream);
        $date = $deserializer->int32($stream);
        return new self(
            $connectionId,
            $userId,
            $dcId,
            $date,
            $canReply,
            $disabled
        );
    }
}