<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractBankCardData;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getBankCardData
 */
final class GetBankCardDataRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 779736953;
    
    public string $_ = 'payments.getBankCardData';
    
    public function getMethodName(): string
    {
        return 'payments.getBankCardData';
    }
    
    public function getResponseClass(): string
    {
        return AbstractBankCardData::class;
    }
    /**
     * @param string $number
     */
    public function __construct(
        public readonly string $number
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->number);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}