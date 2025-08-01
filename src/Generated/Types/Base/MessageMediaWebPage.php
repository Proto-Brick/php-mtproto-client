<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageMediaWebPage
 */
final class MessageMediaWebPage extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 3723562043;
    
    public string $_ = 'messageMediaWebPage';
    
    /**
     * @param AbstractWebPage $webpage
     * @param bool|null $forceLargeMedia
     * @param bool|null $forceSmallMedia
     * @param bool|null $manual
     * @param bool|null $safe
     */
    public function __construct(
        public readonly AbstractWebPage $webpage,
        public readonly ?bool $forceLargeMedia = null,
        public readonly ?bool $forceSmallMedia = null,
        public readonly ?bool $manual = null,
        public readonly ?bool $safe = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forceLargeMedia) $flags |= (1 << 0);
        if ($this->forceSmallMedia) $flags |= (1 << 1);
        if ($this->manual) $flags |= (1 << 3);
        if ($this->safe) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->webpage->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $forceLargeMedia = ($flags & (1 << 0)) ? true : null;
        $forceSmallMedia = ($flags & (1 << 1)) ? true : null;
        $manual = ($flags & (1 << 3)) ? true : null;
        $safe = ($flags & (1 << 4)) ? true : null;
        $webpage = AbstractWebPage::deserialize($deserializer, $stream);
            return new self(
            $webpage,
            $forceLargeMedia,
            $forceSmallMedia,
            $manual,
            $safe
        );
    }
}