<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputInvoiceBusinessBotTransferStars
 */
final class InputInvoiceBusinessBotTransferStars extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0xf4997e42;
    
    public string $predicate = 'inputInvoiceBusinessBotTransferStars';
    
    /**
     * @param AbstractInputUser $bot
     * @param int $stars
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly int $stars
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::int64($this->stars);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $bot = AbstractInputUser::deserialize($__payload, $__offset);
        $stars = Deserializer::int64($__payload, $__offset);

        return new self(
            $bot,
            $stars
        );
    }
}