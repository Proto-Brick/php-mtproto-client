<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatePendingJoinRequests
 */
final class UpdatePendingJoinRequests extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 1885586395;
    
    public string $_ = 'updatePendingJoinRequests';
    
    /**
     * @param AbstractPeer $peer
     * @param int $requestsPending
     * @param list<int> $recentRequesters
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $requestsPending,
        public readonly array $recentRequesters
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->requestsPending);
        $buffer .= $serializer->vectorOfLongs($this->recentRequesters);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $requestsPending = $deserializer->int32($stream);
        $recentRequesters = $deserializer->vectorOfLongs($stream);
            return new self(
            $peer,
            $requestsPending,
            $recentRequesters
        );
    }
}