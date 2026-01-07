<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Chatlists;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatlist;
use ProtoBrick\MTProtoClient\Generated\Types\Chatlists\ExportedChatlistInvite;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/chatlists.exportChatlistInvite
 */
final class ExportChatlistInviteRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8472478e;
    
    public string $predicate = 'chatlists.exportChatlistInvite';
    
    public function getMethodName(): string
    {
        return 'chatlists.exportChatlistInvite';
    }
    
    public function getResponseClass(): string
    {
        return ExportedChatlistInvite::class;
    }
    /**
     * @param InputChatlist $chatlist
     * @param string $title
     * @param list<AbstractInputPeer> $peers
     */
    public function __construct(
        public readonly InputChatlist $chatlist,
        public readonly string $title,
        public readonly array $peers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chatlist->serialize();
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::vectorOfObjects($this->peers);
        return $buffer;
    }
}