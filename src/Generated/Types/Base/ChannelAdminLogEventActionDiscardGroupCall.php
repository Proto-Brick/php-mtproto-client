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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $call = InputGroupCall::deserialize($stream);
        return new self(
            $call
        );
    }
}