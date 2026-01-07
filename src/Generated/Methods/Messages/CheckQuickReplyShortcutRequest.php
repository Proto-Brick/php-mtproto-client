<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.checkQuickReplyShortcut
 */
final class CheckQuickReplyShortcutRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf1d0fbd3;
    
    public string $predicate = 'messages.checkQuickReplyShortcut';
    
    public function getMethodName(): string
    {
        return 'messages.checkQuickReplyShortcut';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $shortcut
     */
    public function __construct(
        public readonly string $shortcut
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->shortcut);
        return $buffer;
    }
}