<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starGiftUpgradePrice
 */
final class StarGiftUpgradePrice extends TlObject
{
    public const CONSTRUCTOR_ID = 0x99ea331d;
    
    public string $predicate = 'starGiftUpgradePrice';
    
    /**
     * @param int $date
     * @param int $upgradeStars
     */
    public function __construct(
        public readonly int $date,
        public readonly int $upgradeStars
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int64($this->upgradeStars);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $date = Deserializer::int32($__payload, $__offset);
        $upgradeStars = Deserializer::int64($__payload, $__offset);

        return new self(
            $date,
            $upgradeStars
        );
    }
}