<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\PremiumGiftCodeOption;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getPremiumGiftCodeOptions
 */
final class GetPremiumGiftCodeOptionsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2757ba54;
    
    public string $_ = 'payments.getPremiumGiftCodeOptions';
    
    public function getMethodName(): string
    {
        return 'payments.getPremiumGiftCodeOptions';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . PremiumGiftCodeOption::class . '>';
    }
    /**
     * @param AbstractInputPeer|null $boostPeer
     */
    public function __construct(
        public readonly ?AbstractInputPeer $boostPeer = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->boostPeer !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->boostPeer->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}