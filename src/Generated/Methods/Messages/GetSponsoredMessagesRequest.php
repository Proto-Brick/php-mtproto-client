<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractSponsoredMessages;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getSponsoredMessages
 */
final class GetSponsoredMessagesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3d6ce850;
    
    public string $predicate = 'messages.getSponsoredMessages';
    
    public function getMethodName(): string
    {
        return 'messages.getSponsoredMessages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSponsoredMessages::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int|null $msgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?int $msgId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->msgId !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->msgId);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}