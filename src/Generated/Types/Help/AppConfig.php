<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.appConfig
 */
final class AppConfig extends AbstractAppConfig
{
    public const CONSTRUCTOR_ID = 0xdd18782e;
    
    public string $_ = 'help.appConfig';
    
    /**
     * @param int $hash
     * @param array $config
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $config
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->hash);
        $buffer .= (new DataJSON(json_encode($this->config, JSON_FORCE_OBJECT)))->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->int32($stream);
        $config = $deserializer->deserializeJsonValue($stream);
        return new self(
            $hash,
            $config
        );
    }
}