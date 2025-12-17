<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AvailableEffect;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.availableEffects
 */
final class AvailableEffects extends AbstractAvailableEffects
{
    public const CONSTRUCTOR_ID = 0xbddb616e;
    
    public string $predicate = 'messages.availableEffects';
    
    /**
     * @param int $hash
     * @param list<AvailableEffect> $effects
     * @param list<AbstractDocument> $documents
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $effects,
        public readonly array $documents
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->effects);
        $buffer .= Serializer::vectorOfObjects($this->documents);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $hash = Deserializer::int32($__payload, $__offset);
        $effects = Deserializer::vectorOfObjects($__payload, $__offset, [AvailableEffect::class, 'deserialize']);
        $documents = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractDocument::class, 'deserialize']);

        return new self(
            $hash,
            $effects,
            $documents
        );
    }
}