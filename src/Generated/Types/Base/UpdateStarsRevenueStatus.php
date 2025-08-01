<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateStarsRevenueStatus
 */
final class UpdateStarsRevenueStatus extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 2776936473;
    
    public string $_ = 'updateStarsRevenueStatus';
    
    /**
     * @param AbstractPeer $peer
     * @param AbstractStarsRevenueStatus $status
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly AbstractStarsRevenueStatus $status
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->status->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $status = AbstractStarsRevenueStatus::deserialize($deserializer, $stream);
            return new self(
            $peer,
            $status
        );
    }
}