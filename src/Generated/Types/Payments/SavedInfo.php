<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\PaymentRequestedInfo;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.savedInfo
 */
final class SavedInfo extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfb8fe43c;
    
    public string $predicate = 'payments.savedInfo';
    
    /**
     * @param true|null $hasSavedCredentials
     * @param PaymentRequestedInfo|null $savedInfo
     */
    public function __construct(
        public readonly ?true $hasSavedCredentials = null,
        public readonly ?PaymentRequestedInfo $savedInfo = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasSavedCredentials) $flags |= (1 << 1);
        if ($this->savedInfo !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->savedInfo->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $hasSavedCredentials = ($flags & (1 << 1)) ? true : null;
        $savedInfo = ($flags & (1 << 0)) ? PaymentRequestedInfo::deserialize($stream) : null;

        return new self(
            $hasSavedCredentials,
            $savedInfo
        );
    }
}