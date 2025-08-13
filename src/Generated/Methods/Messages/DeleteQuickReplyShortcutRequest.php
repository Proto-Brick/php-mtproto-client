<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.deleteQuickReplyShortcut
 */
final class DeleteQuickReplyShortcutRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3cc04740;
    
    public string $predicate = 'messages.deleteQuickReplyShortcut';
    
    public function getMethodName(): string
    {
        return 'messages.deleteQuickReplyShortcut';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $shortcutId
     */
    public function __construct(
        public readonly int $shortcutId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->shortcutId);
        return $buffer;
    }
}