<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Help\PremiumPromo;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getPremiumPromo
 */
final class GetPremiumPromoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb81b93d4;
    
    public string $predicate = 'help.getPremiumPromo';
    
    public function getMethodName(): string
    {
        return 'help.getPremiumPromo';
    }
    
    public function getResponseClass(): string
    {
        return PremiumPromo::class;
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