<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGroupCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Phone\AbstractGroupParticipants;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.getGroupParticipants
 */
final class GetGroupParticipantsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3310934187;
    
    public string $_ = 'phone.getGroupParticipants';
    
    public function getMethodName(): string
    {
        return 'phone.getGroupParticipants';
    }
    
    public function getResponseClass(): string
    {
        return AbstractGroupParticipants::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param list<AbstractInputPeer> $ids
     * @param list<int> $sources
     * @param string $offset
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly array $ids,
        public readonly array $sources,
        public readonly string $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->ids);
        $buffer .= $serializer->vectorOfInts($this->sources);
        $buffer .= $serializer->bytes($this->offset);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}