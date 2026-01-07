<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.togglePeerTranslations
 */
final class TogglePeerTranslationsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe47cb579;
    
    public string $predicate = 'messages.togglePeerTranslations';
    
    public function getMethodName(): string
    {
        return 'messages.togglePeerTranslations';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param true|null $disabled
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?true $disabled = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->disabled) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}