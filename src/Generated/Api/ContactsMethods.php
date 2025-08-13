<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

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
     * @return list<int>
     * @see https://core.telegram.org/method/contacts.getContactIDs
     * @api
     */
    public function getContactIDs(int $hash): array
    {
        return $this->client->callSync(new GetContactIDsRequest($hash));
    }

    /**
     * @return list<ContactStatus>
     * @see https://core.telegram.org/method/contacts.getStatuses
     * @api
     */
    public function getStatuses(): array
    {
        return $this->client->callSync(new GetStatusesRequest());
    }

    /**
     * @param int $hash
     * @return ContactsNotModified|Contacts|null
     * @see https://core.telegram.org/method/contacts.getContacts
     * @api
     */
    public function getContacts(int $hash): ?AbstractContacts
    {
        return $this->client->callSync(new GetContactsRequest($hash));
    }

    /**
     * @param list<InputContact> $contacts
     * @return ImportedContacts|null
     * @see https://core.telegram.org/method/contacts.importContacts
     * @api
     */
    public function importContacts(array $contacts): ?ImportedContacts
    {
        return $this->client->callSync(new ImportContactsRequest($contacts));
    }

    /**
     * @param list<InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage> $id
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/contacts.deleteContacts
     * @api
     */
    public function deleteContacts(array $id): ?AbstractUpdates
    {
        return $this->client->callSync(new DeleteContactsRequest($id));
    }

    /**
     * @param list<string> $phones
     * @return bool
     * @see https://core.telegram.org/method/contacts.deleteByPhones
     * @api
     */
    public function deleteByPhones(array $phones): bool
    {
        return (bool) $this->client->callSync(new DeleteByPhonesRequest($phones));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $id
     * @param bool|null $myStoriesFrom
     * @return bool
     * @see https://core.telegram.org/method/contacts.block
     * @api
     */
    public function block(AbstractInputPeer $id, ?bool $myStoriesFrom = null): bool
    {
        return (bool) $this->client->callSync(new BlockRequest($id, $myStoriesFrom));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $id
     * @param bool|null $myStoriesFrom
     * @return bool
     * @see https://core.telegram.org/method/contacts.unblock
     * @api
     */
    public function unblock(AbstractInputPeer $id, ?bool $myStoriesFrom = null): bool
    {
        return (bool) $this->client->callSync(new UnblockRequest($id, $myStoriesFrom));
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
        return $this->client->callSync(new GetBlockedRequest($offset, $limit, $myStoriesFrom));
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
        return $this->client->callSync(new SearchRequest($q, $limit));
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
        return $this->client->callSync(new ResolveUsernameRequest($username, $referer));
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
        return $this->client->callSync(new GetTopPeersRequest($offset, $limit, $hash, $correspondents, $botsPm, $botsInline, $phoneCalls, $forwardUsers, $forwardChats, $groups, $channels, $botsApp));
    }

    /**
     * @param TopPeerCategory $category
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return bool
     * @see https://core.telegram.org/method/contacts.resetTopPeerRating
     * @api
     */
    public function resetTopPeerRating(TopPeerCategory $category, AbstractInputPeer $peer): bool
    {
        return (bool) $this->client->callSync(new ResetTopPeerRatingRequest($category, $peer));
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/contacts.resetSaved
     * @api
     */
    public function resetSaved(): bool
    {
        return (bool) $this->client->callSync(new ResetSavedRequest());
    }

    /**
     * @return list<SavedContact>
     * @see https://core.telegram.org/method/contacts.getSaved
     * @api
     */
    public function getSaved(): array
    {
        return $this->client->callSync(new GetSavedRequest());
    }

    /**
     * @param bool $enabled
     * @return bool
     * @see https://core.telegram.org/method/contacts.toggleTopPeers
     * @api
     */
    public function toggleTopPeers(bool $enabled): bool
    {
        return (bool) $this->client->callSync(new ToggleTopPeersRequest($enabled));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $id
     * @param string $firstName
     * @param string $lastName
     * @param string $phone
     * @param bool|null $addPhonePrivacyException
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/contacts.addContact
     * @api
     */
    public function addContact(AbstractInputUser $id, string $firstName, string $lastName, string $phone, ?bool $addPhonePrivacyException = null): ?AbstractUpdates
    {
        return $this->client->callSync(new AddContactRequest($id, $firstName, $lastName, $phone, $addPhonePrivacyException));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $id
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/contacts.acceptContact
     * @api
     */
    public function acceptContact(AbstractInputUser $id): ?AbstractUpdates
    {
        return $this->client->callSync(new AcceptContactRequest($id));
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
        return $this->client->callSync(new GetLocatedRequest($geoPoint, $background, $selfExpires));
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
        return $this->client->callSync(new BlockFromRepliesRequest($msgId, $deleteMessage, $deleteHistory, $reportSpam));
    }

    /**
     * @param string $phone
     * @return ResolvedPeer|null
     * @see https://core.telegram.org/method/contacts.resolvePhone
     * @api
     */
    public function resolvePhone(string $phone): ?ResolvedPeer
    {
        return $this->client->callSync(new ResolvePhoneRequest($phone));
    }

    /**
     * @return ExportedContactToken|null
     * @see https://core.telegram.org/method/contacts.exportContactToken
     * @api
     */
    public function exportContactToken(): ?ExportedContactToken
    {
        return $this->client->callSync(new ExportContactTokenRequest());
    }

    /**
     * @param string $token
     * @return UserEmpty|User|null
     * @see https://core.telegram.org/method/contacts.importContactToken
     * @api
     */
    public function importContactToken(string $token): ?AbstractUser
    {
        return $this->client->callSync(new ImportContactTokenRequest($token));
    }

    /**
     * @param list<int> $id
     * @return bool
     * @see https://core.telegram.org/method/contacts.editCloseFriends
     * @api
     */
    public function editCloseFriends(array $id): bool
    {
        return (bool) $this->client->callSync(new EditCloseFriendsRequest($id));
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
        return (bool) $this->client->callSync(new SetBlockedRequest($id, $limit, $myStoriesFrom));
    }

    /**
     * @return ContactBirthdays|null
     * @see https://core.telegram.org/method/contacts.getBirthdays
     * @api
     */
    public function getBirthdays(): ?ContactBirthdays
    {
        return $this->client->callSync(new GetBirthdaysRequest());
    }

    /**
     * @param string $q
     * @return SponsoredPeersEmpty|SponsoredPeers|null
     * @see https://core.telegram.org/method/contacts.getSponsoredPeers
     * @api
     */
    public function getSponsoredPeers(string $q): ?AbstractSponsoredPeers
    {
        return $this->client->callSync(new GetSponsoredPeersRequest($q));
    }
}