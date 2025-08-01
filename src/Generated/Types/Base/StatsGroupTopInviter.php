<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/statsGroupTopInviter
 */
final class StatsGroupTopInviter extends AbstractStatsGroupTopInviter
{
    public const CONSTRUCTOR_ID = 1398765469;
    
    public string $_ = 'statsGroupTopInviter';
    
    /**
     * @param int $userId
     * @param int $invitations
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $invitations
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->int32($this->invitations);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $userId = $deserializer->int64($stream);
        $invitations = $deserializer->int32($stream);
            return new self(
            $userId,
            $invitations
        );
    }
}