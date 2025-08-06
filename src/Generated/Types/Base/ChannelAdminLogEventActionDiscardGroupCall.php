<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionDiscardGroupCall
 */
final class ChannelAdminLogEventActionDiscardGroupCall extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xdb9f9140;
    
    public string $_ = 'channelAdminLogEventActionDiscardGroupCall';
    
    /**
     * @param InputGroupCall $call
     */
    public function __construct(
        public readonly InputGroupCall $call
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $call = InputGroupCall::deserialize($deserializer, $stream);
        return new self(
            $call
        );
    }
}