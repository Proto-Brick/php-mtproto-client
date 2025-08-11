<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\StarsTopupOption;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarsTopupOptions
 */
final class GetStarsTopupOptionsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc00ec7d3;
    
    public string $_ = 'payments.getStarsTopupOptions';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsTopupOptions';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . StarsTopupOption::class . '>';
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