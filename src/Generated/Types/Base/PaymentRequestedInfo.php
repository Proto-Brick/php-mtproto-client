<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/paymentRequestedInfo
 */
final class PaymentRequestedInfo extends TlObject
{
    public const CONSTRUCTOR_ID = 0x909c3f94;
    
    public string $predicate = 'paymentRequestedInfo';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->name !== null) {
            $flags |= (1 << 0);
        }
        if ($this->phone !== null) {
            $flags |= (1 << 1);
        }
        if ($this->email !== null) {
            $flags |= (1 << 2);
        }
        if ($this->shippingAddress !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->name);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->phone);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->email);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->shippingAddress->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $name = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($stream) : null;
        $phone = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;
        $email = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($stream) : null;
        $shippingAddress = (($flags & (1 << 3)) !== 0) ? PostAddress::deserialize($stream) : null;

        return new self(
            $name,
            $phone,
            $email,
            $shippingAddress
        );
    }
}