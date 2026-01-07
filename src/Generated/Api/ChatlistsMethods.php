<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Chatlists\CheckChatlistInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Chatlists\DeleteExportedInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Chatlists\EditExportedInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Chatlists\ExportChatlistInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Chatlists\GetChatlistUpdatesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Chatlists\GetExportedInvitesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Chatlists\GetLeaveChatlistSuggestionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Chatlists\HideChatlistUpdatesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Chatlists\JoinChatlistInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Chatlists\JoinChatlistUpdatesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Chatlists\LeaveChatlistRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ExportedChatlistInvite as BaseExportedChatlistInvite;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatlist;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PeerChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PeerChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PeerUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShort;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortChatMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortSentMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Updates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesCombined;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesTooLong;
use ProtoBrick\MTProtoClient\Generated\Types\Chatlists\AbstractChatlistInvite;
use ProtoBrick\MTProtoClient\Generated\Types\Chatlists\ChatlistInvite;
use ProtoBrick\MTProtoClient\Generated\Types\Chatlists\ChatlistInviteAlready;
use ProtoBrick\MTProtoClient\Generated\Types\Chatlists\ChatlistUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Chatlists\ExportedChatlistInvite;
use ProtoBrick\MTProtoClient\Generated\Types\Chatlists\ExportedInvites;


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
        return $this->client->callSync(new ExportChatlistInviteRequest(chatlist: $chatlist, title: $title, peers: $peers));
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
        return (bool) $this->client->callSync(new DeleteExportedInviteRequest(chatlist: $chatlist, slug: $slug));
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
        return $this->client->callSync(new EditExportedInviteRequest(chatlist: $chatlist, slug: $slug, title: $title, peers: $peers));
    }

    /**
     * @param InputChatlist $chatlist
     * @return ExportedInvites|null
     * @see https://core.telegram.org/method/chatlists.getExportedInvites
     * @api
     */
    public function getExportedInvites(InputChatlist $chatlist): ?ExportedInvites
    {
        return $this->client->callSync(new GetExportedInvitesRequest(chatlist: $chatlist));
    }

    /**
     * @param string $slug
     * @return ChatlistInviteAlready|ChatlistInvite|null
     * @see https://core.telegram.org/method/chatlists.checkChatlistInvite
     * @api
     */
    public function checkChatlistInvite(string $slug): ?AbstractChatlistInvite
    {
        return $this->client->callSync(new CheckChatlistInviteRequest(slug: $slug));
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
        return $this->client->callSync(new JoinChatlistInviteRequest(slug: $slug, peers: $peers));
    }

    /**
     * @param InputChatlist $chatlist
     * @return ChatlistUpdates|null
     * @see https://core.telegram.org/method/chatlists.getChatlistUpdates
     * @api
     */
    public function getChatlistUpdates(InputChatlist $chatlist): ?ChatlistUpdates
    {
        return $this->client->callSync(new GetChatlistUpdatesRequest(chatlist: $chatlist));
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
        return $this->client->callSync(new JoinChatlistUpdatesRequest(chatlist: $chatlist, peers: $peers));
    }

    /**
     * @param InputChatlist $chatlist
     * @return bool
     * @see https://core.telegram.org/method/chatlists.hideChatlistUpdates
     * @api
     */
    public function hideChatlistUpdates(InputChatlist $chatlist): bool
    {
        return (bool) $this->client->callSync(new HideChatlistUpdatesRequest(chatlist: $chatlist));
    }

    /**
     * @param InputChatlist $chatlist
     * @return list<PeerUser|PeerChat|PeerChannel>
     * @see https://core.telegram.org/method/chatlists.getLeaveChatlistSuggestions
     * @api
     */
    public function getLeaveChatlistSuggestions(InputChatlist $chatlist): array
    {
        return $this->client->callSync(new GetLeaveChatlistSuggestionsRequest(chatlist: $chatlist));
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
        return $this->client->callSync(new LeaveChatlistRequest(chatlist: $chatlist, peers: $peers));
    }
}