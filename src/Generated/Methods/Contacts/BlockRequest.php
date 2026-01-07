<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.block
 */
final class BlockRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2e2e8734;
    
    public string $predicate = 'contacts.block';
    
    public function getMethodName(): string
    {
        return 'contacts.block';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $id
     * @param true|null $myStoriesFrom
     */
    public function __construct(
        public readonly AbstractInputPeer $id,
        public readonly ?true $myStoriesFrom = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->myStoriesFrom) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->id->serialize();
        return $buffer;
    }
}