<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/sendAsPeer
 */
final class SendAsPeer extends AbstractSendAsPeer
{
    public const CONSTRUCTOR_ID = 3088871476;
    
    public string $_ = 'sendAsPeer';
    
    /**
     * @param AbstractPeer $peer
     * @param bool|null $premiumRequired
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly ?bool $premiumRequired = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->premiumRequired) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $premiumRequired = ($flags & (1 << 0)) ? true : null;
        $peer = AbstractPeer::deserialize($deserializer, $stream);
            return new self(
            $peer,
            $premiumRequired
        );
    }
}