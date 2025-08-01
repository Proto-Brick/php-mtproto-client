<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractNearestDc;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getNearestDc
 */
final class GetNearestDcRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 531836966;
    
    public string $_ = 'help.getNearestDc';
    
    public function getMethodName(): string
    {
        return 'help.getNearestDc';
    }
    
    public function getResponseClass(): string
    {
        return AbstractNearestDc::class;
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