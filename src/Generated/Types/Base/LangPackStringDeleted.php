<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/langPackStringDeleted
 */
final class LangPackStringDeleted extends AbstractLangPackString
{
    public const CONSTRUCTOR_ID = 0x2979eeb2;
    
    public string $predicate = 'langPackStringDeleted';
    
    /**
     * @param string $key
     */
    public function __construct(
        public readonly string $key
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->key);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $key = Deserializer::bytes($stream);

        return new self(
            $key
        );
    }
}