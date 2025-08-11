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
    public const CONSTRUCTOR_ID = 0xa584b019;
    
    public string $_ = 'updateStarsRevenueStatus';
    
    /**
     * @param AbstractPeer $peer
     * @param StarsRevenueStatus $status
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly StarsRevenueStatus $status
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->status->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($stream);
        $status = StarsRevenueStatus::deserialize($stream);
        return new self(
            $peer,
            $status
        );
    }
}