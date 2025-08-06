<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionRequestedPeer
 */
final class MessageActionRequestedPeer extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x31518e9b;
    
    public string $_ = 'messageActionRequestedPeer';
    
    /**
     * @param int $buttonId
     * @param list<AbstractPeer> $peers
     */
    public function __construct(
        public readonly int $buttonId,
        public readonly array $peers
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->buttonId);
        $buffer .= $serializer->vectorOfObjects($this->peers);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $buttonId = $deserializer->int32($stream);
        $peers = $deserializer->vectorOfObjects($stream, [AbstractPeer::class, 'deserialize']);
        return new self(
            $buttonId,
            $peers
        );
    }
}