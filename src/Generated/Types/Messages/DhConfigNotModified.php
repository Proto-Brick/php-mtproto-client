<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.dhConfigNotModified
 */
final class DhConfigNotModified extends AbstractDhConfig
{
    public const CONSTRUCTOR_ID = 0xc0e24635;
    
    public string $predicate = 'messages.dhConfigNotModified';
    
    /**
     * @param string $random
     */
    public function __construct(
        public readonly string $random
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->random);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $random = Deserializer::bytes($stream);

        return new self(
            $random
        );
    }
}