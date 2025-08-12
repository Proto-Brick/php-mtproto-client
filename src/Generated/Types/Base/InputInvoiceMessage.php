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
    public const CONSTRUCTOR_ID = 0xc5b56859;
    
    public string $predicate = 'inputInvoiceMessage';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractInputPeer::deserialize($stream);
        $msgId = Deserializer::int32($stream);

        return new self(
            $peer,
            $msgId
        );
    }
}