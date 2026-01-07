<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\AddPreviewMediaRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\AllowSendMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\AnswerWebhookJSONQueryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\CanSendMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\CheckDownloadFileParamsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\DeletePreviewMediaRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\EditPreviewMediaRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\GetAdminedBotsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\GetBotCommandsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\GetBotInfoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\GetBotMenuButtonRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\GetBotRecommendationsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\GetPopularAppBotsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\GetPreviewInfoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\GetPreviewMediasRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\InvokeWebViewCustomMethodRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\ReorderPreviewMediasRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\ReorderUsernamesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\ResetBotCommandsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\SendCustomRequestRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\SetBotBroadcastDefaultAdminRightsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\SetBotCommandsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\SetBotGroupDefaultAdminRightsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\SetBotInfoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\SetBotMenuButtonRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\SetCustomVerificationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\ToggleUserEmojiStatusPermissionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\ToggleUsernameRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\UpdateStarRefProgramRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Bots\UpdateUserEmojiStatusRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractBotCommandScope;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractBotMenuButton;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmojiStatus;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotCommand;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotCommandScopeChatAdmins;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotCommandScopeChats;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotCommandScopeDefault;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotCommandScopePeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotCommandScopePeerAdmins;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotCommandScopePeerUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotCommandScopeUsers;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotMenuButton;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotMenuButtonCommands;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotMenuButtonDefault;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotPreviewMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatAdminRights;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiStatus;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiStatusCollectible;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiStatusEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEmojiStatusCollectible;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaContact;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaDice;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaDocumentExternal;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaGame;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaGeoLive;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaGeoPoint;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaInvoice;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaPaidMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaPhotoExternal;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaPoll;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaStory;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaTodo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaUploadedDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaUploadedPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaVenue;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaWebPage;
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
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarRefProgram;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShort;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortChatMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortSentMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Updates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesCombined;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesTooLong;
use ProtoBrick\MTProtoClient\Generated\Types\Base\User;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UserEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Bots\BotInfo;
use ProtoBrick\MTProtoClient\Generated\Types\Bots\PopularAppBots;
use ProtoBrick\MTProtoClient\Generated\Types\Bots\PreviewInfo;
use ProtoBrick\MTProtoClient\Generated\Types\Users\AbstractUsers;
use ProtoBrick\MTProtoClient\Generated\Types\Users\Users;
use ProtoBrick\MTProtoClient\Generated\Types\Users\UsersSlice;


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
        return $this->client->callSync(new SendCustomRequestRequest(customMethod: $customMethod, params: $params));
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
        return (bool) $this->client->callSync(new AnswerWebhookJSONQueryRequest(queryId: $queryId, data: $data));
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
        return (bool) $this->client->callSync(new SetBotCommandsRequest(scope: $scope, langCode: $langCode, commands: $commands));
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
        return (bool) $this->client->callSync(new ResetBotCommandsRequest(scope: $scope, langCode: $langCode));
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
        return $this->client->callSync(new GetBotCommandsRequest(scope: $scope, langCode: $langCode));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param BotMenuButtonDefault|BotMenuButtonCommands|BotMenuButton $button
     * @return bool
     * @see https://core.telegram.org/method/bots.setBotMenuButton
     * @api
     */
    public function setBotMenuButton(AbstractInputUser|string|int $userId, AbstractBotMenuButton $button): bool
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return (bool) $this->client->callSync(new SetBotMenuButtonRequest(userId: $userId, button: $button));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @return BotMenuButtonDefault|BotMenuButtonCommands|BotMenuButton|null
     * @see https://core.telegram.org/method/bots.getBotMenuButton
     * @api
     */
    public function getBotMenuButton(AbstractInputUser|string|int $userId): ?AbstractBotMenuButton
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->callSync(new GetBotMenuButtonRequest(userId: $userId));
    }

    /**
     * @param ChatAdminRights $adminRights
     * @return bool
     * @see https://core.telegram.org/method/bots.setBotBroadcastDefaultAdminRights
     * @api
     */
    public function setBotBroadcastDefaultAdminRights(ChatAdminRights $adminRights): bool
    {
        return (bool) $this->client->callSync(new SetBotBroadcastDefaultAdminRightsRequest(adminRights: $adminRights));
    }

    /**
     * @param ChatAdminRights $adminRights
     * @return bool
     * @see https://core.telegram.org/method/bots.setBotGroupDefaultAdminRights
     * @api
     */
    public function setBotGroupDefaultAdminRights(ChatAdminRights $adminRights): bool
    {
        return (bool) $this->client->callSync(new SetBotGroupDefaultAdminRightsRequest(adminRights: $adminRights));
    }

    /**
     * @param string $langCode
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int|null $bot
     * @param string|null $name
     * @param string|null $about
     * @param string|null $description
     * @return bool
     * @see https://core.telegram.org/method/bots.setBotInfo
     * @api
     */
    public function setBotInfo(string $langCode, AbstractInputUser|string|int|null $bot = null, ?string $name = null, ?string $about = null, ?string $description = null): bool
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return (bool) $this->client->callSync(new SetBotInfoRequest(langCode: $langCode, bot: $bot, name: $name, about: $about, description: $description));
    }

    /**
     * @param string $langCode
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int|null $bot
     * @return BotInfo|null
     * @see https://core.telegram.org/method/bots.getBotInfo
     * @api
     */
    public function getBotInfo(string $langCode, AbstractInputUser|string|int|null $bot = null): ?BotInfo
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return $this->client->callSync(new GetBotInfoRequest(langCode: $langCode, bot: $bot));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param list<string> $order
     * @return bool
     * @see https://core.telegram.org/method/bots.reorderUsernames
     * @api
     */
    public function reorderUsernames(AbstractInputUser|string|int $bot, array $order): bool
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return (bool) $this->client->callSync(new ReorderUsernamesRequest(bot: $bot, order: $order));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $username
     * @param bool $active
     * @return bool
     * @see https://core.telegram.org/method/bots.toggleUsername
     * @api
     */
    public function toggleUsername(AbstractInputUser|string|int $bot, string $username, bool $active): bool
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return (bool) $this->client->callSync(new ToggleUsernameRequest(bot: $bot, username: $username, active: $active));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @return bool
     * @see https://core.telegram.org/method/bots.canSendMessage
     * @api
     */
    public function canSendMessage(AbstractInputUser|string|int $bot): bool
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return (bool) $this->client->callSync(new CanSendMessageRequest(bot: $bot));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/bots.allowSendMessage
     * @api
     */
    public function allowSendMessage(AbstractInputUser|string|int $bot): ?AbstractUpdates
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return $this->client->callSync(new AllowSendMessageRequest(bot: $bot));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $customMethod
     * @param array $params
     * @return array
     * @see https://core.telegram.org/method/bots.invokeWebViewCustomMethod
     * @api
     */
    public function invokeWebViewCustomMethod(AbstractInputUser|string|int $bot, string $customMethod, array $params): array
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return $this->client->callSync(new InvokeWebViewCustomMethodRequest(bot: $bot, customMethod: $customMethod, params: $params));
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
        return $this->client->callSync(new GetPopularAppBotsRequest(offset: $offset, limit: $limit));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $langCode
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $media
     * @return BotPreviewMedia|null
     * @see https://core.telegram.org/method/bots.addPreviewMedia
     * @api
     */
    public function addPreviewMedia(AbstractInputUser|string|int $bot, string $langCode, AbstractInputMedia $media): ?BotPreviewMedia
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return $this->client->callSync(new AddPreviewMediaRequest(bot: $bot, langCode: $langCode, media: $media));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $langCode
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $media
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $newMedia
     * @return BotPreviewMedia|null
     * @see https://core.telegram.org/method/bots.editPreviewMedia
     * @api
     */
    public function editPreviewMedia(AbstractInputUser|string|int $bot, string $langCode, AbstractInputMedia $media, AbstractInputMedia $newMedia): ?BotPreviewMedia
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return $this->client->callSync(new EditPreviewMediaRequest(bot: $bot, langCode: $langCode, media: $media, newMedia: $newMedia));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $langCode
     * @param list<InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo> $media
     * @return bool
     * @see https://core.telegram.org/method/bots.deletePreviewMedia
     * @api
     */
    public function deletePreviewMedia(AbstractInputUser|string|int $bot, string $langCode, array $media): bool
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return (bool) $this->client->callSync(new DeletePreviewMediaRequest(bot: $bot, langCode: $langCode, media: $media));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $langCode
     * @param list<InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo> $order
     * @return bool
     * @see https://core.telegram.org/method/bots.reorderPreviewMedias
     * @api
     */
    public function reorderPreviewMedias(AbstractInputUser|string|int $bot, string $langCode, array $order): bool
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return (bool) $this->client->callSync(new ReorderPreviewMediasRequest(bot: $bot, langCode: $langCode, order: $order));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $langCode
     * @return PreviewInfo|null
     * @see https://core.telegram.org/method/bots.getPreviewInfo
     * @api
     */
    public function getPreviewInfo(AbstractInputUser|string|int $bot, string $langCode): ?PreviewInfo
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return $this->client->callSync(new GetPreviewInfoRequest(bot: $bot, langCode: $langCode));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @return list<BotPreviewMedia>
     * @see https://core.telegram.org/method/bots.getPreviewMedias
     * @api
     */
    public function getPreviewMedias(AbstractInputUser|string|int $bot): array
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return $this->client->callSync(new GetPreviewMediasRequest(bot: $bot));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param EmojiStatusEmpty|EmojiStatus|EmojiStatusCollectible|InputEmojiStatusCollectible $emojiStatus
     * @return bool
     * @see https://core.telegram.org/method/bots.updateUserEmojiStatus
     * @api
     */
    public function updateUserEmojiStatus(AbstractInputUser|string|int $userId, AbstractEmojiStatus $emojiStatus): bool
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return (bool) $this->client->callSync(new UpdateUserEmojiStatusRequest(userId: $userId, emojiStatus: $emojiStatus));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param bool $enabled
     * @return bool
     * @see https://core.telegram.org/method/bots.toggleUserEmojiStatusPermission
     * @api
     */
    public function toggleUserEmojiStatusPermission(AbstractInputUser|string|int $bot, bool $enabled): bool
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return (bool) $this->client->callSync(new ToggleUserEmojiStatusPermissionRequest(bot: $bot, enabled: $enabled));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $fileName
     * @param string $url
     * @return bool
     * @see https://core.telegram.org/method/bots.checkDownloadFileParams
     * @api
     */
    public function checkDownloadFileParams(AbstractInputUser|string|int $bot, string $fileName, string $url): bool
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return (bool) $this->client->callSync(new CheckDownloadFileParamsRequest(bot: $bot, fileName: $fileName, url: $url));
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
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param int $commissionPermille
     * @param int|null $durationMonths
     * @return StarRefProgram|null
     * @see https://core.telegram.org/method/bots.updateStarRefProgram
     * @api
     */
    public function updateStarRefProgram(AbstractInputUser|string|int $bot, int $commissionPermille, ?int $durationMonths = null): ?StarRefProgram
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return $this->client->callSync(new UpdateStarRefProgramRequest(bot: $bot, commissionPermille: $commissionPermille, durationMonths: $durationMonths));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $enabled
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int|null $bot
     * @param string|null $customDescription
     * @return bool
     * @see https://core.telegram.org/method/bots.setCustomVerification
     * @api
     */
    public function setCustomVerification(AbstractInputPeer|string|int $peer, ?bool $enabled = null, AbstractInputUser|string|int|null $bot = null, ?string $customDescription = null): bool
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return (bool) $this->client->callSync(new SetCustomVerificationRequest(peer: $peer, enabled: $enabled, bot: $bot, customDescription: $customDescription));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @return Users|UsersSlice|null
     * @see https://core.telegram.org/method/bots.getBotRecommendations
     * @api
     */
    public function getBotRecommendations(AbstractInputUser|string|int $bot): ?AbstractUsers
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return $this->client->callSync(new GetBotRecommendationsRequest(bot: $bot));
    }
}