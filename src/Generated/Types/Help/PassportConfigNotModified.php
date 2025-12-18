<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/help.passportConfigNotModified
 */
final class PassportConfigNotModified extends AbstractPassportConfig
{
    public const CONSTRUCTOR_ID = 0xbfb9f457;
    
    public string $predicate = 'help.passportConfigNotModified';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID

        return new self();
    }
}