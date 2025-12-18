<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/sendMessageHistoryImportAction
 */
final class SendMessageHistoryImportAction extends AbstractSendMessageAction
{
    public const CONSTRUCTOR_ID = 0xdbda9246;
    
    public string $predicate = 'sendMessageHistoryImportAction';
    
    /**
     * @param int $progress
     */
    public function __construct(
        public readonly int $progress
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->progress);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $progress = Deserializer::int32($__payload, $__offset);

        return new self(
            $progress
        );
    }
}