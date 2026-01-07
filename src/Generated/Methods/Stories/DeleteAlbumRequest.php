<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.deleteAlbum
 */
final class DeleteAlbumRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8d3456d0;
    
    public string $predicate = 'stories.deleteAlbum';
    
    public function getMethodName(): string
    {
        return 'stories.deleteAlbum';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $albumId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $albumId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->albumId);
        return $buffer;
    }
}