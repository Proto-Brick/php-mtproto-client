<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGroupCall;
use DigitalStars\MtprotoClient\Generated\Types\Phone\AbstractGroupCallStreamChannels;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.getGroupCallStreamChannels
 */
final class GetGroupCallStreamChannelsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 447879488;
    
    public string $_ = 'phone.getGroupCallStreamChannels';
    
    public function getMethodName(): string
    {
        return 'phone.getGroupCallStreamChannels';
    }
    
    public function getResponseClass(): string
    {
        return AbstractGroupCallStreamChannels::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}