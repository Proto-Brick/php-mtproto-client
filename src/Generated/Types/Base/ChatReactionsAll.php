<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/chatReactionsAll
 */
final class ChatReactionsAll extends AbstractChatReactions
{
    public const CONSTRUCTOR_ID = 0x52928bca;
    
    public string $predicate = 'chatReactionsAll';
    
    /**
     * @param true|null $allowCustom
     */
    public function __construct(
        public readonly ?true $allowCustom = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->allowCustom) {
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
        $allowCustom = (($flags & (1 << 0)) !== 0) ? true : null;

        return new self(
            $allowCustom
        );
    }
}