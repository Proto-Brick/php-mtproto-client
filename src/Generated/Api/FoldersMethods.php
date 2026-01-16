<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Api;

use Amp\Future;
use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Folders\EditPeerFoldersRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputFolderPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShort;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortChatMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortSentMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Updates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesCombined;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesTooLong;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "folders" group.
 */
final readonly class FoldersMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param list<InputFolderPeer> $folderPeers
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/folders.editPeerFolders
     * @api
     */
    public function editPeerFoldersAsync(array $folderPeers): Future
    {
        return $this->client->call(new EditPeerFoldersRequest(folderPeers: $folderPeers));
    }

    /**
     * @param list<InputFolderPeer> $folderPeers
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/folders.editPeerFolders
     * @api
     */
    public function editPeerFolders(array $folderPeers): ?AbstractUpdates
    {
        return $this->editPeerFoldersAsync(folderPeers: $folderPeers)->await();
    }
}