<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateReadHistoryOutbox
 */
final class UpdateReadHistoryOutbox extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x2f2f21bf;
    
    public string $_ = 'updateReadHistoryOutbox';
    
    /**
     * @param AbstractPeer $peer
     * @param int $maxId
     * @param int $pts
     * @param int $ptsCount
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $maxId,
        public readonly int $pts,
        public readonly int $ptsCount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->maxId);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($stream);
        $maxId = Deserializer::int32($stream);
        $pts = Deserializer::int32($stream);
        $ptsCount = Deserializer::int32($stream);
        return new self(
            $peer,
            $maxId,
            $pts,
            $ptsCount
        );
    }
}