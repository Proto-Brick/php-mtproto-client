<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractGroupCallStreamChannel;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/phone.groupCallStreamChannels
 */
final class GroupCallStreamChannels extends AbstractGroupCallStreamChannels
{
    public const CONSTRUCTOR_ID = 3504636594;
    
    public string $_ = 'phone.groupCallStreamChannels';
    
    /**
     * @param list<AbstractGroupCallStreamChannel> $channels
     */
    public function __construct(
        public readonly array $channels
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->channels);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $channels = $deserializer->vectorOfObjects($stream, [AbstractGroupCallStreamChannel::class, 'deserialize']);
            return new self(
            $channels
        );
    }
}