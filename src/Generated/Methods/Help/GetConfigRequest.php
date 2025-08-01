<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractConfig;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getConfig
 */
final class GetConfigRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3304659051;
    
    public string $_ = 'help.getConfig';
    
    public function getMethodName(): string
    {
        return 'help.getConfig';
    }
    
    public function getResponseClass(): string
    {
        return AbstractConfig::class;
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