<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeHistoryTTL
 */
final class ChannelAdminLogEventActionChangeHistoryTTL extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x6e941a38;
    
    public string $predicate = 'channelAdminLogEventActionChangeHistoryTTL';
    
    /**
     * @param int $prevValue
     * @param int $newValue
     */
    public function __construct(
        public readonly int $prevValue,
        public readonly int $newValue
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->prevValue);
        $buffer .= Serializer::int32($this->newValue);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $prevValue = Deserializer::int32($stream);
        $newValue = Deserializer::int32($stream);

        return new self(
            $prevValue,
            $newValue
        );
    }
}