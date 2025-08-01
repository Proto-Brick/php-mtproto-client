<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGroupCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.editGroupCallParticipant
 */
final class EditGroupCallParticipantRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2770811583;
    
    public string $_ = 'phone.editGroupCallParticipant';
    
    public function getMethodName(): string
    {
        return 'phone.editGroupCallParticipant';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param AbstractInputPeer $participant
     * @param bool|null $muted
     * @param int|null $volume
     * @param bool|null $raiseHand
     * @param bool|null $videoStopped
     * @param bool|null $videoPaused
     * @param bool|null $presentationPaused
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly AbstractInputPeer $participant,
        public readonly ?bool $muted = null,
        public readonly ?int $volume = null,
        public readonly ?bool $raiseHand = null,
        public readonly ?bool $videoStopped = null,
        public readonly ?bool $videoPaused = null,
        public readonly ?bool $presentationPaused = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->muted !== null) $flags |= (1 << 0);
        if ($this->volume !== null) $flags |= (1 << 1);
        if ($this->raiseHand !== null) $flags |= (1 << 2);
        if ($this->videoStopped !== null) $flags |= (1 << 3);
        if ($this->videoPaused !== null) $flags |= (1 << 4);
        if ($this->presentationPaused !== null) $flags |= (1 << 5);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->call->serialize($serializer);
        $buffer .= $this->participant->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= ($this->muted ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->volume);
        }
        if ($flags & (1 << 2)) {
            $buffer .= ($this->raiseHand ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 3)) {
            $buffer .= ($this->videoStopped ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 4)) {
            $buffer .= ($this->videoPaused ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 5)) {
            $buffer .= ($this->presentationPaused ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}