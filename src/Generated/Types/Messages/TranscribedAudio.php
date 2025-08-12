<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.transcribedAudio
 */
final class TranscribedAudio extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcfb9d957;
    
    public string $predicate = 'messages.transcribedAudio';
    
    /**
     * @param int $transcriptionId
     * @param string $text
     * @param true|null $pending
     * @param int|null $trialRemainsNum
     * @param int|null $trialRemainsUntilDate
     */
    public function __construct(
        public readonly int $transcriptionId,
        public readonly string $text,
        public readonly ?true $pending = null,
        public readonly ?int $trialRemainsNum = null,
        public readonly ?int $trialRemainsUntilDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pending) $flags |= (1 << 0);
        if ($this->trialRemainsNum !== null) $flags |= (1 << 1);
        if ($this->trialRemainsUntilDate !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->transcriptionId);
        $buffer .= Serializer::bytes($this->text);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->trialRemainsNum);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->trialRemainsUntilDate);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $pending = ($flags & (1 << 0)) ? true : null;
        $transcriptionId = Deserializer::int64($stream);
        $text = Deserializer::bytes($stream);
        $trialRemainsNum = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        $trialRemainsUntilDate = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;

        return new self(
            $transcriptionId,
            $text,
            $pending,
            $trialRemainsNum,
            $trialRemainsUntilDate
        );
    }
}