<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputStorePaymentPremiumSubscription
 */
final class InputStorePaymentPremiumSubscription extends AbstractInputStorePaymentPurpose
{
    public const CONSTRUCTOR_ID = 0xa6751e66;
    
    public string $_ = 'inputStorePaymentPremiumSubscription';
    
    /**
     * @param bool|null $restore
     * @param bool|null $upgrade
     */
    public function __construct(
        public readonly ?bool $restore = null,
        public readonly ?bool $upgrade = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->restore) $flags |= (1 << 0);
        if ($this->upgrade) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $restore = ($flags & (1 << 0)) ? true : null;
        $upgrade = ($flags & (1 << 1)) ? true : null;
        return new self(
            $restore,
            $upgrade
        );
    }
}