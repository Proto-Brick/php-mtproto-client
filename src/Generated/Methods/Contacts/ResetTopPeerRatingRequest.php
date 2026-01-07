<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\TopPeerCategory;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.resetTopPeerRating
 */
final class ResetTopPeerRatingRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1ae373ac;
    
    public string $predicate = 'contacts.resetTopPeerRating';
    
    public function getMethodName(): string
    {
        return 'contacts.resetTopPeerRating';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param TopPeerCategory $category
     * @param AbstractInputPeer $peer
     */
    public function __construct(
        public readonly TopPeerCategory $category,
        public readonly AbstractInputPeer $peer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->category->serialize();
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}