<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateDeleteQuickReplyMessages
 */
final class UpdateDeleteQuickReplyMessages extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x566fe7cd;
    
    public string $predicate = 'updateDeleteQuickReplyMessages';
    
    /**
     * @param int $shortcutId
     * @param list<int> $messages
     */
    public function __construct(
        public readonly int $shortcutId,
        public readonly array $messages
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->shortcutId);
        $buffer .= Serializer::vectorOfInts($this->messages);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $shortcutId = Deserializer::int32($stream);
        $messages = Deserializer::vectorOfInts($stream);

        return new self(
            $shortcutId,
            $messages
        );
    }
}