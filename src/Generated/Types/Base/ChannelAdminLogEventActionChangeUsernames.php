<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeUsernames
 */
final class ChannelAdminLogEventActionChangeUsernames extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 4031755177;
    
    public string $_ = 'channelAdminLogEventActionChangeUsernames';
    
    /**
     * @param list<string> $prevValue
     * @param list<string> $newValue
     */
    public function __construct(
        public readonly array $prevValue,
        public readonly array $newValue
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfStrings($this->prevValue);
        $buffer .= $serializer->vectorOfStrings($this->newValue);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $prevValue = $deserializer->vectorOfStrings($stream);
        $newValue = $deserializer->vectorOfStrings($stream);
            return new self(
            $prevValue,
            $newValue
        );
    }
}