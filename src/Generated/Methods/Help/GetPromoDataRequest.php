<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractPromoData;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getPromoData
 */
final class GetPromoDataRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc0977421;
    
    public string $_ = 'help.getPromoData';
    
    public function getMethodName(): string
    {
        return 'help.getPromoData';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPromoData::class;
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