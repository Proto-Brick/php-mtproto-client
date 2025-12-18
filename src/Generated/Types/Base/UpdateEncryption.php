<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateEncryption
 */
final class UpdateEncryption extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xb4a2e88d;
    
    public string $predicate = 'updateEncryption';
    
    /**
     * @param AbstractEncryptedChat $chat
     * @param int $date
     */
    public function __construct(
        public readonly AbstractEncryptedChat $chat,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chat->serialize();
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $chat = AbstractEncryptedChat::deserialize($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);

        return new self(
            $chat,
            $date
        );
    }
}