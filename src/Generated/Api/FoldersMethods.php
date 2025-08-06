<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Folders\EditPeerFoldersRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputFolderPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShort;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortChatMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortSentMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\Updates;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesCombined;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesTooLong;


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
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/folders.editPeerFolders
     * @api
     */
    public function editPeerFolders(array $folderPeers): ?AbstractUpdates
    {
        return $this->client->callSync(new EditPeerFoldersRequest($folderPeers));
    }
}