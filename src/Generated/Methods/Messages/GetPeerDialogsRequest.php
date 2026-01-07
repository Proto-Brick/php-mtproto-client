<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDialogPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\PeerDialogs;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getPeerDialogs
 */
final class GetPeerDialogsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe470bcfd;
    
    public string $predicate = 'messages.getPeerDialogs';
    
    public function getMethodName(): string
    {
        return 'messages.getPeerDialogs';
    }
    
    public function getResponseClass(): string
    {
        return PeerDialogs::class;
    }
    /**
     * @param list<AbstractInputDialogPeer> $peers
     */
    public function __construct(
        public readonly array $peers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->peers);
        return $buffer;
    }
}