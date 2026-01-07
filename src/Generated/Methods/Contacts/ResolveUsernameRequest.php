<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Contacts\ResolvedPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.resolveUsername
 */
final class ResolveUsernameRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x725afbbc;
    
    public string $predicate = 'contacts.resolveUsername';
    
    public function getMethodName(): string
    {
        return 'contacts.resolveUsername';
    }
    
    public function getResponseClass(): string
    {
        return ResolvedPeer::class;
    }
    /**
     * @param string $username
     * @param string|null $referer
     */
    public function __construct(
        public readonly string $username,
        public readonly ?string $referer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->referer !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->username);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->referer);
        }
        return $buffer;
    }
}