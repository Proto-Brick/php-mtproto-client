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
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $suggestion = Deserializer::bytes($stream);
        $title = TextWithEntities::deserialize($stream);
        $description = TextWithEntities::deserialize($stream);
        $url = Deserializer::bytes($stream);

        return new self(
            $suggestion,
            $title,
            $description,
            $url
        );
    }
}