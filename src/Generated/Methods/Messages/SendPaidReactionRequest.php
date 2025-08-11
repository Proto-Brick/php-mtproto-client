<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.sendPaidReaction
 */
final class SendPaidReactionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9dd6a67b;
    
    public string $_ = 'messages.sendPaidReaction';
    
    public function getMethodName(): string
    {
        return 'messages.sendPaidReaction';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     * @param int $count
     * @param int $randomId
     * @param bool|null $private
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId,
        public readonly int $count,
        public readonly int $randomId,
        public readonly ?bool $private = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->private !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::int64($this->randomId);
        if ($flags & (1 << 0)) {
            $buffer .= ($this->private ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}