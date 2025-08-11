<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\CdnConfig;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getCdnConfig
 */
final class GetCdnConfigRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x52029342;
    
    public string $_ = 'help.getCdnConfig';
    
    public function getMethodName(): string
    {
        return 'help.getCdnConfig';
    }
    
    public function getResponseClass(): string
    {
        return CdnConfig::class;
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