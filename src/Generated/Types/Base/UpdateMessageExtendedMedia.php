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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::vectorOfObjects($this->extendedMedia);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($stream);
        $msgId = Deserializer::int32($stream);
        $extendedMedia = Deserializer::vectorOfObjects($stream, [AbstractMessageExtendedMedia::class, 'deserialize']);
        return new self(
            $peer,
            $msgId,
            $extendedMedia
        );
    }
}