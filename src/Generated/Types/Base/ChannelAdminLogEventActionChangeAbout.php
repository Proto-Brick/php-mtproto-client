<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeAbout
 */
final class ChannelAdminLogEventActionChangeAbout extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x55188a2e;
    
    public string $predicate = 'channelAdminLogEventActionChangeAbout';
    
    /**
     * @param string $prevValue
     * @param string $newValue
     */
    public function __construct(
        public readonly string $prevValue,
        public readonly string $newValue
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->prevValue);
        $buffer .= Serializer::bytes($this->newValue);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $prevValue = Deserializer::bytes($stream);
        $newValue = Deserializer::bytes($stream);

        return new self(
            $prevValue,
            $newValue
        );
    }
}