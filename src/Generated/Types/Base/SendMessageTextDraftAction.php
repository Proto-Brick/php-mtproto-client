<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/sendMessageTextDraftAction
 */
final class SendMessageTextDraftAction extends AbstractSendMessageAction
{
    public const CONSTRUCTOR_ID = 0x376d975c;
    
    public string $predicate = 'sendMessageTextDraftAction';
    
    /**
     * @param int $randomId
     * @param TextWithEntities $text
     */
    public function __construct(
        public readonly int $randomId,
        public readonly TextWithEntities $text
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->randomId);
        $buffer .= $this->text->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $randomId = Deserializer::int64($__payload, $__offset);
        $text = TextWithEntities::deserialize($__payload, $__offset);

        return new self(
            $randomId,
            $text
        );
    }
}