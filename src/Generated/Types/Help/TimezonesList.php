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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $timezones = Deserializer::vectorOfObjects($stream, [Timezone::class, 'deserialize']);
        $hash = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $timezones,
            $hash
        );
    }
}