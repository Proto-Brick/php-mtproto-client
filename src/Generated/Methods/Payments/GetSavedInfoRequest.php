<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Payments\SavedInfo;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getSavedInfo
 */
final class GetSavedInfoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x227d824b;
    
    public string $_ = 'payments.getSavedInfo';
    
    public function getMethodName(): string
    {
        return 'payments.getSavedInfo';
    }
    
    public function getResponseClass(): string
    {
        return SavedInfo::class;
    }
    public function __construct() {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}