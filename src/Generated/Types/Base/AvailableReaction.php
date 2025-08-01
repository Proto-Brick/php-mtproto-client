<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/availableReaction
 */
final class AvailableReaction extends AbstractAvailableReaction
{
    public const CONSTRUCTOR_ID = 3229084673;
    
    public string $_ = 'availableReaction';
    
    /**
     * @param string $reaction
     * @param string $title
     * @param AbstractDocument $staticIcon
     * @param AbstractDocument $appearAnimation
     * @param AbstractDocument $selectAnimation
     * @param AbstractDocument $activateAnimation
     * @param AbstractDocument $effectAnimation
     * @param bool|null $inactive
     * @param bool|null $premium
     * @param AbstractDocument|null $aroundAnimation
     * @param AbstractDocument|null $centerIcon
     */
    public function __construct(
        public readonly string $reaction,
        public readonly string $title,
        public readonly AbstractDocument $staticIcon,
        public readonly AbstractDocument $appearAnimation,
        public readonly AbstractDocument $selectAnimation,
        public readonly AbstractDocument $activateAnimation,
        public readonly AbstractDocument $effectAnimation,
        public readonly ?bool $inactive = null,
        public readonly ?bool $premium = null,
        public readonly ?AbstractDocument $aroundAnimation = null,
        public readonly ?AbstractDocument $centerIcon = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->inactive) $flags |= (1 << 0);
        if ($this->premium) $flags |= (1 << 2);
        if ($this->aroundAnimation !== null) $flags |= (1 << 1);
        if ($this->centerIcon !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->reaction);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $this->staticIcon->serialize($serializer);
        $buffer .= $this->appearAnimation->serialize($serializer);
        $buffer .= $this->selectAnimation->serialize($serializer);
        $buffer .= $this->activateAnimation->serialize($serializer);
        $buffer .= $this->effectAnimation->serialize($serializer);
        if ($flags & (1 << 1)) {
            $buffer .= $this->aroundAnimation->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->centerIcon->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $inactive = ($flags & (1 << 0)) ? true : null;
        $premium = ($flags & (1 << 2)) ? true : null;
        $reaction = $deserializer->bytes($stream);
        $title = $deserializer->bytes($stream);
        $staticIcon = AbstractDocument::deserialize($deserializer, $stream);
        $appearAnimation = AbstractDocument::deserialize($deserializer, $stream);
        $selectAnimation = AbstractDocument::deserialize($deserializer, $stream);
        $activateAnimation = AbstractDocument::deserialize($deserializer, $stream);
        $effectAnimation = AbstractDocument::deserialize($deserializer, $stream);
        $aroundAnimation = ($flags & (1 << 1)) ? AbstractDocument::deserialize($deserializer, $stream) : null;
        $centerIcon = ($flags & (1 << 1)) ? AbstractDocument::deserialize($deserializer, $stream) : null;
            return new self(
            $reaction,
            $title,
            $staticIcon,
            $appearAnimation,
            $selectAnimation,
            $activateAnimation,
            $effectAnimation,
            $inactive,
            $premium,
            $aroundAnimation,
            $centerIcon
        );
    }
}