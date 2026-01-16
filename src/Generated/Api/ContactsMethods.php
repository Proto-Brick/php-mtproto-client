<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Api;

use Amp\Future;
use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\AcceptContactRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\AddContactRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\BlockFromRepliesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\BlockRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\DeleteByPhonesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\DeleteContactsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\EditCloseFriendsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\ExportContactTokenRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\GetBirthdaysRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\GetBlockedRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\GetContactIDsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\GetContactsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\GetLocatedRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\GetSavedRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\GetSponsoredPeersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\GetStatusesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\GetTopPeersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\ImportContactTokenRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\ImportContactsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\ResetSavedRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\ResetTopPeerRatingRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\ResolvePhoneRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\ResolveUsernameRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\SearchRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\SetBlockedRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\ToggleTopPeersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\UnblockRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Contacts\UpdateContactNoteRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGeoPoint;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ContactStatus;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ExportedContactToken;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputContact;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputGeoPoint;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputGeoPointEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SavedContact;
use ProtoBrick\MTProtoClient\Generated\Types\Base\TextWithEntities;
use ProtoBrick\MTProtoClient\Generated\Types\Base\TopPeerCategory;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShort;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortChatMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortSentMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Updates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesCombined;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesTooLong;
use ProtoBrick\MTProtoClient\Generated\Types\Base\User;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UserEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\AbstractBlocked;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\AbstractContacts;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\AbstractSponsoredPeers;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\AbstractTopPeers;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\Blocked;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\BlockedSlice;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\ContactBirthdays;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\Contacts;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\ContactsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\Found;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\ImportedContacts;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\ResolvedPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\SponsoredPeers;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\SponsoredPeersEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\TopPeers;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\TopPeersDisabled;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\TopPeersNotModified;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "contacts" group.
 */
final readonly class ContactsMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param int $hash
     * @return Future<list<int>>
     * @see https://core.telegram.org/method/contacts.getContactIDs
     * @api
     */
    public function getContactIDsAsync(int $hash): Future
    {
        return $this->client->call(new GetContactIDsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return list<int>
     * @see https://core.telegram.org/method/contacts.getContactIDs
     * @api
     */
    public function getContactIDs(int $hash): array
    {
        return $this->getContactIDsAsync(hash: $hash)->await();
    }

    /**
     * @return Future<list<ContactStatus>>
     * @see https://core.telegram.org/method/contacts.getStatuses
     * @api
     */
    public function getStatusesAsync(): Future
    {
        return $this->client->call(new GetStatusesRequest());
    }

    /**
     * @return list<ContactStatus>
     * @see https://core.telegram.org/method/contacts.getStatuses
     * @api
     */
    public function getStatuses(): array
    {
        return $this->getStatusesAsync()->await();
    }

    /**
     * @param int $hash
     * @return Future<ContactsNotModified|Contacts|null>
     * @see https://core.telegram.org/method/contacts.getContacts
     * @api
     */
    public function getContactsAsync(int $hash): Future
    {
        return $this->client->call(new GetContactsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return ContactsNotModified|Contacts|null
     * @see https://core.telegram.org/method/contacts.getContacts
     * @api
     */
    public function getContacts(int $hash): ?AbstractContacts
    {
        return $this->getContactsAsync(hash: $hash)->await();
    }

    /**
     * @param list<InputContact> $contacts
     * @return Future<ImportedContacts|null>
     * @see https://core.telegram.org/method/contacts.importContacts
     * @api
     */
    public function importContactsAsync(array $contacts): Future
    {
        return $this->client->call(new ImportContactsRequest(contacts: $contacts));
    }

    /**
     * @param list<InputContact> $contacts
     * @return ImportedContacts|null
     * @see https://core.telegram.org/method/contacts.importContacts
     * @api
     */
    public function importContacts(array $contacts): ?ImportedContacts
    {
        return $this->importContactsAsync(contacts: $contacts)->await();
    }

    /**
     * @param list<InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage> $id
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/contacts.deleteContacts
     * @api
     */
    public function deleteContactsAsync(array $id): Future
    {
        return $this->client->call(new DeleteContactsRequest(id: $id));
    }

    /**
     * @param list<InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage> $id
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/contacts.deleteContacts
     * @api
     */
    public function deleteContacts(array $id): ?AbstractUpdates
    {
        return $this->deleteContactsAsync(id: $id)->await();
    }

    /**
     * @param list<string> $phones
     * @return Future<bool>
     * @see https://core.telegram.org/method/contacts.deleteByPhones
     * @api
     */
    public function deleteByPhonesAsync(array $phones): Future
    {
        return $this->client->call(new DeleteByPhonesRequest(phones: $phones));
    }

    /**
     * @param list<string> $phones
     * @return bool
     * @see https://core.telegram.org/method/contacts.deleteByPhones
     * @api
     */
    public function deleteByPhones(array $phones): bool
    {
        return (bool) $this->deleteByPhonesAsync(phones: $phones)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $id
     * @param bool|null $myStoriesFrom
     * @return Future<bool>
     * @see https://core.telegram.org/method/contacts.block
     * @api
     */
    public function blockAsync(AbstractInputPeer|string|int $id, ?bool $myStoriesFrom = null): Future
    {
        if (is_string($id) || is_int($id)) {
            $id = $this->client->peerManager->resolve($id);
        }
        return $this->client->call(new BlockRequest(id: $id, myStoriesFrom: $myStoriesFrom));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $id
     * @param bool|null $myStoriesFrom
     * @return bool
     * @see https://core.telegram.org/method/contacts.block
     * @api
     */
    public function block(AbstractInputPeer|string|int $id, ?bool $myStoriesFrom = null): bool
    {
        return (bool) $this->blockAsync(id: $id, myStoriesFrom: $myStoriesFrom)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $id
     * @param bool|null $myStoriesFrom
     * @return Future<bool>
     * @see https://core.telegram.org/method/contacts.unblock
     * @api
     */
    public function unblockAsync(AbstractInputPeer|string|int $id, ?bool $myStoriesFrom = null): Future
    {
        if (is_string($id) || is_int($id)) {
            $id = $this->client->peerManager->resolve($id);
        }
        return $this->client->call(new UnblockRequest(id: $id, myStoriesFrom: $myStoriesFrom));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $id
     * @param bool|null $myStoriesFrom
     * @return bool
     * @see https://core.telegram.org/method/contacts.unblock
     * @api
     */
    public function unblock(AbstractInputPeer|string|int $id, ?bool $myStoriesFrom = null): bool
    {
        return (bool) $this->unblockAsync(id: $id, myStoriesFrom: $myStoriesFrom)->await();
    }

    /**
     * @param int $offset
     * @param int $limit
     * @param bool|null $myStoriesFrom
     * @return Future<Blocked|BlockedSlice|null>
     * @see https://core.telegram.org/method/contacts.getBlocked
     * @api
     */
    public function getBlockedAsync(int $offset, int $limit, ?bool $myStoriesFrom = null): Future
    {
        return $this->client->call(new GetBlockedRequest(offset: $offset, limit: $limit, myStoriesFrom: $myStoriesFrom));
    }

    /**
     * @param int $offset
     * @param int $limit
     * @param bool|null $myStoriesFrom
     * @return Blocked|BlockedSlice|null
     * @see https://core.telegram.org/method/contacts.getBlocked
     * @api
     */
    public function getBlocked(int $offset, int $limit, ?bool $myStoriesFrom = null): ?AbstractBlocked
    {
        return $this->getBlockedAsync(offset: $offset, limit: $limit, myStoriesFrom: $myStoriesFrom)->await();
    }

    /**
     * @param string $q
     * @param int $limit
     * @return Future<Found|null>
     * @see https://core.telegram.org/method/contacts.search
     * @api
     */
    public function searchAsync(string $q, int $limit): Future
    {
        return $this->client->call(new SearchRequest(q: $q, limit: $limit));
    }

    /**
     * @param string $q
     * @param int $limit
     * @return Found|null
     * @see https://core.telegram.org/method/contacts.search
     * @api
     */
    public function search(string $q, int $limit): ?Found
    {
        return $this->searchAsync(q: $q, limit: $limit)->await();
    }

    /**
     * @param string $username
     * @param string|null $referer
     * @return Future<ResolvedPeer|null>
     * @see https://core.telegram.org/method/contacts.resolveUsername
     * @api
     */
    public function resolveUsernameAsync(string $username, ?string $referer = null): Future
    {
        return $this->client->call(new ResolveUsernameRequest(username: $username, referer: $referer));
    }

    /**
     * @param string $username
     * @param string|null $referer
     * @return ResolvedPeer|null
     * @see https://core.telegram.org/method/contacts.resolveUsername
     * @api
     */
    public function resolveUsername(string $username, ?string $referer = null): ?ResolvedPeer
    {
        return $this->resolveUsernameAsync(username: $username, referer: $referer)->await();
    }

    /**
     * @param int $offset
     * @param int $limit
     * @param int $hash
     * @param bool|null $correspondents
     * @param bool|null $botsPm
     * @param bool|null $botsInline
     * @param bool|null $phoneCalls
     * @param bool|null $forwardUsers
     * @param bool|null $forwardChats
     * @param bool|null $groups
     * @param bool|null $channels
     * @param bool|null $botsApp
     * @return Future<TopPeersNotModified|TopPeers|TopPeersDisabled|null>
     * @see https://core.telegram.org/method/contacts.getTopPeers
     * @api
     */
    public function getTopPeersAsync(int $offset, int $limit, int $hash, ?bool $correspondents = null, ?bool $botsPm = null, ?bool $botsInline = null, ?bool $phoneCalls = null, ?bool $forwardUsers = null, ?bool $forwardChats = null, ?bool $groups = null, ?bool $channels = null, ?bool $botsApp = null): Future
    {
        return $this->client->call(new GetTopPeersRequest(offset: $offset, limit: $limit, hash: $hash, correspondents: $correspondents, botsPm: $botsPm, botsInline: $botsInline, phoneCalls: $phoneCalls, forwardUsers: $forwardUsers, forwardChats: $forwardChats, groups: $groups, channels: $channels, botsApp: $botsApp));
    }

    /**
     * @param int $offset
     * @param int $limit
     * @param int $hash
     * @param bool|null $correspondents
     * @param bool|null $botsPm
     * @param bool|null $botsInline
     * @param bool|null $phoneCalls
     * @param bool|null $forwardUsers
     * @param bool|null $forwardChats
     * @param bool|null $groups
     * @param bool|null $channels
     * @param bool|null $botsApp
     * @return TopPeersNotModified|TopPeers|TopPeersDisabled|null
     * @see https://core.telegram.org/method/contacts.getTopPeers
     * @api
     */
    public function getTopPeers(int $offset, int $limit, int $hash, ?bool $correspondents = null, ?bool $botsPm = null, ?bool $botsInline = null, ?bool $phoneCalls = null, ?bool $forwardUsers = null, ?bool $forwardChats = null, ?bool $groups = null, ?bool $channels = null, ?bool $botsApp = null): ?AbstractTopPeers
    {
        return $this->getTopPeersAsync(offset: $offset, limit: $limit, hash: $hash, correspondents: $correspondents, botsPm: $botsPm, botsInline: $botsInline, phoneCalls: $phoneCalls, forwardUsers: $forwardUsers, forwardChats: $forwardChats, groups: $groups, channels: $channels, botsApp: $botsApp)->await();
    }

    /**
     * @param TopPeerCategory $category
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return Future<bool>
     * @see https://core.telegram.org/method/contacts.resetTopPeerRating
     * @api
     */
    public function resetTopPeerRatingAsync(TopPeerCategory $category, AbstractInputPeer|string|int $peer): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ResetTopPeerRatingRequest(category: $category, peer: $peer));
    }

    /**
     * @param TopPeerCategory $category
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return bool
     * @see https://core.telegram.org/method/contacts.resetTopPeerRating
     * @api
     */
    public function resetTopPeerRating(TopPeerCategory $category, AbstractInputPeer|string|int $peer): bool
    {
        return (bool) $this->resetTopPeerRatingAsync(category: $category, peer: $peer)->await();
    }

    /**
     * @return Future<bool>
     * @see https://core.telegram.org/method/contacts.resetSaved
     * @api
     */
    public function resetSavedAsync(): Future
    {
        return $this->client->call(new ResetSavedRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/contacts.resetSaved
     * @api
     */
    public function resetSaved(): bool
    {
        return (bool) $this->resetSavedAsync()->await();
    }

    /**
     * @return Future<list<SavedContact>>
     * @see https://core.telegram.org/method/contacts.getSaved
     * @api
     */
    public function getSavedAsync(): Future
    {
        return $this->client->call(new GetSavedRequest());
    }

    /**
     * @return list<SavedContact>
     * @see https://core.telegram.org/method/contacts.getSaved
     * @api
     */
    public function getSaved(): array
    {
        return $this->getSavedAsync()->await();
    }

    /**
     * @param bool $enabled
     * @return Future<bool>
     * @see https://core.telegram.org/method/contacts.toggleTopPeers
     * @api
     */
    public function toggleTopPeersAsync(bool $enabled): Future
    {
        return $this->client->call(new ToggleTopPeersRequest(enabled: $enabled));
    }

    /**
     * @param bool $enabled
     * @return bool
     * @see https://core.telegram.org/method/contacts.toggleTopPeers
     * @api
     */
    public function toggleTopPeers(bool $enabled): bool
    {
        return (bool) $this->toggleTopPeersAsync(enabled: $enabled)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $id
     * @param string $firstName
     * @param string $lastName
     * @param string $phone
     * @param bool|null $addPhonePrivacyException
     * @param TextWithEntities|null $note
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/contacts.addContact
     * @api
     */
    public function addContactAsync(AbstractInputUser|string|int $id, string $firstName, string $lastName, string $phone, ?bool $addPhonePrivacyException = null, ?TextWithEntities $note = null): Future
    {
        if (is_string($id) || is_int($id)) {
            $__tmpPeer = $this->client->peerManager->resolve($id);
            if ($__tmpPeer instanceof InputPeerUser) {
                $id = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $id = $__tmpPeer;
            }
        }
        return $this->client->call(new AddContactRequest(id: $id, firstName: $firstName, lastName: $lastName, phone: $phone, addPhonePrivacyException: $addPhonePrivacyException, note: $note));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $id
     * @param string $firstName
     * @param string $lastName
     * @param string $phone
     * @param bool|null $addPhonePrivacyException
     * @param TextWithEntities|null $note
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/contacts.addContact
     * @api
     */
    public function addContact(AbstractInputUser|string|int $id, string $firstName, string $lastName, string $phone, ?bool $addPhonePrivacyException = null, ?TextWithEntities $note = null): ?AbstractUpdates
    {
        return $this->addContactAsync(id: $id, firstName: $firstName, lastName: $lastName, phone: $phone, addPhonePrivacyException: $addPhonePrivacyException, note: $note)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $id
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/contacts.acceptContact
     * @api
     */
    public function acceptContactAsync(AbstractInputUser|string|int $id): Future
    {
        if (is_string($id) || is_int($id)) {
            $__tmpPeer = $this->client->peerManager->resolve($id);
            if ($__tmpPeer instanceof InputPeerUser) {
                $id = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $id = $__tmpPeer;
            }
        }
        return $this->client->call(new AcceptContactRequest(id: $id));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $id
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/contacts.acceptContact
     * @api
     */
    public function acceptContact(AbstractInputUser|string|int $id): ?AbstractUpdates
    {
        return $this->acceptContactAsync(id: $id)->await();
    }

    /**
     * @param InputGeoPointEmpty|InputGeoPoint $geoPoint
     * @param bool|null $background
     * @param int|null $selfExpires
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/contacts.getLocated
     * @api
     */
    public function getLocatedAsync(AbstractInputGeoPoint $geoPoint, ?bool $background = null, ?int $selfExpires = null): Future
    {
        return $this->client->call(new GetLocatedRequest(geoPoint: $geoPoint, background: $background, selfExpires: $selfExpires));
    }

    /**
     * @param InputGeoPointEmpty|InputGeoPoint $geoPoint
     * @param bool|null $background
     * @param int|null $selfExpires
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/contacts.getLocated
     * @api
     */
    public function getLocated(AbstractInputGeoPoint $geoPoint, ?bool $background = null, ?int $selfExpires = null): ?AbstractUpdates
    {
        return $this->getLocatedAsync(geoPoint: $geoPoint, background: $background, selfExpires: $selfExpires)->await();
    }

    /**
     * @param int $msgId
     * @param bool|null $deleteMessage
     * @param bool|null $deleteHistory
     * @param bool|null $reportSpam
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/contacts.blockFromReplies
     * @api
     */
    public function blockFromRepliesAsync(int $msgId, ?bool $deleteMessage = null, ?bool $deleteHistory = null, ?bool $reportSpam = null): Future
    {
        return $this->client->call(new BlockFromRepliesRequest(msgId: $msgId, deleteMessage: $deleteMessage, deleteHistory: $deleteHistory, reportSpam: $reportSpam));
    }

    /**
     * @param int $msgId
     * @param bool|null $deleteMessage
     * @param bool|null $deleteHistory
     * @param bool|null $reportSpam
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/contacts.blockFromReplies
     * @api
     */
    public function blockFromReplies(int $msgId, ?bool $deleteMessage = null, ?bool $deleteHistory = null, ?bool $reportSpam = null): ?AbstractUpdates
    {
        return $this->blockFromRepliesAsync(msgId: $msgId, deleteMessage: $deleteMessage, deleteHistory: $deleteHistory, reportSpam: $reportSpam)->await();
    }

    /**
     * @param string $phone
     * @return Future<ResolvedPeer|null>
     * @see https://core.telegram.org/method/contacts.resolvePhone
     * @api
     */
    public function resolvePhoneAsync(string $phone): Future
    {
        return $this->client->call(new ResolvePhoneRequest(phone: $phone));
    }

    /**
     * @param string $phone
     * @return ResolvedPeer|null
     * @see https://core.telegram.org/method/contacts.resolvePhone
     * @api
     */
    public function resolvePhone(string $phone): ?ResolvedPeer
    {
        return $this->resolvePhoneAsync(phone: $phone)->await();
    }

    /**
     * @return Future<ExportedContactToken|null>
     * @see https://core.telegram.org/method/contacts.exportContactToken
     * @api
     */
    public function exportContactTokenAsync(): Future
    {
        return $this->client->call(new ExportContactTokenRequest());
    }

    /**
     * @return ExportedContactToken|null
     * @see https://core.telegram.org/method/contacts.exportContactToken
     * @api
     */
    public function exportContactToken(): ?ExportedContactToken
    {
        return $this->exportContactTokenAsync()->await();
    }

    /**
     * @param string $token
     * @return Future<UserEmpty|User|null>
     * @see https://core.telegram.org/method/contacts.importContactToken
     * @api
     */
    public function importContactTokenAsync(string $token): Future
    {
        return $this->client->call(new ImportContactTokenRequest(token: $token));
    }

    /**
     * @param string $token
     * @return UserEmpty|User|null
     * @see https://core.telegram.org/method/contacts.importContactToken
     * @api
     */
    public function importContactToken(string $token): ?AbstractUser
    {
        return $this->importContactTokenAsync(token: $token)->await();
    }

    /**
     * @param list<int> $id
     * @return Future<bool>
     * @see https://core.telegram.org/method/contacts.editCloseFriends
     * @api
     */
    public function editCloseFriendsAsync(array $id): Future
    {
        return $this->client->call(new EditCloseFriendsRequest(id: $id));
    }

    /**
     * @param list<int> $id
     * @return bool
     * @see https://core.telegram.org/method/contacts.editCloseFriends
     * @api
     */
    public function editCloseFriends(array $id): bool
    {
        return (bool) $this->editCloseFriendsAsync(id: $id)->await();
    }

    /**
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $id
     * @param int $limit
     * @param bool|null $myStoriesFrom
     * @return Future<bool>
     * @see https://core.telegram.org/method/contacts.setBlocked
     * @api
     */
    public function setBlockedAsync(array $id, int $limit, ?bool $myStoriesFrom = null): Future
    {
        return $this->client->call(new SetBlockedRequest(id: $id, limit: $limit, myStoriesFrom: $myStoriesFrom));
    }

    /**
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $id
     * @param int $limit
     * @param bool|null $myStoriesFrom
     * @return bool
     * @see https://core.telegram.org/method/contacts.setBlocked
     * @api
     */
    public function setBlocked(array $id, int $limit, ?bool $myStoriesFrom = null): bool
    {
        return (bool) $this->setBlockedAsync(id: $id, limit: $limit, myStoriesFrom: $myStoriesFrom)->await();
    }

    /**
     * @return Future<ContactBirthdays|null>
     * @see https://core.telegram.org/method/contacts.getBirthdays
     * @api
     */
    public function getBirthdaysAsync(): Future
    {
        return $this->client->call(new GetBirthdaysRequest());
    }

    /**
     * @return ContactBirthdays|null
     * @see https://core.telegram.org/method/contacts.getBirthdays
     * @api
     */
    public function getBirthdays(): ?ContactBirthdays
    {
        return $this->getBirthdaysAsync()->await();
    }

    /**
     * @param string $q
     * @return Future<SponsoredPeersEmpty|SponsoredPeers|null>
     * @see https://core.telegram.org/method/contacts.getSponsoredPeers
     * @api
     */
    public function getSponsoredPeersAsync(string $q): Future
    {
        return $this->client->call(new GetSponsoredPeersRequest(q: $q));
    }

    /**
     * @param string $q
     * @return SponsoredPeersEmpty|SponsoredPeers|null
     * @see https://core.telegram.org/method/contacts.getSponsoredPeers
     * @api
     */
    public function getSponsoredPeers(string $q): ?AbstractSponsoredPeers
    {
        return $this->getSponsoredPeersAsync(q: $q)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $id
     * @param TextWithEntities $note
     * @return Future<bool>
     * @see https://core.telegram.org/method/contacts.updateContactNote
     * @api
     */
    public function updateContactNoteAsync(AbstractInputUser|string|int $id, TextWithEntities $note): Future
    {
        if (is_string($id) || is_int($id)) {
            $__tmpPeer = $this->client->peerManager->resolve($id);
            if ($__tmpPeer instanceof InputPeerUser) {
                $id = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $id = $__tmpPeer;
            }
        }
        return $this->client->call(new UpdateContactNoteRequest(id: $id, note: $note));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $id
     * @param TextWithEntities $note
     * @return bool
     * @see https://core.telegram.org/method/contacts.updateContactNote
     * @api
     */
    public function updateContactNote(AbstractInputUser|string|int $id, TextWithEntities $note): bool
    {
        return (bool) $this->updateContactNoteAsync(id: $id, note: $note)->await();
    }
}