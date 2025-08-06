<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotCallbackQuery
 */
final class UpdateBotCallbackQuery extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xb9cfc48d;
    
    public string $_ = 'updateBotCallbackQuery';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->data !== null) $flags |= (1 << 0);
        if ($this->gameShortName !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->queryId);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->msgId);
        $buffer .= $serializer->int64($this->chatInstance);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->data);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->gameShortName);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $queryId = $deserializer->int64($stream);
        $userId = $deserializer->int64($stream);
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $msgId = $deserializer->int32($stream);
        $chatInstance = $deserializer->int64($stream);
        $data = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $gameShortName = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
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