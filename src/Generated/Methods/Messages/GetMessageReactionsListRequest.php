<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReaction;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractMessageReactionsList;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getMessageReactionsList
 */
final class GetMessageReactionsListRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1176190792;
    
    public string $_ = 'messages.getMessageReactionsList';
    
    public function getMethodName(): string
    {
        return 'messages.getMessageReactionsList';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessageReactionsList::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param int $limit
     * @param AbstractReaction|null $reaction
     * @param string|null $offset
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly int $limit,
        public readonly ?AbstractReaction $reaction = null,
        public readonly ?string $offset = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->reaction !== null) $flags |= (1 << 0);
        if ($this->offset !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $this->reaction->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->offset);
        }
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}