<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/username
 */
final class Username extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb4073647;
    
    public string $predicate = 'username';
    
    /**
     * @param string $username
     * @param true|null $editable
     * @param true|null $active
     */
    public function __construct(
        public readonly string $username,
        public readonly ?true $editable = null,
        public readonly ?true $active = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->editable) {
            $flags |= (1 << 0);
        }
        if ($this->active) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->username);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $editable = (($flags & (1 << 0)) !== 0) ? true : null;
        $active = (($flags & (1 << 1)) !== 0) ? true : null;
        $username = Deserializer::bytes($__payload, $__offset);

        return new self(
            $username,
            $editable,
            $active
        );
    }
}