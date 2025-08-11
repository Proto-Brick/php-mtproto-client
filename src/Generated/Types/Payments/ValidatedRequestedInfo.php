<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\ShippingOption;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.validatedRequestedInfo
 */
final class ValidatedRequestedInfo extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd1451883;
    
    public string $_ = 'payments.validatedRequestedInfo';
    
    /**
     * @param string|null $id
     * @param list<ShippingOption>|null $shippingOptions
     */
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?array $shippingOptions = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->id !== null) $flags |= (1 << 0);
        if ($this->shippingOptions !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->id);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->shippingOptions);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $id = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $shippingOptions = ($flags & (1 << 1)) ? Deserializer::vectorOfObjects($stream, [ShippingOption::class, 'deserialize']) : null;
        return new self(
            $id,
            $shippingOptions
        );
    }
}