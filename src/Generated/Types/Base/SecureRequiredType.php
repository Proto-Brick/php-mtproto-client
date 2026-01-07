<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/secureRequiredType
 */
final class SecureRequiredType extends AbstractSecureRequiredType
{
    public const CONSTRUCTOR_ID = 0x829d99da;
    
    public string $predicate = 'secureRequiredType';
    
    /**
     * @param SecureValueType $type
     * @param true|null $nativeNames
     * @param true|null $selfieRequired
     * @param true|null $translationRequired
     */
    public function __construct(
        public readonly SecureValueType $type,
        public readonly ?true $nativeNames = null,
        public readonly ?true $selfieRequired = null,
        public readonly ?true $translationRequired = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nativeNames) {
            $flags |= (1 << 0);
        }
        if ($this->selfieRequired) {
            $flags |= (1 << 1);
        }
        if ($this->translationRequired) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->type->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $nativeNames = (($flags & (1 << 0)) !== 0) ? true : null;
        $selfieRequired = (($flags & (1 << 1)) !== 0) ? true : null;
        $translationRequired = (($flags & (1 << 2)) !== 0) ? true : null;
        $type = SecureValueType::deserialize($__payload, $__offset);

        return new self(
            $type,
            $nativeNames,
            $selfieRequired,
            $translationRequired
        );
    }
}