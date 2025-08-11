<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\StarsGiveawayOption;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarsGiveawayOptions
 */
final class GetStarsGiveawayOptionsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xbd1efd3e;
    
    public string $_ = 'payments.getStarsGiveawayOptions';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsGiveawayOptions';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . StarsGiveawayOption::class . '>';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}