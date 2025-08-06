<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionStarGift
 */
final class MessageActionStarGift extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x8557637;
    
    public string $_ = 'messageActionStarGift';
    
    /**
     * @param StarGift $gift
     * @param bool|null $nameHidden
     * @param bool|null $saved
     * @param bool|null $converted
     * @param TextWithEntities|null $message
     * @param int|null $convertStars
     */
    public function __construct(
        public readonly StarGift $gift,
        public readonly ?bool $nameHidden = null,
        public readonly ?bool $saved = null,
        public readonly ?bool $converted = null,
        public readonly ?TextWithEntities $message = null,
        public readonly ?int $convertStars = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nameHidden) $flags |= (1 << 0);
        if ($this->saved) $flags |= (1 << 2);
        if ($this->converted) $flags |= (1 << 3);
        if ($this->message !== null) $flags |= (1 << 1);
        if ($this->convertStars !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->gift->serialize($serializer);
        if ($flags & (1 << 1)) {
            $buffer .= $this->message->serialize($serializer);
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
        $saved = ($flags & (1 << 2)) ? true : null;
        $converted = ($flags & (1 << 3)) ? true : null;
        $gift = StarGift::deserialize($deserializer, $stream);
        $message = ($flags & (1 << 1)) ? TextWithEntities::deserialize($deserializer, $stream) : null;
        $convertStars = ($flags & (1 << 4)) ? $deserializer->int64($stream) : null;
        return new self(
            $gift,
            $nameHidden,
            $saved,
            $converted,
            $message,
            $convertStars
        );
    }
}