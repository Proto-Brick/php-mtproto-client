<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Api;

use Amp\Future;
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
     * @return Future<ExportedChatlistInvite|null>
     * @see https://core.telegram.org/method/chatlists.exportChatlistInvite
     * @api
     */
    public function exportChatlistInviteAsync(InputChatlist $chatlist, string $title, array $peers): Future
    {
        return $this->client->call(new ExportChatlistInviteRequest(chatlist: $chatlist, title: $title, peers: $peers));
    }

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
        return $this->exportChatlistInviteAsync(chatlist: $chatlist, title: $title, peers: $peers)->await();
    }

    /**
     * @param InputChatlist $chatlist
     * @param string $slug
     * @return Future<bool>
     * @see https://core.telegram.org/method/chatlists.deleteExportedInvite
     * @api
     */
    public function deleteExportedInviteAsync(InputChatlist $chatlist, string $slug): Future
    {
        return $this->client->call(new DeleteExportedInviteRequest(chatlist: $chatlist, slug: $slug));
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
        return (bool) $this->deleteExportedInviteAsync(chatlist: $chatlist, slug: $slug)->await();
    }

    /**
     * @param InputChatlist $chatlist
     * @param string $slug
     * @param string|null $title
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage>|null $peers
     * @return Future<BaseExportedChatlistInvite|null>
     * @see https://core.telegram.org/method/chatlists.editExportedInvite
     * @api
     */
    public function editExportedInviteAsync(InputChatlist $chatlist, string $slug, ?string $title = null, ?array $peers = null): Future
    {
        return $this->client->call(new EditExportedInviteRequest(chatlist: $chatlist, slug: $slug, title: $title, peers: $peers));
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
        return $this->editExportedInviteAsync(chatlist: $chatlist, slug: $slug, title: $title, peers: $peers)->await();
    }

    /**
     * @param InputChatlist $chatlist
     * @return Future<ExportedInvites|null>
     * @see https://core.telegram.org/method/chatlists.getExportedInvites
     * @api
     */
    public function getExportedInvitesAsync(InputChatlist $chatlist): Future
    {
        return $this->client->call(new GetExportedInvitesRequest(chatlist: $chatlist));
    }

    /**
     * @param InputChatlist $chatlist
     * @return ExportedInvites|null
     * @see https://core.telegram.org/method/chatlists.getExportedInvites
     * @api
     */
    public function getExportedInvites(InputChatlist $chatlist): ?ExportedInvites
    {
        return $this->getExportedInvitesAsync(chatlist: $chatlist)->await();
    }

    /**
     * @param string $slug
     * @return Future<ChatlistInviteAlready|ChatlistInvite|null>
     * @see https://core.telegram.org/method/chatlists.checkChatlistInvite
     * @api
     */
    public function checkChatlistInviteAsync(string $slug): Future
    {
        return $this->client->call(new CheckChatlistInviteRequest(slug: $slug));
    }

    /**
     * @param string $slug
     * @return ChatlistInviteAlready|ChatlistInvite|null
     * @see https://core.telegram.org/method/chatlists.checkChatlistInvite
     * @api
     */
    public function checkChatlistInvite(string $slug): ?AbstractChatlistInvite
    {
        return $this->checkChatlistInviteAsync(slug: $slug)->await();
    }

    /**
     * @param string $slug
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $peers
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/chatlists.joinChatlistInvite
     * @api
     */
    public function joinChatlistInviteAsync(string $slug, array $peers): Future
    {
        return $this->client->call(new JoinChatlistInviteRequest(slug: $slug, peers: $peers));
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
        return $this->joinChatlistInviteAsync(slug: $slug, peers: $peers)->await();
    }

    /**
     * @param InputChatlist $chatlist
     * @return Future<ChatlistUpdates|null>
     * @see https://core.telegram.org/method/chatlists.getChatlistUpdates
     * @api
     */
    public function getChatlistUpdatesAsync(InputChatlist $chatlist): Future
    {
        return $this->client->call(new GetChatlistUpdatesRequest(chatlist: $chatlist));
    }

    /**
     * @param InputChatlist $chatlist
     * @return ChatlistUpdates|null
     * @see https://core.telegram.org/method/chatlists.getChatlistUpdates
     * @api
     */
    public function getChatlistUpdates(InputChatlist $chatlist): ?ChatlistUpdates
    {
        return $this->getChatlistUpdatesAsync(chatlist: $chatlist)->await();
    }

    /**
     * @param InputChatlist $chatlist
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $peers
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/chatlists.joinChatlistUpdates
     * @api
     */
    public function joinChatlistUpdatesAsync(InputChatlist $chatlist, array $peers): Future
    {
        return $this->client->call(new JoinChatlistUpdatesRequest(chatlist: $chatlist, peers: $peers));
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
        return $this->joinChatlistUpdatesAsync(chatlist: $chatlist, peers: $peers)->await();
    }

    /**
     * @param InputChatlist $chatlist
     * @return Future<bool>
     * @see https://core.telegram.org/method/chatlists.hideChatlistUpdates
     * @api
     */
    public function hideChatlistUpdatesAsync(InputChatlist $chatlist): Future
    {
        return $this->client->call(new HideChatlistUpdatesRequest(chatlist: $chatlist));
    }

    /**
     * @param InputChatlist $chatlist
     * @return bool
     * @see https://core.telegram.org/method/chatlists.hideChatlistUpdates
     * @api
     */
    public function hideChatlistUpdates(InputChatlist $chatlist): bool
    {
        return (bool) $this->hideChatlistUpdatesAsync(chatlist: $chatlist)->await();
    }

    /**
     * @param InputChatlist $chatlist
     * @return Future<list<PeerUser|PeerChat|PeerChannel>>
     * @see https://core.telegram.org/method/chatlists.getLeaveChatlistSuggestions
     * @api
     */
    public function getLeaveChatlistSuggestionsAsync(InputChatlist $chatlist): Future
    {
        return $this->client->call(new GetLeaveChatlistSuggestionsRequest(chatlist: $chatlist));
    }

    /**
     * @param InputChatlist $chatlist
     * @return list<PeerUser|PeerChat|PeerChannel>
     * @see https://core.telegram.org/method/chatlists.getLeaveChatlistSuggestions
     * @api
     */
    public function getLeaveChatlistSuggestions(InputChatlist $chatlist): array
    {
        return $this->getLeaveChatlistSuggestionsAsync(chatlist: $chatlist)->await();
    }

    /**
     * @param InputChatlist $chatlist
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $peers
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/chatlists.leaveChatlist
     * @api
     */
    public function leaveChatlistAsync(InputChatlist $chatlist, array $peers): Future
    {
        return $this->client->call(new LeaveChatlistRequest(chatlist: $chatlist, peers: $peers));
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
        return $this->leaveChatlistAsync(chatlist: $chatlist, peers: $peers)->await();
    }
}