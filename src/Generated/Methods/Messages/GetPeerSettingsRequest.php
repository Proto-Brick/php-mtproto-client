<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\PeerSettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getPeerSettings
 */
final class GetPeerSettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xefd9a6a2;
    
    public string $predicate = 'messages.getPeerSettings';
    
    public function getMethodName(): string
    {
        return 'messages.getPeerSettings';
    }
    
    public function getResponseClass(): string
    {
        return PeerSettings::class;
    }
    /**
     * @param AbstractInputPeer $peer
     */
    public function __construct(
        public readonly AbstractInputPeer $peer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}