<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Chatlists;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatlist;
use ProtoBrick\MTProtoClient\Generated\Types\Chatlists\ExportedInvites;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/chatlists.getExportedInvites
 */
final class GetExportedInvitesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xce03da83;
    
    public string $predicate = 'chatlists.getExportedInvites';
    
    public function getMethodName(): string
    {
        return 'chatlists.getExportedInvites';
    }
    
    public function getResponseClass(): string
    {
        return ExportedInvites::class;
    }
    /**
     * @param InputChatlist $chatlist
     */
    public function __construct(
        public readonly InputChatlist $chatlist
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chatlist->serialize();
        return $buffer;
    }
}