<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Premium;

use DigitalStars\MtprotoClient\Generated\Types\Premium\AbstractMyBoosts;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/premium.getMyBoosts
 */
final class GetMyBoostsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 199719754;
    
    public string $_ = 'premium.getMyBoosts';
    
    public function getMethodName(): string
    {
        return 'premium.getMyBoosts';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMyBoosts::class;
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