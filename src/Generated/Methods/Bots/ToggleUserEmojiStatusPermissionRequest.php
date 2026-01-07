<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.toggleUserEmojiStatusPermission
 */
final class ToggleUserEmojiStatusPermissionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6de6392;
    
    public string $predicate = 'bots.toggleUserEmojiStatusPermission';
    
    public function getMethodName(): string
    {
        return 'bots.toggleUserEmojiStatusPermission';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $bot
     * @param bool $enabled
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly bool $enabled
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        $buffer .= ($this->enabled ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}