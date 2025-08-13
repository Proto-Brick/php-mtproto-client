<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\AddPreviewMediaRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\AllowSendMessageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\AnswerWebhookJSONQueryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\CanSendMessageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\CheckDownloadFileParamsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\DeletePreviewMediaRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\EditPreviewMediaRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\GetAdminedBotsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\GetBotCommandsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\GetBotInfoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\GetBotMenuButtonRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\GetBotRecommendationsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\GetPopularAppBotsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\GetPreviewInfoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\GetPreviewMediasRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\InvokeWebViewCustomMethodRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\ReorderPreviewMediasRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\ReorderUsernamesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\ResetBotCommandsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\SendCustomRequestRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\SetBotBroadcastDefaultAdminRightsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\SetBotCommandsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\SetBotGroupDefaultAdminRightsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\SetBotInfoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\SetBotMenuButtonRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\SetCustomVerificationRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\ToggleUserEmojiStatusPermissionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\ToggleUsernameRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\UpdateStarRefProgramRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Bots\UpdateUserEmojiStatusRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotCommandScope;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotMenuButton;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmojiStatus;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\BotCommand;
use DigitalStars\MtprotoClient\Generated\Types\Base\BotCommandScopeChatAdmins;
use DigitalStars\MtprotoClient\Generated\Types\Base\BotCommandScopeChats;
use DigitalStars\MtprotoClient\Generated\Types\Base\BotCommandScopeDefault;
use DigitalStars\MtprotoClient\Generated\Types\Base\BotCommandScopePeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\BotCommandScopePeerAdmins;
use DigitalStars\MtprotoClient\Generated\Types\Base\BotCommandScopePeerUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\BotCommandScopeUsers;
use DigitalStars\MtprotoClient\Generated\Types\Base\BotMenuButton;
use DigitalStars\MtprotoClient\Generated\Types\Base\BotMenuButtonCommands;
use DigitalStars\MtprotoClient\Generated\Types\Base\BotMenuButtonDefault;
use DigitalStars\MtprotoClient\Generated\Types\Base\BotPreviewMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatAdminRights;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiStatus;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiStatusCollectible;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiStatusEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputEmojiStatusCollectible;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaContact;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaDice;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaDocumentExternal;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaGame;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaGeoLive;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaGeoPoint;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaInvoice;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaPaidMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaPhotoExternal;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaPoll;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaStory;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaTodo;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaUploadedDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaUploadedPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaVenue;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaWebPage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarRefProgram;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShort;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortChatMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortSentMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\Updates;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesCombined;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesTooLong;
use DigitalStars\MtprotoClient\Generated\Types\Base\User;
use DigitalStars\MtprotoClient\Generated\Types\Base\UserEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Bots\BotInfo;
use DigitalStars\MtprotoClient\Generated\Types\Bots\PopularAppBots;
use DigitalStars\MtprotoClient\Generated\Types\Bots\PreviewInfo;
use DigitalStars\MtprotoClient\Generated\Types\Users\AbstractUsers;
use DigitalStars\MtprotoClient\Generated\Types\Users\Users;
use DigitalStars\MtprotoClient\Generated\Types\Users\UsersSlice;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "bots" group.
 */
final readonly class BotsMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param string $customMethod
     * @param array $params
     * @return array
     * @see https://core.telegram.org/method/bots.sendCustomRequest
     * @api
     */
    public function sendCustomRequest(string $customMethod, array $params): array
    {
        return $this->client->callSync(new SendCustomRequestRequest($customMethod, $params));
    }

    /**
     * @param int $queryId
     * @param array $data
     * @return bool
     * @see https://core.telegram.org/method/bots.answerWebhookJSONQuery
     * @api
     */
    public function answerWebhookJSONQuery(int $queryId, array $data): bool
    {
        return (bool) $this->client->callSync(new AnswerWebhookJSONQueryRequest($queryId, $data));
    }

    /**
     * @param BotCommandScopeDefault|BotCommandScopeUsers|BotCommandScopeChats|BotCommandScopeChatAdmins|BotCommandScopePeer|BotCommandScopePeerAdmins|BotCommandScopePeerUser $scope
     * @param string $langCode
     * @param list<BotCommand> $commands
     * @return bool
     * @see https://core.telegram.org/method/bots.setBotCommands
     * @api
     */
    public function setBotCommands(AbstractBotCommandScope $scope, string $langCode, array $commands): bool
    {
        return (bool) $this->client->callSync(new SetBotCommandsRequest($scope, $langCode, $commands));
    }

    /**
     * @param BotCommandScopeDefault|BotCommandScopeUsers|BotCommandScopeChats|BotCommandScopeChatAdmins|BotCommandScopePeer|BotCommandScopePeerAdmins|BotCommandScopePeerUser $scope
     * @param string $langCode
     * @return bool
     * @see https://core.telegram.org/method/bots.resetBotCommands
     * @api
     */
    public function resetBotCommands(AbstractBotCommandScope $scope, string $langCode): bool
    {
        return (bool) $this->client->callSync(new ResetBotCommandsRequest($scope, $langCode));
    }

    /**
     * @param BotCommandScopeDefault|BotCommandScopeUsers|BotCommandScopeChats|BotCommandScopeChatAdmins|BotCommandScopePeer|BotCommandScopePeerAdmins|BotCommandScopePeerUser $scope
     * @param string $langCode
     * @return list<BotCommand>
     * @see https://core.telegram.org/method/bots.getBotCommands
     * @api
     */
    public function getBotCommands(AbstractBotCommandScope $scope, string $langCode): array
    {
        return $this->client->callSync(new GetBotCommandsRequest($scope, $langCode));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param BotMenuButtonDefault|BotMenuButtonCommands|BotMenuButton $button
     * @return bool
     * @see https://core.telegram.org/method/bots.setBotMenuButton
     * @api
     */
    public function setBotMenuButton(AbstractInputUser $userId, AbstractBotMenuButton $button): bool
    {
        return (bool) $this->client->callSync(new SetBotMenuButtonRequest($userId, $button));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @return BotMenuButtonDefault|BotMenuButtonCommands|BotMenuButton|null
     * @see https://core.telegram.org/method/bots.getBotMenuButton
     * @api
     */
    public function getBotMenuButton(AbstractInputUser $userId): ?AbstractBotMenuButton
    {
        return $this->client->callSync(new GetBotMenuButtonRequest($userId));
    }

    /**
     * @param ChatAdminRights $adminRights
     * @return bool
     * @see https://core.telegram.org/method/bots.setBotBroadcastDefaultAdminRights
     * @api
     */
    public function setBotBroadcastDefaultAdminRights(ChatAdminRights $adminRights): bool
    {
        return (bool) $this->client->callSync(new SetBotBroadcastDefaultAdminRightsRequest($adminRights));
    }

    /**
     * @param ChatAdminRights $adminRights
     * @return bool
     * @see https://core.telegram.org/method/bots.setBotGroupDefaultAdminRights
     * @api
     */
    public function setBotGroupDefaultAdminRights(ChatAdminRights $adminRights): bool
    {
        return (bool) $this->client->callSync(new SetBotGroupDefaultAdminRightsRequest($adminRights));
    }

    /**
     * @param string $langCode
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|null $bot
     * @param string|null $name
     * @param string|null $about
     * @param string|null $description
     * @return bool
     * @see https://core.telegram.org/method/bots.setBotInfo
     * @api
     */
    public function setBotInfo(string $langCode, ?AbstractInputUser $bot = null, ?string $name = null, ?string $about = null, ?string $description = null): bool
    {
        return (bool) $this->client->callSync(new SetBotInfoRequest($langCode, $bot, $name, $about, $description));
    }

    /**
     * @param string $langCode
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|null $bot
     * @return BotInfo|null
     * @see https://core.telegram.org/method/bots.getBotInfo
     * @api
     */
    public function getBotInfo(string $langCode, ?AbstractInputUser $bot = null): ?BotInfo
    {
        return $this->client->callSync(new GetBotInfoRequest($langCode, $bot));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param list<string> $order
     * @return bool
     * @see https://core.telegram.org/method/bots.reorderUsernames
     * @api
     */
    public function reorderUsernames(AbstractInputUser $bot, array $order): bool
    {
        return (bool) $this->client->callSync(new ReorderUsernamesRequest($bot, $order));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param string $username
     * @param bool $active
     * @return bool
     * @see https://core.telegram.org/method/bots.toggleUsername
     * @api
     */
    public function toggleUsername(AbstractInputUser $bot, string $username, bool $active): bool
    {
        return (bool) $this->client->callSync(new ToggleUsernameRequest($bot, $username, $active));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @return bool
     * @see https://core.telegram.org/method/bots.canSendMessage
     * @api
     */
    public function canSendMessage(AbstractInputUser $bot): bool
    {
        return (bool) $this->client->callSync(new CanSendMessageRequest($bot));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/bots.allowSendMessage
     * @api
     */
    public function allowSendMessage(AbstractInputUser $bot): ?AbstractUpdates
    {
        return $this->client->callSync(new AllowSendMessageRequest($bot));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param string $customMethod
     * @param array $params
     * @return array
     * @see https://core.telegram.org/method/bots.invokeWebViewCustomMethod
     * @api
     */
    public function invokeWebViewCustomMethod(AbstractInputUser $bot, string $customMethod, array $params): array
    {
        return $this->client->callSync(new InvokeWebViewCustomMethodRequest($bot, $customMethod, $params));
    }

    /**
     * @param string $offset
     * @param int $limit
     * @return PopularAppBots|null
     * @see https://core.telegram.org/method/bots.getPopularAppBots
     * @api
     */
    public function getPopularAppBots(string $offset, int $limit): ?PopularAppBots
    {
        return $this->client->callSync(new GetPopularAppBotsRequest($offset, $limit));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param string $langCode
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $media
     * @return BotPreviewMedia|null
     * @see https://core.telegram.org/method/bots.addPreviewMedia
     * @api
     */
    public function addPreviewMedia(AbstractInputUser $bot, string $langCode, AbstractInputMedia $media): ?BotPreviewMedia
    {
        return $this->client->callSync(new AddPreviewMediaRequest($bot, $langCode, $media));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param string $langCode
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $media
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $newMedia
     * @return BotPreviewMedia|null
     * @see https://core.telegram.org/method/bots.editPreviewMedia
     * @api
     */
    public function editPreviewMedia(AbstractInputUser $bot, string $langCode, AbstractInputMedia $media, AbstractInputMedia $newMedia): ?BotPreviewMedia
    {
        return $this->client->callSync(new EditPreviewMediaRequest($bot, $langCode, $media, $newMedia));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param string $langCode
     * @param list<InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo> $media
     * @return bool
     * @see https://core.telegram.org/method/bots.deletePreviewMedia
     * @api
     */
    public function deletePreviewMedia(AbstractInputUser $bot, string $langCode, array $media): bool
    {
        return (bool) $this->client->callSync(new DeletePreviewMediaRequest($bot, $langCode, $media));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param string $langCode
     * @param list<InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo> $order
     * @return bool
     * @see https://core.telegram.org/method/bots.reorderPreviewMedias
     * @api
     */
    public function reorderPreviewMedias(AbstractInputUser $bot, string $langCode, array $order): bool
    {
        return (bool) $this->client->callSync(new ReorderPreviewMediasRequest($bot, $langCode, $order));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param string $langCode
     * @return PreviewInfo|null
     * @see https://core.telegram.org/method/bots.getPreviewInfo
     * @api
     */
    public function getPreviewInfo(AbstractInputUser $bot, string $langCode): ?PreviewInfo
    {
        return $this->client->callSync(new GetPreviewInfoRequest($bot, $langCode));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @return list<BotPreviewMedia>
     * @see https://core.telegram.org/method/bots.getPreviewMedias
     * @api
     */
    public function getPreviewMedias(AbstractInputUser $bot): array
    {
        return $this->client->callSync(new GetPreviewMediasRequest($bot));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param EmojiStatusEmpty|EmojiStatus|EmojiStatusCollectible|InputEmojiStatusCollectible $emojiStatus
     * @return bool
     * @see https://core.telegram.org/method/bots.updateUserEmojiStatus
     * @api
     */
    public function updateUserEmojiStatus(AbstractInputUser $userId, AbstractEmojiStatus $emojiStatus): bool
    {
        return (bool) $this->client->callSync(new UpdateUserEmojiStatusRequest($userId, $emojiStatus));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param bool $enabled
     * @return bool
     * @see https://core.telegram.org/method/bots.toggleUserEmojiStatusPermission
     * @api
     */
    public function toggleUserEmojiStatusPermission(AbstractInputUser $bot, bool $enabled): bool
    {
        return (bool) $this->client->callSync(new ToggleUserEmojiStatusPermissionRequest($bot, $enabled));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param string $fileName
     * @param string $url
     * @return bool
     * @see https://core.telegram.org/method/bots.checkDownloadFileParams
     * @api
     */
    public function checkDownloadFileParams(AbstractInputUser $bot, string $fileName, string $url): bool
    {
        return (bool) $this->client->callSync(new CheckDownloadFileParamsRequest($bot, $fileName, $url));
    }

    /**
     * @return list<UserEmpty|User>
     * @see https://core.telegram.org/method/bots.getAdminedBots
     * @api
     */
    public function getAdminedBots(): array
    {
        return $this->client->callSync(new GetAdminedBotsRequest());
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param int $commissionPermille
     * @param int|null $durationMonths
     * @return StarRefProgram|null
     * @see https://core.telegram.org/method/bots.updateStarRefProgram
     * @api
     */
    public function updateStarRefProgram(AbstractInputUser $bot, int $commissionPermille, ?int $durationMonths = null): ?StarRefProgram
    {
        return $this->client->callSync(new UpdateStarRefProgramRequest($bot, $commissionPermille, $durationMonths));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param bool|null $enabled
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|null $bot
     * @param string|null $customDescription
     * @return bool
     * @see https://core.telegram.org/method/bots.setCustomVerification
     * @api
     */
    public function setCustomVerification(AbstractInputPeer $peer, ?bool $enabled = null, ?AbstractInputUser $bot = null, ?string $customDescription = null): bool
    {
        return (bool) $this->client->callSync(new SetCustomVerificationRequest($peer, $enabled, $bot, $customDescription));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @return Users|UsersSlice|null
     * @see https://core.telegram.org/method/bots.getBotRecommendations
     * @api
     */
    public function getBotRecommendations(AbstractInputUser $bot): ?AbstractUsers
    {
        return $this->client->callSync(new GetBotRecommendationsRequest($bot));
    }
}