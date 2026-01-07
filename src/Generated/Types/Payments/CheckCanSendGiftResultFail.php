<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\TextWithEntities;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/payments.checkCanSendGiftResultFail
 */
final class CheckCanSendGiftResultFail extends AbstractCheckCanSendGiftResult
{
    public const CONSTRUCTOR_ID = 0xd5e58274;
    
    public string $predicate = 'payments.checkCanSendGiftResultFail';
    
    /**
     * @param TextWithEntities $reason
     */
    public function __construct(
        public readonly TextWithEntities $reason
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->reason->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $reason = TextWithEntities::deserialize($__payload, $__offset);

        return new self(
            $reason
        );
    }
}