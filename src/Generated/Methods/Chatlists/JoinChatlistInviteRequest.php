<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Chatlists;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/chatlists.joinChatlistInvite
 */
final class JoinChatlistInviteRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa6b1e39a;
    
    public string $predicate = 'chatlists.joinChatlistInvite';
    
    public function getMethodName(): string
    {
        return 'chatlists.joinChatlistInvite';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param string $slug
     * @param list<AbstractInputPeer> $peers
     */
    public function __construct(
        public readonly string $slug,
        public readonly array $peers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->slug);
        $buffer .= Serializer::vectorOfObjects($this->peers);
        return $buffer;
    }
}