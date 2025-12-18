<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputInvoiceChatInviteSubscription
 */
final class InputInvoiceChatInviteSubscription extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0x34e793f1;
    
    public string $predicate = 'inputInvoiceChatInviteSubscription';
    
    /**
     * @param string $hash
     */
    public function __construct(
        public readonly string $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->hash);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $hash = Deserializer::bytes($__payload, $__offset);

        return new self(
            $hash
        );
    }
}