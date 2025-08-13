<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputPrivacyValueDisallowBots
 */
final class InputPrivacyValueDisallowBots extends AbstractInputPrivacyRule
{
    public const CONSTRUCTOR_ID = 0xc4e57915;
    
    public string $predicate = 'inputPrivacyValueDisallowBots';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID

        return new self();
    }
}