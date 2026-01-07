<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Contacts\ResolvedPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.resolvePhone
 */
final class ResolvePhoneRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8af94344;
    
    public string $predicate = 'contacts.resolvePhone';
    
    public function getMethodName(): string
    {
        return 'contacts.resolvePhone';
    }
    
    public function getResponseClass(): string
    {
        return ResolvedPeer::class;
    }
    /**
     * @param string $phone
     */
    public function __construct(
        public readonly string $phone
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phone);
        return $buffer;
    }
}