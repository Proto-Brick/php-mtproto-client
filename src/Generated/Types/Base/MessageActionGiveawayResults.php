<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionGiveawayResults
 */
final class MessageActionGiveawayResults extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x87e2f155;
    
    public string $_ = 'messageActionGiveawayResults';
    
    /**
     * @param int $winnersCount
     * @param int $unclaimedCount
     * @param bool|null $stars
     */
    public function __construct(
        public readonly int $winnersCount,
        public readonly int $unclaimedCount,
        public readonly ?bool $stars = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->stars) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->winnersCount);
        $buffer .= $serializer->int32($this->unclaimedCount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $stars = ($flags & (1 << 0)) ? true : null;
        $winnersCount = $deserializer->int32($stream);
        $unclaimedCount = $deserializer->int32($stream);
        return new self(
            $winnersCount,
            $unclaimedCount,
            $stars
        );
    }
}