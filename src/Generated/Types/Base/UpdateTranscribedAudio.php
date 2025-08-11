<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateTranscribedAudio
 */
final class UpdateTranscribedAudio extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x84cd5a;
    
    public string $_ = 'updateTranscribedAudio';
    
    /**
     * @param AbstractPeer $peer
     * @param int $msgId
     * @param int $transcriptionId
     * @param string $text
     * @param bool|null $pending
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $msgId,
        public readonly int $transcriptionId,
        public readonly string $text,
        public readonly ?bool $pending = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pending) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::int64($this->transcriptionId);
        $buffer .= Serializer::bytes($this->text);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $pending = ($flags & (1 << 0)) ? true : null;
        $peer = AbstractPeer::deserialize($stream);
        $msgId = Deserializer::int32($stream);
        $transcriptionId = Deserializer::int64($stream);
        $text = Deserializer::bytes($stream);
        return new self(
            $peer,
            $msgId,
            $transcriptionId,
            $text,
            $pending
        );
    }
}