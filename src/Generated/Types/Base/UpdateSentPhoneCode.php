<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractSentCode;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateSentPhoneCode
 */
final class UpdateSentPhoneCode extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x504aa18f;
    
    public string $predicate = 'updateSentPhoneCode';
    
    /**
     * @param AbstractSentCode $sentCode
     */
    public function __construct(
        public readonly AbstractSentCode $sentCode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->sentCode->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $sentCode = AbstractSentCode::deserialize($__payload, $__offset);

        return new self(
            $sentCode
        );
    }
}