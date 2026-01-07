<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Base\Timezone;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/help.timezonesList
 */
final class TimezonesList extends AbstractTimezonesList
{
    public const CONSTRUCTOR_ID = 0x7b74ed71;
    
    public string $predicate = 'help.timezonesList';
    
    /**
     * @param list<Timezone> $timezones
     * @param int $hash
     */
    public function __construct(
        public readonly array $timezones,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->timezones);
        $buffer .= Serializer::int32($this->hash);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $timezones = Deserializer::vectorOfObjects($__payload, $__offset, [Timezone::class, 'deserialize']);
        $hash = Deserializer::int32($__payload, $__offset);

        return new self(
            $timezones,
            $hash
        );
    }
}