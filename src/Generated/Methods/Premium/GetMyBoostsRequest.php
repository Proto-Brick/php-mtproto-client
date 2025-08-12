<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Premium;

use DigitalStars\MtprotoClient\Generated\Types\Premium\MyBoosts;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/premium.getMyBoosts
 */
final class GetMyBoostsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xbe77b4a;
    
    public string $predicate = 'premium.getMyBoosts';
    
    public function getMethodName(): string
    {
        return 'premium.getMyBoosts';
    }
    
    public function getResponseClass(): string
    {
        return MyBoosts::class;
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