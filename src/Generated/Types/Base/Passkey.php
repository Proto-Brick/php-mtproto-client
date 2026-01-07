<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/passkey
 */
final class Passkey extends TlObject
{
    public const CONSTRUCTOR_ID = 0x98613ebf;
    
    public string $predicate = 'passkey';
    
    /**
     * @param string $id
     * @param string $name
     * @param int $date
     * @param int|null $softwareEmojiId
     * @param int|null $lastUsageDate
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly int $date,
        public readonly ?int $softwareEmojiId = null,
        public readonly ?int $lastUsageDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->softwareEmojiId !== null) {
            $flags |= (1 << 0);
        }
        if ($this->lastUsageDate !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::bytes($this->name);
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->softwareEmojiId);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->lastUsageDate);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $id = Deserializer::bytes($__payload, $__offset);
        $name = Deserializer::bytes($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $softwareEmojiId = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $lastUsageDate = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $id,
            $name,
            $date,
            $softwareEmojiId,
            $lastUsageDate
        );
    }
}