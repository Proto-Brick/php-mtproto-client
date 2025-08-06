<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Messages\InactiveChats;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.getInactiveChannels
 */
final class GetInactiveChannelsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x11e831ee;
    
    public string $_ = 'channels.getInactiveChannels';
    
    public function getMethodName(): string
    {
        return 'channels.getInactiveChannels';
    }
    
    public function getResponseClass(): string
    {
        return InactiveChats::class;
    }
    public function __construct() {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}