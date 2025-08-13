<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.reorderAlbums
 */
final class ReorderAlbumsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8535fbd9;
    
    public string $predicate = 'stories.reorderAlbums';
    
    public function getMethodName(): string
    {
        return 'stories.reorderAlbums';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int> $order
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $order
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfInts($this->order);
        return $buffer;
    }
}