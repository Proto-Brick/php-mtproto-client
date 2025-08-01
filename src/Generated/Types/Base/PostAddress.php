<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/postAddress
 */
final class PostAddress extends AbstractPostAddress
{
    public const CONSTRUCTOR_ID = 512535275;
    
    public string $_ = 'postAddress';
    
    /**
     * @param string $streetLine1
     * @param string $streetLine2
     * @param string $city
     * @param string $state
     * @param string $countryIso2
     * @param string $postCode
     */
    public function __construct(
        public readonly string $streetLine1,
        public readonly string $streetLine2,
        public readonly string $city,
        public readonly string $state,
        public readonly string $countryIso2,
        public readonly string $postCode
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->streetLine1);
        $buffer .= $serializer->bytes($this->streetLine2);
        $buffer .= $serializer->bytes($this->city);
        $buffer .= $serializer->bytes($this->state);
        $buffer .= $serializer->bytes($this->countryIso2);
        $buffer .= $serializer->bytes($this->postCode);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $streetLine1 = $deserializer->bytes($stream);
        $streetLine2 = $deserializer->bytes($stream);
        $city = $deserializer->bytes($stream);
        $state = $deserializer->bytes($stream);
        $countryIso2 = $deserializer->bytes($stream);
        $postCode = $deserializer->bytes($stream);
            return new self(
            $streetLine1,
            $streetLine2,
            $city,
            $state,
            $countryIso2,
            $postCode
        );
    }
}