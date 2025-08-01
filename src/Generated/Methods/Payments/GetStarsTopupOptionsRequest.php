<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStarsTopupOption;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarsTopupOptions
 */
final class GetStarsTopupOptionsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3222194131;
    
    public string $_ = 'payments.getStarsTopupOptions';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsTopupOptions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStarsTopupOption::class;
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