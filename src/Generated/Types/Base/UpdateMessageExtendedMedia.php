<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateMessageExtendedMedia
 */
final class UpdateMessageExtendedMedia extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xd5a41724;
    
    public string $_ = 'updateMessageExtendedMedia';
    
    /**
     * @param AbstractPeer $peer
     * @param int $msgId
     * @param list<AbstractMessageExtendedMedia> $extendedMedia
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $msgId,
        public readonly array $extendedMedia
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->msgId);
        $buffer .= $serializer->vectorOfObjects($this->extendedMedia);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $msgId = $deserializer->int32($stream);
        $extendedMedia = $deserializer->vectorOfObjects($stream, [AbstractMessageExtendedMedia::class, 'deserialize']);
        return new self(
            $peer,
            $msgId,
            $extendedMedia
        );
    }
}