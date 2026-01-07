<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/pendingSuggestion
 */
final class PendingSuggestion extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe7e82e12;
    
    public string $predicate = 'pendingSuggestion';
    
    /**
     * @param string $suggestion
     * @param TextWithEntities $title
     * @param TextWithEntities $description
     * @param string $url
     */
    public function __construct(
        public readonly string $suggestion,
        public readonly TextWithEntities $title,
        public readonly TextWithEntities $description,
        public readonly string $url
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->suggestion);
        $buffer .= $this->title->serialize();
        $buffer .= $this->description->serialize();
        $buffer .= Serializer::bytes($this->url);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $suggestion = Deserializer::bytes($__payload, $__offset);
        $title = TextWithEntities::deserialize($__payload, $__offset);
        $description = TextWithEntities::deserialize($__payload, $__offset);
        $url = Deserializer::bytes($__payload, $__offset);

        return new self(
            $suggestion,
            $title,
            $description,
            $url
        );
    }
}