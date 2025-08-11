<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/postAddress
 */
final class PostAddress extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1e8caaeb;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->streetLine1);
        $buffer .= Serializer::bytes($this->streetLine2);
        $buffer .= Serializer::bytes($this->city);
        $buffer .= Serializer::bytes($this->state);
        $buffer .= Serializer::bytes($this->countryIso2);
        $buffer .= Serializer::bytes($this->postCode);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $streetLine1 = Deserializer::bytes($stream);
        $streetLine2 = Deserializer::bytes($stream);
        $city = Deserializer::bytes($stream);
        $state = Deserializer::bytes($stream);
        $countryIso2 = Deserializer::bytes($stream);
        $postCode = Deserializer::bytes($stream);
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