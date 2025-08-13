<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Chatlists;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatlist;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/chatlists.deleteExportedInvite
 */
final class DeleteExportedInviteRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x719c5c5e;
    
    public string $predicate = 'chatlists.deleteExportedInvite';
    
    public function getMethodName(): string
    {
        return 'chatlists.deleteExportedInvite';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputChatlist $chatlist
     * @param string $slug
     */
    public function __construct(
        public readonly InputChatlist $chatlist,
        public readonly string $slug
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chatlist->serialize();
        $buffer .= Serializer::bytes($this->slug);
        return $buffer;
    }
}