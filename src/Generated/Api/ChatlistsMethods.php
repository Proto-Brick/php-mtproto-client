<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Chatlists\CheckChatlistInviteRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Chatlists\DeleteExportedInviteRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Chatlists\EditExportedInviteRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Chatlists\ExportChatlistInviteRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Chatlists\GetChatlistUpdatesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Chatlists\GetExportedInvitesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Chatlists\GetLeaveChatlistSuggestionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Chatlists\HideChatlistUpdatesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Chatlists\JoinChatlistInviteRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Chatlists\JoinChatlistUpdatesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Chatlists\LeaveChatlistRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\ExportedChatlistInvite as BaseExportedChatlistInvite;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChatlist;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\PeerChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\PeerChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\PeerUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShort;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortChatMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortSentMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\Updates;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesCombined;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesTooLong;
use DigitalStars\MtprotoClient\Generated\Types\Chatlists\AbstractChatlistInvite;
use DigitalStars\MtprotoClient\Generated\Types\Chatlists\ChatlistInvite;
use DigitalStars\MtprotoClient\Generated\Types\Chatlists\ChatlistInviteAlready;
use DigitalStars\MtprotoClient\Generated\Types\Chatlists\ChatlistUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Chatlists\ExportedChatlistInvite;
use DigitalStars\MtprotoClient\Generated\Types\Chatlists\ExportedInvites;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "chatlists" group.
 */
final readonly class ChatlistsMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param InputChatlist $chatlist
     * @param string $title
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $peers
     * @return ExportedChatlistInvite|null
     * @see https://core.telegram.org/method/chatlists.exportChatlistInvite
     * @api
     */
    public function exportChatlistInvite(InputChatlist $chatlist, string $title, array $peers): ?ExportedChatlistInvite
    {
        return $this->client->callSync(new ExportChatlistInviteRequest($chatlist, $title, $peers));
    }

    /**
     * @param InputChatlist $chatlist
     * @param string $slug
     * @return bool
     * @see https://core.telegram.org/method/chatlists.deleteExportedInvite
     * @api
     */
    public function deleteExportedInvite(InputChatlist $chatlist, string $slug): bool
    {
        return (bool) $this->client->callSync(new DeleteExportedInviteRequest($chatlist, $slug));
    }

    /**
     * @param InputChatlist $chatlist
     * @param string $slug
     * @param string|null $title
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage>|null $peers
     * @return BaseExportedChatlistInvite|null
     * @see https://core.telegram.org/method/chatlists.editExportedInvite
     * @api
     */
    public function editExportedInvite(InputChatlist $chatlist, string $slug, ?string $title = null, ?array $peers = null): ?BaseExportedChatlistInvite
    {
        return $this->client->callSync(new EditExportedInviteRequest($chatlist, $slug, $title, $peers));
    }

    /**
     * @param InputChatlist $chatlist
     * @return ExportedInvites|null
     * @see https://core.telegram.org/method/chatlists.getExportedInvites
     * @api
     */
    public function getExportedInvites(InputChatlist $chatlist): ?ExportedInvites
    {
        return $this->client->callSync(new GetExportedInvitesRequest($chatlist));
    }

    /**
     * @param string $slug
     * @return ChatlistInviteAlready|ChatlistInvite|null
     * @see https://core.telegram.org/method/chatlists.checkChatlistInvite
     * @api
     */
    public function checkChatlistInvite(string $slug): ?AbstractChatlistInvite
    {
        return $this->client->callSync(new CheckChatlistInviteRequest($slug));
    }

    /**
     * @param string $slug
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $peers
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/chatlists.joinChatlistInvite
     * @api
     */
    public function joinChatlistInvite(string $slug, array $peers): ?AbstractUpdates
    {
        return $this->client->callSync(new JoinChatlistInviteRequest($slug, $peers));
    }

    /**
     * @param InputChatlist $chatlist
     * @return ChatlistUpdates|null
     * @see https://core.telegram.org/method/chatlists.getChatlistUpdates
     * @api
     */
    public function getChatlistUpdates(InputChatlist $chatlist): ?ChatlistUpdates
    {
        return $this->client->callSync(new GetChatlistUpdatesRequest($chatlist));
    }

    /**
     * @param InputChatlist $chatlist
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $peers
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/chatlists.joinChatlistUpdates
     * @api
     */
    public function joinChatlistUpdates(InputChatlist $chatlist, array $peers): ?AbstractUpdates
    {
        return $this->client->callSync(new JoinChatlistUpdatesRequest($chatlist, $peers));
    }

    /**
     * @param InputChatlist $chatlist
     * @return bool
     * @see https://core.telegram.org/method/chatlists.hideChatlistUpdates
     * @api
     */
    public function hideChatlistUpdates(InputChatlist $chatlist): bool
    {
        return (bool) $this->client->callSync(new HideChatlistUpdatesRequest($chatlist));
    }

    /**
     * @param InputChatlist $chatlist
     * @return list<PeerUser|PeerChat|PeerChannel>
     * @see https://core.telegram.org/method/chatlists.getLeaveChatlistSuggestions
     * @api
     */
    public function getLeaveChatlistSuggestions(InputChatlist $chatlist): array
    {
        return $this->client->callSync(new GetLeaveChatlistSuggestionsRequest($chatlist));
    }

    /**
     * @param InputChatlist $chatlist
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $peers
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/chatlists.leaveChatlist
     * @api
     */
    public function leaveChatlist(InputChatlist $chatlist, array $peers): ?AbstractUpdates
    {
        return $this->client->callSync(new LeaveChatlistRequest($chatlist, $peers));
    }
}