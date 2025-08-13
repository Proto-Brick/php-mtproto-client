<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.editChatAbout
 */
final class EditChatAboutRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xdef60797;
    
    public string $predicate = 'messages.editChatAbout';
    
    public function getMethodName(): string
    {
        return 'messages.editChatAbout';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $about
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $about
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->about);
        return $buffer;
    }
}