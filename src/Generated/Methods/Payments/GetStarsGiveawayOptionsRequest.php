<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStarsGiveawayOption;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarsGiveawayOptions
 */
final class GetStarsGiveawayOptionsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3172924734;
    
    public string $_ = 'payments.getStarsGiveawayOptions';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsGiveawayOptions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStarsGiveawayOption::class;
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