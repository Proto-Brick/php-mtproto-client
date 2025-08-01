<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractCheckedGiftCode;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.checkGiftCode
 */
final class CheckGiftCodeRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2387719361;
    
    public string $_ = 'payments.checkGiftCode';
    
    public function getMethodName(): string
    {
        return 'payments.checkGiftCode';
    }
    
    public function getResponseClass(): string
    {
        return AbstractCheckedGiftCode::class;
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