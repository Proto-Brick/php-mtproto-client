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
    public const CONSTRUCTOR_ID = 0xddf10c3b;
    
    public string $predicate = 'messageMediaWebPage';
    
    /**
     * @param AbstractWebPage $webpage
     * @param true|null $forceLargeMedia
     * @param true|null $forceSmallMedia
     * @param true|null $manual
     * @param true|null $safe
     */
    public function __construct(
        public readonly AbstractWebPage $webpage,
        public readonly ?true $forceLargeMedia = null,
        public readonly ?true $forceSmallMedia = null,
        public readonly ?true $manual = null,
        public readonly ?true $safe = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forceLargeMedia) $flags |= (1 << 0);
        if ($this->forceSmallMedia) $flags |= (1 << 1);
        if ($this->manual) $flags |= (1 << 3);
        if ($this->safe) $flags |= (1 << 4);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->webpage->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $forceLargeMedia = ($flags & (1 << 0)) ? true : null;
        $forceSmallMedia = ($flags & (1 << 1)) ? true : null;
        $manual = ($flags & (1 << 3)) ? true : null;
        $safe = ($flags & (1 << 4)) ? true : null;
        $webpage = AbstractWebPage::deserialize($stream);

        return new self(
            $webpage,
            $forceLargeMedia,
            $forceSmallMedia,
            $manual,
            $safe
        );
    }
}