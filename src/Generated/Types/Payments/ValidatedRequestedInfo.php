<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractShippingOption;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.validatedRequestedInfo
 */
final class ValidatedRequestedInfo extends AbstractValidatedRequestedInfo
{
    public const CONSTRUCTOR_ID = 3510966403;
    
    public string $_ = 'payments.validatedRequestedInfo';
    
    /**
     * @param string|null $id
     * @param list<AbstractShippingOption>|null $shippingOptions
     */
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?array $shippingOptions = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->id !== null) $flags |= (1 << 0);
        if ($this->shippingOptions !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->id);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfObjects($this->shippingOptions);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $id = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $shippingOptions = ($flags & (1 << 1)) ? $deserializer->vectorOfObjects($stream, [AbstractShippingOption::class, 'deserialize']) : null;
            return new self(
            $id,
            $shippingOptions
        );
    }
}