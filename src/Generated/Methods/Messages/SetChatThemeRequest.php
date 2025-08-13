<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.setChatTheme
 */
final class SetChatThemeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe63be13f;
    
    public string $predicate = 'messages.setChatTheme';
    
    public function getMethodName(): string
    {
        return 'messages.setChatTheme';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $emoticon
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $emoticon
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->emoticon);
        return $buffer;
    }
}