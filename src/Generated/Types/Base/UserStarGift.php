<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/userStarGift
 */
final class UserStarGift extends AbstractUserStarGift
{
    public const CONSTRUCTOR_ID = 4003764846;
    
    public string $_ = 'userStarGift';
    
    /**
     * @param int $date
     * @param AbstractStarGift $gift
     * @param bool|null $nameHidden
     * @param bool|null $unsaved
     * @param int|null $fromId
     * @param AbstractTextWithEntities|null $message
     * @param int|null $msgId
     * @param int|null $convertStars
     */
    public function __construct(
        public readonly int $date,
        public readonly AbstractStarGift $gift,
        public readonly ?bool $nameHidden = null,
        public readonly ?bool $unsaved = null,
        public readonly ?int $fromId = null,
        public readonly ?AbstractTextWithEntities $message = null,
        public readonly ?int $msgId = null,
        public readonly ?int $convertStars = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nameHidden) $flags |= (1 << 0);
        if ($this->unsaved) $flags |= (1 << 5);
        if ($this->fromId !== null) $flags |= (1 << 1);
        if ($this->message !== null) $flags |= (1 << 2);
        if ($this->msgId !== null) $flags |= (1 << 3);
        if ($this->convertStars !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int64($this->fromId);
        }
        $buffer .= $serializer->int32($this->date);
        $buffer .= $this->gift->serialize($serializer);
        if ($flags & (1 << 2)) {
            $buffer .= $this->message->serialize($serializer);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->int32($this->msgId);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int64($this->convertStars);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $nameHidden = ($flags & (1 << 0)) ? true : null;
        $unsaved = ($flags & (1 << 5)) ? true : null;
        $fromId = ($flags & (1 << 1)) ? $deserializer->int64($stream) : null;
        $date = $deserializer->int32($stream);
        $gift = AbstractStarGift::deserialize($deserializer, $stream);
        $message = ($flags & (1 << 2)) ? AbstractTextWithEntities::deserialize($deserializer, $stream) : null;
        $msgId = ($flags & (1 << 3)) ? $deserializer->int32($stream) : null;
        $convertStars = ($flags & (1 << 4)) ? $deserializer->int64($stream) : null;
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