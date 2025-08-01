<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/connectedBotStarRef
 */
final class ConnectedBotStarRef extends AbstractConnectedBotStarRef
{
    public const CONSTRUCTOR_ID = 429997937;
    
    public string $_ = 'connectedBotStarRef';
    
    /**
     * @param string $url
     * @param int $date
     * @param int $botId
     * @param int $commissionPermille
     * @param int $participants
     * @param int $revenue
     * @param bool|null $revoked
     * @param int|null $durationMonths
     */
    public function __construct(
        public readonly string $url,
        public readonly int $date,
        public readonly int $botId,
        public readonly int $commissionPermille,
        public readonly int $participants,
        public readonly int $revenue,
        public readonly ?bool $revoked = null,
        public readonly ?int $durationMonths = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revoked) $flags |= (1 << 1);
        if ($this->durationMonths !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int64($this->botId);
        $buffer .= $serializer->int32($this->commissionPermille);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->durationMonths);
        }
        $buffer .= $serializer->int64($this->participants);
        $buffer .= $serializer->int64($this->revenue);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $revoked = ($flags & (1 << 1)) ? true : null;
        $url = $deserializer->bytes($stream);
        $date = $deserializer->int32($stream);
        $botId = $deserializer->int64($stream);
        $commissionPermille = $deserializer->int32($stream);
        $durationMonths = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $participants = $deserializer->int64($stream);
        $revenue = $deserializer->int64($stream);
            return new self(
            $url,
            $date,
            $botId,
            $commissionPermille,
            $participants,
            $revenue,
            $revoked,
            $durationMonths
        );
    }
}