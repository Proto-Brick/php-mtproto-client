<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Payments\CheckedGiftCode;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.checkGiftCode
 */
final class CheckGiftCodeRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8e51b4c1;
    
    public string $_ = 'payments.checkGiftCode';
    
    public function getMethodName(): string
    {
        return 'payments.checkGiftCode';
    }
    
    public function getResponseClass(): string
    {
        return CheckedGiftCode::class;
    }
    /**
     * @param string $slug
     */
    public function __construct(
        public readonly string $slug
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->slug);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}