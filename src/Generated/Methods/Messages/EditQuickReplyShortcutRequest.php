<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.editQuickReplyShortcut
 */
final class EditQuickReplyShortcutRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x5c003cef;
    
    public string $predicate = 'messages.editQuickReplyShortcut';
    
    public function getMethodName(): string
    {
        return 'messages.editQuickReplyShortcut';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $shortcutId
     * @param string $shortcut
     */
    public function __construct(
        public readonly int $shortcutId,
        public readonly string $shortcut
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->shortcutId);
        $buffer .= Serializer::bytes($this->shortcut);
        return $buffer;
    }
}