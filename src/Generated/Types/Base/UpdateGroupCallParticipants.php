<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateGroupCallParticipants
 */
final class UpdateGroupCallParticipants extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 4075543374;
    
    public string $_ = 'updateGroupCallParticipants';
    
    /**
     * @param AbstractInputGroupCall $call
     * @param list<AbstractGroupCallParticipant> $participants
     * @param int $version
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly array $participants,
        public readonly int $version
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->participants);
        $buffer .= $serializer->int32($this->version);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $call = AbstractInputGroupCall::deserialize($deserializer, $stream);
        $participants = $deserializer->vectorOfObjects($stream, [AbstractGroupCallParticipant::class, 'deserialize']);
        $version = $deserializer->int32($stream);
            return new self(
            $call,
            $participants,
            $version
        );
    }
}