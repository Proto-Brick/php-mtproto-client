<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.getPeerMaxIDs
 */
final class GetPeerMaxIDsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x535983c3;
    
    public string $predicate = 'stories.getPeerMaxIDs';
    
    public function getMethodName(): string
    {
        return 'stories.getPeerMaxIDs';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<int>';
    }
    /**
     * @param list<AbstractInputPeer> $id
     */
    public function __construct(
        public readonly array $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->id);
        return $buffer;
    }
}