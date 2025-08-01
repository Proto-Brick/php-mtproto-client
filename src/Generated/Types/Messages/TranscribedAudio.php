<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.transcribedAudio
 */
final class TranscribedAudio extends AbstractTranscribedAudio
{
    public const CONSTRUCTOR_ID = 3485063511;
    
    public string $_ = 'messages.transcribedAudio';
    
    /**
     * @param int $transcriptionId
     * @param string $text
     * @param bool|null $pending
     * @param int|null $trialRemainsNum
     * @param int|null $trialRemainsUntilDate
     */
    public function __construct(
        public readonly int $transcriptionId,
        public readonly string $text,
        public readonly ?bool $pending = null,
        public readonly ?int $trialRemainsNum = null,
        public readonly ?int $trialRemainsUntilDate = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pending) $flags |= (1 << 0);
        if ($this->trialRemainsNum !== null) $flags |= (1 << 1);
        if ($this->trialRemainsUntilDate !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->transcriptionId);
        $buffer .= $serializer->bytes($this->text);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->trialRemainsNum);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->trialRemainsUntilDate);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $pending = ($flags & (1 << 0)) ? true : null;
        $transcriptionId = $deserializer->int64($stream);
        $text = $deserializer->bytes($stream);
        $trialRemainsNum = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $trialRemainsUntilDate = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
            return new self(
            $transcriptionId,
            $text,
            $pending,
            $trialRemainsNum,
            $trialRemainsUntilDate
        );
    }
}