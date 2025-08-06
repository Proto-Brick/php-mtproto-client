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
    
    public string $_ = 'channelAdminLogEventActionChangeAbout';
    
    /**
     * @param string $prevValue
     * @param string $newValue
     */
    public function __construct(
        public readonly string $prevValue,
        public readonly string $newValue
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->prevValue);
        $buffer .= $serializer->bytes($this->newValue);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $prevValue = $deserializer->bytes($stream);
        $newValue = $deserializer->bytes($stream);
        return new self(
            $prevValue,
            $newValue
        );
    }
}