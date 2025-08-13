<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGroupCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.deleteConferenceCallParticipants
 */
final class DeleteConferenceCallParticipantsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8ca60525;
    
    public string $predicate = 'phone.deleteConferenceCallParticipants';
    
    public function getMethodName(): string
    {
        return 'phone.deleteConferenceCallParticipants';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param list<int> $ids
     * @param string $block
     * @param true|null $onlyLeft
     * @param true|null $kick
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly array $ids,
        public readonly string $block,
        public readonly ?true $onlyLeft = null,
        public readonly ?true $kick = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->onlyLeft) $flags |= (1 << 0);
        if ($this->kick) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::vectorOfLongs($this->ids);
        $buffer .= Serializer::bytes($this->block);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}