<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.createGroupCall
 */
final class CreateGroupCallRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x48cdc6d8;
    
    public string $predicate = 'phone.createGroupCall';
    
    public function getMethodName(): string
    {
        return 'phone.createGroupCall';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $randomId
     * @param true|null $rtmpStream
     * @param string|null $title
     * @param int|null $scheduleDate
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $randomId,
        public readonly ?true $rtmpStream = null,
        public readonly ?string $title = null,
        public readonly ?int $scheduleDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->rtmpStream) $flags |= (1 << 2);
        if ($this->title !== null) $flags |= (1 << 0);
        if ($this->scheduleDate !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->randomId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->scheduleDate);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}