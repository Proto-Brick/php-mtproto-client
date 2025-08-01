<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/statsGroupTopAdmin
 */
final class StatsGroupTopAdmin extends AbstractStatsGroupTopAdmin
{
    public const CONSTRUCTOR_ID = 3612888199;
    
    public string $_ = 'statsGroupTopAdmin';
    
    /**
     * @param int $userId
     * @param int $deleted
     * @param int $kicked
     * @param int $banned
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $deleted,
        public readonly int $kicked,
        public readonly int $banned
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->int32($this->deleted);
        $buffer .= $serializer->int32($this->kicked);
        $buffer .= $serializer->int32($this->banned);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $userId = $deserializer->int64($stream);
        $deleted = $deserializer->int32($stream);
        $kicked = $deserializer->int32($stream);
        $banned = $deserializer->int32($stream);
            return new self(
            $userId,
            $deleted,
            $kicked,
            $banned
        );
    }
}