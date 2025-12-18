<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.sentCode
 */
final class SentCode extends AbstractSentCode
{
    public const CONSTRUCTOR_ID = 0x5e002502;
    
    public string $predicate = 'auth.sentCode';
    
    /**
     * @param AbstractSentCodeType $type
     * @param string $phoneCodeHash
     * @param CodeType|null $nextType
     * @param int|null $timeout
     */
    public function __construct(
        public readonly AbstractSentCodeType $type,
        public readonly string $phoneCodeHash,
        public readonly ?CodeType $nextType = null,
        public readonly ?int $timeout = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nextType !== null) {
            $flags |= (1 << 1);
        }
        if ($this->timeout !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->type->serialize();
        $buffer .= Serializer::bytes($this->phoneCodeHash);
        if ($flags & (1 << 1)) {
            $buffer .= $this->nextType->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->timeout);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $type = AbstractSentCodeType::deserialize($__payload, $__offset);
        $phoneCodeHash = Deserializer::bytes($__payload, $__offset);
        $nextType = (($flags & (1 << 1)) !== 0) ? CodeType::deserialize($__payload, $__offset) : null;
        $timeout = (($flags & (1 << 2)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $type,
            $phoneCodeHash,
            $nextType,
            $timeout
        );
    }
}