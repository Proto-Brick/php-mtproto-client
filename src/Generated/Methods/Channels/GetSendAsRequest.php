<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Channels\SendAsPeers;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.getSendAs
 */
final class GetSendAsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe785a43f;
    
    public string $predicate = 'channels.getSendAs';
    
    public function getMethodName(): string
    {
        return 'channels.getSendAs';
    }
    
    public function getResponseClass(): string
    {
        return SendAsPeers::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param true|null $forPaidReactions
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?true $forPaidReactions = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forPaidReactions) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}