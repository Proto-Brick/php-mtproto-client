<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.getCallConfig
 */
final class GetCallConfigRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x55451fa9;
    
    public string $_ = 'phone.getCallConfig';
    
    public function getMethodName(): string
    {
        return 'phone.getCallConfig';
    }
    
    public function getResponseClass(): string
    {
        return 'array';
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