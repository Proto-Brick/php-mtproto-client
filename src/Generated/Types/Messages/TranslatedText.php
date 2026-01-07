<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\TextWithEntities;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messages.translateResult
 */
final class TranslatedText extends TlObject
{
    public const CONSTRUCTOR_ID = 0x33db32f8;
    
    public string $predicate = 'messages.translateResult';
    
    /**
     * @param list<TextWithEntities> $result
     */
    public function __construct(
        public readonly array $result
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->result);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $result = Deserializer::vectorOfObjects($__payload, $__offset, [TextWithEntities::class, 'deserialize']);

        return new self(
            $result
        );
    }
}