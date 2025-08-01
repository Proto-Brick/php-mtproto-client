<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputInvoiceMessage
 */
final class InputInvoiceMessage extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 3317000281;
    
    public string $_ = 'inputInvoiceMessage';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->msgId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractInputPeer::deserialize($deserializer, $stream);
        $msgId = $deserializer->int32($stream);
            return new self(
            $peer,
            $msgId
        );
    }
}