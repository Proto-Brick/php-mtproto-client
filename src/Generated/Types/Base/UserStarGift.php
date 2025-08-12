<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/userStarGift
 */
final class UserStarGift extends TlObject
{
    public const CONSTRUCTOR_ID = 0xeea49a6e;
    
    public string $predicate = 'userStarGift';
    
    /**
     * @param int $date
     * @param StarGift $gift
     * @param true|null $nameHidden
     * @param true|null $unsaved
     * @param int|null $fromId
     * @param TextWithEntities|null $message
     * @param int|null $msgId
     * @param int|null $convertStars
     */
    public function __construct(
        public readonly int $date,
        public readonly StarGift $gift,
        public readonly ?true $nameHidden = null,
        public readonly ?true $unsaved = null,
        public readonly ?int $fromId = null,
        public readonly ?TextWithEntities $message = null,
        public readonly ?int $msgId = null,
        public readonly ?int $convertStars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nameHidden) $flags |= (1 << 0);
        if ($this->unsaved) $flags |= (1 << 5);
        if ($this->fromId !== null) $flags |= (1 << 1);
        if ($this->message !== null) $flags |= (1 << 2);
        if ($this->msgId !== null) $flags |= (1 << 3);
        if ($this->convertStars !== null) $flags |= (1 << 4);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int64($this->fromId);
        }
        $buffer .= Serializer::int32($this->date);
        $buffer .= $this->gift->serialize();
        if ($flags & (1 << 2)) {
            $buffer .= $this->message->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->msgId);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int64($this->convertStars);
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
        $nameHidden = ($flags & (1 << 0)) ? true : null;
        $unsaved = ($flags & (1 << 5)) ? true : null;
        $fromId = ($flags & (1 << 1)) ? Deserializer::int64($stream) : null;
        $date = Deserializer::int32($stream);
        $gift = StarGift::deserialize($stream);
        $message = ($flags & (1 << 2)) ? TextWithEntities::deserialize($stream) : null;
        $msgId = ($flags & (1 << 3)) ? Deserializer::int32($stream) : null;
        $convertStars = ($flags & (1 << 4)) ? Deserializer::int64($stream) : null;

        return new self(
            $date,
            $gift,
            $nameHidden,
            $unsaved,
            $fromId,
            $message,
            $msgId,
            $convertStars
        );
    }
}