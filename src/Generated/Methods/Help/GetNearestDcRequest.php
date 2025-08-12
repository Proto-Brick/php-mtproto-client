<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\NearestDc;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getNearestDc
 */
final class GetNearestDcRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1fb33026;
    
    public string $predicate = 'help.getNearestDc';
    
    public function getMethodName(): string
    {
        return 'help.getNearestDc';
    }
    
    public function getResponseClass(): string
    {
        return NearestDc::class;
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