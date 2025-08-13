<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/sendMessageUploadDocumentAction
 */
final class SendMessageUploadDocumentAction extends AbstractSendMessageAction
{
    public const CONSTRUCTOR_ID = 0xaa0cd9e4;
    
    public string $predicate = 'sendMessageUploadDocumentAction';
    
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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $progress = Deserializer::int32($stream);

        return new self(
            $progress
        );
    }
}