<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/paymentRequestedInfo
 */
final class PaymentRequestedInfo extends TlObject
{
    public const CONSTRUCTOR_ID = 0x909c3f94;
    
    public string $_ = 'paymentRequestedInfo';
    
    /**
     * @param string|null $name
     * @param string|null $phone
     * @param string|null $email
     * @param PostAddress|null $shippingAddress
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $phone = null,
        public readonly ?string $email = null,
        public readonly ?PostAddress $shippingAddress = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->name !== null) $flags |= (1 << 0);
        if ($this->phone !== null) $flags |= (1 << 1);
        if ($this->email !== null) $flags |= (1 << 2);
        if ($this->shippingAddress !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->name);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->phone);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->email);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->shippingAddress->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $name = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $phone = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $email = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        $shippingAddress = ($flags & (1 << 3)) ? PostAddress::deserialize($deserializer, $stream) : null;
        return new self(
            $name,
            $phone,
            $email,
            $shippingAddress
        );
    }
}