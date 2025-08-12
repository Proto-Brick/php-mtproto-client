<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/connectedBotStarRef
 */
final class ConnectedBotStarRef extends TlObject
{
    public const CONSTRUCTOR_ID = 0x19a13f71;
    
    public string $predicate = 'connectedBotStarRef';
    
    /**
     * @param string $url
     * @param int $date
     * @param int $botId
     * @param int $commissionPermille
     * @param int $participants
     * @param int $revenue
     * @param true|null $revoked
     * @param int|null $durationMonths
     */
    public function __construct(
        public readonly string $url,
        public readonly int $date,
        public readonly int $botId,
        public readonly int $commissionPermille,
        public readonly int $participants,
        public readonly int $revenue,
        public readonly ?true $revoked = null,
        public readonly ?int $durationMonths = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revoked) $flags |= (1 << 1);
        if ($this->durationMonths !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int64($this->botId);
        $buffer .= Serializer::int32($this->commissionPermille);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->durationMonths);
        }
        $buffer .= Serializer::int64($this->participants);
        $buffer .= Serializer::int64($this->revenue);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $revoked = ($flags & (1 << 1)) ? true : null;
        $url = Deserializer::bytes($stream);
        $date = Deserializer::int32($stream);
        $botId = Deserializer::int64($stream);
        $commissionPermille = Deserializer::int32($stream);
        $durationMonths = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $participants = Deserializer::int64($stream);
        $revenue = Deserializer::int64($stream);

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