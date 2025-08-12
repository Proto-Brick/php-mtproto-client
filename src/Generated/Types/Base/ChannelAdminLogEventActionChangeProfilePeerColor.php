<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeProfilePeerColor
 */
final class ChannelAdminLogEventActionChangeProfilePeerColor extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x5e477b25;
    
    public string $predicate = 'channelAdminLogEventActionChangeProfilePeerColor';
    
    /**
     * @param PeerColor $prevValue
     * @param PeerColor $newValue
     */
    public function __construct(
        public readonly PeerColor $prevValue,
        public readonly PeerColor $newValue
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevValue->serialize();
        $buffer .= $this->newValue->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $prevValue = PeerColor::deserialize($stream);
        $newValue = PeerColor::deserialize($stream);

        return new self(
            $prevValue,
            $newValue
        );
    }
}