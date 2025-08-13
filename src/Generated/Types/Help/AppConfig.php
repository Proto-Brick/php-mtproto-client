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
    
    public string $predicate = 'help.appConfig';
    
    /**
     * @param int $hash
     * @param array $config
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $config
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);
        $buffer .= Serializer::serializeJsonValue($this->config);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $hash = Deserializer::int32($stream);
        $config = Deserializer::deserializeJsonValue($stream);

        return new self(
            $hash,
            $config
        );
    }
}