<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Folders;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputFolderPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/folders.editPeerFolders
 */
final class EditPeerFoldersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6847d0ab;
    
    public string $predicate = 'folders.editPeerFolders';
    
    public function getMethodName(): string
    {
        return 'folders.editPeerFolders';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param list<InputFolderPeer> $folderPeers
     */
    public function __construct(
        public readonly array $folderPeers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->folderPeers);
        return $buffer;
    }
}