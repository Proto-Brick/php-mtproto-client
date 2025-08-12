<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/statsGroupTopAdmin
 */
final class StatsGroupTopAdmin extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd7584c87;
    
    public string $predicate = 'statsGroupTopAdmin';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->deleted);
        $buffer .= Serializer::int32($this->kicked);
        $buffer .= Serializer::int32($this->banned);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $userId = Deserializer::int64($stream);
        $deleted = Deserializer::int32($stream);
        $kicked = Deserializer::int32($stream);
        $banned = Deserializer::int32($stream);

        return new self(
            $userId,
            $deleted,
            $kicked,
            $banned
        );
    }
}