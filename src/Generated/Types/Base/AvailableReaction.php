<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/availableReaction
 */
final class AvailableReaction extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc077ec01;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->inactive) $flags |= (1 << 0);
        if ($this->premium) $flags |= (1 << 2);
        if ($this->aroundAnimation !== null) $flags |= (1 << 1);
        if ($this->centerIcon !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->reaction);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= $this->staticIcon->serialize();
        $buffer .= $this->appearAnimation->serialize();
        $buffer .= $this->selectAnimation->serialize();
        $buffer .= $this->activateAnimation->serialize();
        $buffer .= $this->effectAnimation->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= $this->aroundAnimation->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->centerIcon->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $inactive = ($flags & (1 << 0)) ? true : null;
        $premium = ($flags & (1 << 2)) ? true : null;
        $reaction = Deserializer::bytes($stream);
        $title = Deserializer::bytes($stream);
        $staticIcon = AbstractDocument::deserialize($stream);
        $appearAnimation = AbstractDocument::deserialize($stream);
        $selectAnimation = AbstractDocument::deserialize($stream);
        $activateAnimation = AbstractDocument::deserialize($stream);
        $effectAnimation = AbstractDocument::deserialize($stream);
        $aroundAnimation = ($flags & (1 << 1)) ? AbstractDocument::deserialize($stream) : null;
        $centerIcon = ($flags & (1 << 1)) ? AbstractDocument::deserialize($stream) : null;
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