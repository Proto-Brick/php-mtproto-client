<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionGiveawayLaunch
 */
final class MessageActionGiveawayLaunch extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 2819576292;
    
    public string $_ = 'messageActionGiveawayLaunch';
    
    /**
     * @param int|null $stars
     */
    public function __construct(
        public readonly ?int $stars = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->stars !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int64($this->stars);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $stars = ($flags & (1 << 0)) ? $deserializer->int64($stream) : null;
            return new self(
            $stars
        );
    }
}