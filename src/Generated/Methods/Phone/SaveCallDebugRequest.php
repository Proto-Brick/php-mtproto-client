<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPhoneCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.saveCallDebug
 */
final class SaveCallDebugRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 662363518;
    
    public string $_ = 'phone.saveCallDebug';
    
    public function getMethodName(): string
    {
        return 'phone.saveCallDebug';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPhoneCall $peer
     * @param array $debug
     */
    public function __construct(
        public readonly AbstractInputPhoneCall $peer,
        public readonly array $debug
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= (new DataJSON(json_encode($this->debug)))->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}