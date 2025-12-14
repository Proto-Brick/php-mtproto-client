<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionSuggestedPostRefund
 */
final class MessageActionSuggestedPostRefund extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x69f916f8;
    
    public string $predicate = 'messageActionSuggestedPostRefund';
    
    /**
     * @param true|null $payerInitiated
     */
    public function __construct(
        public readonly ?true $payerInitiated = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->payerInitiated) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $payerInitiated = (($flags & (1 << 0)) !== 0) ? true : null;

        return new self(
            $payerInitiated
        );
    }
}