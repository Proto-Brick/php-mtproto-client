<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Contacts\AbstractSponsoredPeers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.getSponsoredPeers
 */
final class GetSponsoredPeersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb6c8c393;
    
    public string $predicate = 'contacts.getSponsoredPeers';
    
    public function getMethodName(): string
    {
        return 'contacts.getSponsoredPeers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSponsoredPeers::class;
    }
    /**
     * @param string $q
     */
    public function __construct(
        public readonly string $q
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->q);
        return $buffer;
    }
}