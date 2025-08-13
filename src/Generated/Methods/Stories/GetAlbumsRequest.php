<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\AbstractAlbums;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.getAlbums
 */
final class GetAlbumsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x25b3eac7;
    
    public string $predicate = 'stories.getAlbums';
    
    public function getMethodName(): string
    {
        return 'stories.getAlbums';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAlbums::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $hash
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}