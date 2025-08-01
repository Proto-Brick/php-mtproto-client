<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPaymentRequestedInfo;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.savedInfo
 */
final class SavedInfo extends AbstractSavedInfo
{
    public const CONSTRUCTOR_ID = 4220511292;
    
    public string $_ = 'payments.savedInfo';
    
    /**
     * @param bool|null $hasSavedCredentials
     * @param AbstractPaymentRequestedInfo|null $savedInfo
     */
    public function __construct(
        public readonly ?bool $hasSavedCredentials = null,
        public readonly ?AbstractPaymentRequestedInfo $savedInfo = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasSavedCredentials) $flags |= (1 << 1);
        if ($this->savedInfo !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->savedInfo->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $hasSavedCredentials = ($flags & (1 << 1)) ? true : null;
        $savedInfo = ($flags & (1 << 0)) ? AbstractPaymentRequestedInfo::deserialize($deserializer, $stream) : null;
            return new self(
            $hasSavedCredentials,
            $savedInfo
        );
    }
}