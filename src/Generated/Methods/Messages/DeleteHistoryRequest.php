<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AffectedHistory;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.deleteHistory
 */
final class DeleteHistoryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb08f922a;
    
    public string $predicate = 'messages.deleteHistory';
    
    public function getMethodName(): string
    {
        return 'messages.deleteHistory';
    }
    
    public function getResponseClass(): string
    {
        return AffectedHistory::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $maxId
     * @param true|null $justClear
     * @param true|null $revoke
     * @param int|null $minDate
     * @param int|null $maxDate
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $maxId,
        public readonly ?true $justClear = null,
        public readonly ?true $revoke = null,
        public readonly ?int $minDate = null,
        public readonly ?int $maxDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->justClear) $flags |= (1 << 0);
        if ($this->revoke) $flags |= (1 << 1);
        if ($this->minDate !== null) $flags |= (1 << 2);
        if ($this->maxDate !== null) $flags |= (1 << 3);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->maxId);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->minDate);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->maxDate);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}