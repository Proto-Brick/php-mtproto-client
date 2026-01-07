<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessageEntity;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\WebPagePreview;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getWebPagePreview
 */
final class GetWebPagePreviewRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x570d6f6f;
    
    public string $predicate = 'messages.getWebPagePreview';
    
    public function getMethodName(): string
    {
        return 'messages.getWebPagePreview';
    }
    
    public function getResponseClass(): string
    {
        return WebPagePreview::class;
    }
    /**
     * @param string $message
     * @param list<AbstractMessageEntity>|null $entities
     */
    public function __construct(
        public readonly string $message,
        public readonly ?array $entities = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->entities !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->message);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        return $buffer;
    }
}