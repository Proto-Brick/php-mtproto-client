<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $hash = Deserializer::int32($__payload, $__offset);
        $config = Deserializer::deserializeJsonValue($__payload, $__offset);

        return new self(
            $hash,
            $config
        );
    }
}