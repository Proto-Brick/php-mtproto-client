<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Api;

use Amp\Future;
use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\AcceptEncryptionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\AcceptUrlAuthRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\AddChatUserRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\AppendTodoListRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\CheckChatInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\CheckHistoryImportPeerRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\CheckHistoryImportRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\CheckQuickReplyShortcutRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ClearAllDraftsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ClearRecentReactionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ClearRecentStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ClickSponsoredMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\CreateChatRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\CreateForumTopicRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\DeleteChatRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\DeleteChatUserRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\DeleteExportedChatInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\DeleteFactCheckRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\DeleteHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\DeleteMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\DeletePhoneCallHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\DeleteQuickReplyMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\DeleteQuickReplyShortcutRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\DeleteRevokedExportedChatInvitesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\DeleteSavedHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\DeleteScheduledMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\DeleteTopicHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\DiscardEncryptionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditChatAboutRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditChatAdminRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditChatDefaultBannedRightsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditChatPhotoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditChatTitleRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditExportedChatInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditFactCheckRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditForumTopicRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditInlineBotMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditQuickReplyShortcutRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ExportChatInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\FaveStickerRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ForwardMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetAdminsWithInvitesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetAllDraftsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetAllStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetArchivedStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetAttachMenuBotRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetAttachMenuBotsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetAttachedStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetAvailableEffectsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetAvailableReactionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetBotAppRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetBotCallbackAnswerRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetChatInviteImportersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetChatsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetCommonChatsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetCustomEmojiDocumentsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetDefaultHistoryTTLRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetDefaultTagReactionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetDhConfigRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetDialogFiltersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetDialogUnreadMarksRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetDialogsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetDiscussionMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetDocumentByHashRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetEmojiGroupsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetEmojiKeywordsDifferenceRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetEmojiKeywordsLanguagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetEmojiKeywordsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetEmojiProfilePhotoGroupsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetEmojiStatusGroupsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetEmojiStickerGroupsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetEmojiStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetEmojiURLRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetExportedChatInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetExportedChatInvitesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetExtendedMediaRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetFactCheckRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetFavedStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetFeaturedEmojiStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetFeaturedStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetForumTopicsByIDRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetForumTopicsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetFullChatRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetGameHighScoresRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetInlineBotResultsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetInlineGameHighScoresRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetMaskStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetMessageEditDataRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetMessageReactionsListRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetMessageReadParticipantsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetMessagesReactionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetMessagesViewsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetMyStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetOldFeaturedStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetOnlinesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetOutboxReadDateRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetPaidReactionPrivacyRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetPeerDialogsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetPeerSettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetPinnedDialogsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetPinnedSavedDialogsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetPollResultsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetPollVotesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetPreparedInlineMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetQuickRepliesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetQuickReplyMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetRecentLocationsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetRecentReactionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetRecentStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetRepliesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetSavedDialogsByIDRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetSavedDialogsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetSavedGifsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetSavedHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetSavedReactionTagsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetScheduledHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetScheduledMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetSearchCountersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetSearchResultsCalendarRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetSearchResultsPositionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetSplitRangesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetSponsoredMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetStickerSetRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetSuggestedDialogFiltersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetTopReactionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetUnreadMentionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetUnreadReactionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetWebPagePreviewRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\GetWebPageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\HideAllChatJoinRequestsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\HideChatJoinRequestRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\HidePeerSettingsBarRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ImportChatInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\InitHistoryImportRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\InstallStickerSetRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\MarkDialogUnreadRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\MigrateChatRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ProlongWebViewRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\RateTranscribedAudioRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReadDiscussionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReadEncryptedHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReadFeaturedStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReadHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReadMentionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReadMessageContentsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReadReactionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReadSavedHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReceivedMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReceivedQueueRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReorderPinnedDialogsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReorderPinnedForumTopicsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReorderPinnedSavedDialogsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReorderQuickRepliesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReorderStickerSetsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReportEncryptedSpamRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReportMessagesDeliveryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReportReactionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReportRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReportSpamRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ReportSponsoredMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\RequestAppWebViewRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\RequestEncryptionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\RequestMainWebViewRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\RequestSimpleWebViewRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\RequestUrlAuthRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\RequestWebViewRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SaveDefaultSendAsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SaveDraftRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SaveGifRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SavePreparedInlineMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SaveRecentStickerRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SearchCustomEmojiRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SearchEmojiStickerSetsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SearchGlobalRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SearchRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SearchSentMediaRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SearchStickerSetsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SearchStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendBotRequestedPeerRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendEncryptedFileRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendEncryptedRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendEncryptedServiceRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendInlineBotResultRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendMediaRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendMultiMediaRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendPaidReactionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendQuickReplyMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendReactionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendScheduledMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendScreenshotNotificationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendVoteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendWebViewDataRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SendWebViewResultMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SetBotCallbackAnswerRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SetBotPrecheckoutResultsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SetBotShippingResultsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SetChatAvailableReactionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SetChatThemeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SetChatWallPaperRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SetDefaultHistoryTTLRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SetDefaultReactionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SetEncryptedTypingRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SetGameScoreRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SetHistoryTTLRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SetInlineBotResultsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SetInlineGameScoreRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\SetTypingRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\StartBotRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\StartHistoryImportRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ToggleBotInAttachMenuRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ToggleDialogFilterTagsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ToggleDialogPinRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ToggleNoForwardsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\TogglePaidReactionPrivacyRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\TogglePeerTranslationsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ToggleSavedDialogPinRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ToggleStickerSetsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ToggleSuggestedPostApprovalRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ToggleTodoCompletedRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\TranscribeAudioRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\TranslateTextRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\UninstallStickerSetRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\UnpinAllMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\UpdateDialogFilterRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\UpdateDialogFiltersOrderRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\UpdatePinnedForumTopicRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\UpdatePinnedMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\UpdateSavedReactionTagRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\UploadEncryptedFileRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\UploadImportedMediaRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\UploadMediaRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\ViewSponsoredMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractAttachMenuBots;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChatInvite;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChatReactions;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDialogFilter;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDialogPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmojiList;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEncryptedChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEncryptedFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractExportedChatInvite;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputBotApp;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputBotInlineMessageID;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputBotInlineResult;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChatPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChatTheme;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDialogPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputEncryptedFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGeoPoint;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputQuickReplyShortcut;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputReplyTo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStickerSet;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStickeredMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputWallPaper;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessageEntity;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessageMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessagesFilter;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPaidReactionPrivacy;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractReaction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractReplyMarkup;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractReportResult;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractSendMessageAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStickerSetCovered;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUrlAuthResult;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AttachMenuBots;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AttachMenuBotsBot;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AttachMenuBotsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatBannedRights;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatInvite;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatInviteAlready;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatInviteExported;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatInvitePeek;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatInvitePublicJoinRequests;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatOnlines;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatReactionsAll;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatReactionsNone;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatReactionsSome;
use ProtoBrick\MTProtoClient\Generated\Types\Base\DefaultHistoryTTL;
use ProtoBrick\MTProtoClient\Generated\Types\Base\DialogFilter;
use ProtoBrick\MTProtoClient\Generated\Types\Base\DialogFilterChatlist;
use ProtoBrick\MTProtoClient\Generated\Types\Base\DialogFilterDefault;
use ProtoBrick\MTProtoClient\Generated\Types\Base\DialogFilterSuggested;
use ProtoBrick\MTProtoClient\Generated\Types\Base\DialogPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\DialogPeerFolder;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Document;
use ProtoBrick\MTProtoClient\Generated\Types\Base\DocumentEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiKeywordsDifference;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiLanguage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiList;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiListNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiURL;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EncryptedChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EncryptedChatDiscarded;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EncryptedChatEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EncryptedChatRequested;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EncryptedChatWaiting;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EncryptedFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EncryptedFileEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\FactCheck;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InlineBotSwitchPM;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InlineBotWebView;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InlineQueryPeerType;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBotAppID;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBotAppShortName;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBotInlineMessageID;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBotInlineMessageID64;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBotInlineResult;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBotInlineResultDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBotInlineResultGame;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBotInlineResultPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatPhotoEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatTheme;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatThemeEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatThemeUniqueGift;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatUploadedPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputCheckPasswordEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputDialogPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputDialogPeerFolder;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputDocumentEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEncryptedChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEncryptedFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEncryptedFileBigUploaded;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEncryptedFileEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEncryptedFileUploaded;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputFileBig;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputFileStoryDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputGeoPoint;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputGeoPointEmpty;
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
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessageCallbackQuery;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessageEntityMentionName;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessageID;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagePinned;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessageReplyTo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterChatPhotos;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterContacts;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterGeo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterGif;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterMusic;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterMyMentions;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterPhoneCalls;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterPhotoVideo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterPhotos;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterPinned;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterRoundVideo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterRoundVoice;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterUrl;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterVideo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagesFilterVoice;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputQuickReplyShortcut;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputQuickReplyShortcutId;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputReplyToMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputReplyToMonoForum;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputReplyToStory;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputSingleMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetAnimatedEmoji;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetAnimatedEmojiAnimations;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetDice;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetEmojiChannelDefaultStatuses;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetEmojiDefaultStatuses;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetEmojiDefaultTopicIcons;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetEmojiGenericAnimations;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetID;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetPremiumGifts;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetShortName;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetTonGifts;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickeredMediaDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickeredMediaPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputWallPaper;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputWallPaperNoFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputWallPaperSlug;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityBankCard;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityBlockquote;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityBold;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityBotCommand;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityCashtag;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityCode;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityCustomEmoji;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityEmail;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityHashtag;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityItalic;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityMention;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityMentionName;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityPhone;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityPre;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntitySpoiler;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityStrike;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityTextUrl;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityUnderline;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityUnknown;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityUrl;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaContact;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaDice;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaGame;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaGeo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaGeoLive;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaGiveaway;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaGiveawayResults;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaInvoice;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaPaidMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaPoll;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaStory;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaToDo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaUnsupported;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaVenue;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaVideoStream;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaWebPage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageRange;
use ProtoBrick\MTProtoClient\Generated\Types\Base\OutboxReadDate;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PaidReactionPrivacyAnonymous;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PaidReactionPrivacyDefault;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PaidReactionPrivacyPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReactionCustomEmoji;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReactionEmoji;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReactionEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReactionPaid;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReadParticipantDate;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReceivedNotifyMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReplyInlineMarkup;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReplyKeyboardForceReply;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReplyKeyboardHide;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReplyKeyboardMarkup;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReportResultAddComment;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReportResultChooseOption;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReportResultReported;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageCancelAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageChooseContactAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageChooseStickerAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageEmojiInteraction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageEmojiInteractionSeen;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageGamePlayAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageGeoLocationAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageHistoryImportAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageRecordAudioAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageRecordRoundAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageRecordVideoAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageTextDraftAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageTypingAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageUploadAudioAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageUploadDocumentAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageUploadPhotoAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageUploadRoundAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SendMessageUploadVideoAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ShippingOption;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SpeakingInGroupCallAction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarsSubscriptionPricing;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StickerSetCovered;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StickerSetFullCovered;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StickerSetMultiCovered;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StickerSetNoCovered;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SuggestedPost;
use ProtoBrick\MTProtoClient\Generated\Types\Base\TextWithEntities;
use ProtoBrick\MTProtoClient\Generated\Types\Base\TodoItem;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShort;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortChatMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortSentMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Updates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesCombined;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesTooLong;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UrlAuthResultAccepted;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UrlAuthResultDefault;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UrlAuthResultRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\WallPaperSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Base\WebViewMessageSent;
use ProtoBrick\MTProtoClient\Generated\Types\Base\WebViewResult;
use ProtoBrick\MTProtoClient\Generated\Types\Channels\AbstractSponsoredMessageReportResult;
use ProtoBrick\MTProtoClient\Generated\Types\Channels\SponsoredMessageReportResultAdsHidden;
use ProtoBrick\MTProtoClient\Generated\Types\Channels\SponsoredMessageReportResultChooseOption;
use ProtoBrick\MTProtoClient\Generated\Types\Channels\SponsoredMessageReportResultReported;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractAllStickers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractAvailableEffects;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractAvailableReactions;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractChats;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractDhConfig;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractDialogs;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractEmojiGroups;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractExportedChatInvite as MessagesAbstractExportedChatInvite;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractFavedStickers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractFeaturedStickers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractFoundStickerSets;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractFoundStickers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractMessages;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractQuickReplies;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractReactions;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractRecentStickers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractSavedDialogs;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractSavedGifs;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractSavedReactionTags;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractSentEncryptedMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractSponsoredMessages;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickerSet;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickerSetInstallResult;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AffectedFoundMessages;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AffectedHistory;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AffectedMessages;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AllStickers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AllStickersNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ArchivedStickers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AvailableEffects;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AvailableEffectsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AvailableReactions;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AvailableReactionsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\BotApp;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\BotCallbackAnswer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\BotPreparedInlineMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\BotResults;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ChannelMessages;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ChatAdminsWithInvites;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ChatFull;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ChatInviteImporters;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\Chats;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ChatsSlice;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\CheckedHistoryImportPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\DhConfig;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\DhConfigNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\DialogFilters;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\Dialogs;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\DialogsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\DialogsSlice;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\DiscussionMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\EmojiGroups;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\EmojiGroupsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ExportedChatInvite;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ExportedChatInviteReplaced;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ExportedChatInvites;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\FavedStickers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\FavedStickersNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\FeaturedStickers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\FeaturedStickersNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ForumTopics;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\FoundStickerSets;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\FoundStickerSetsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\FoundStickers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\FoundStickersNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\HighScores;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\HistoryImport;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\HistoryImportParsed;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\InvitedUsers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\MessageEditData;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\MessageReactionsList;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\MessageViews;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\Messages;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\MessagesNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\MessagesSlice;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\MyStickers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\PeerDialogs;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\PeerSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\PreparedInlineMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\QuickReplies;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\QuickRepliesNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\Reactions;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ReactionsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\RecentStickers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\RecentStickersNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SavedDialogs;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SavedDialogsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SavedDialogsSlice;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SavedGifs;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SavedGifsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SavedReactionTags;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SavedReactionTagsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SearchCounter;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SearchResultsCalendar;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SearchResultsPositions;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SentEncryptedFile;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SentEncryptedMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SponsoredMessages;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SponsoredMessagesEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\StickerSet;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\StickerSetInstallResultArchive;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\StickerSetInstallResultSuccess;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\StickerSetNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\Stickers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\StickersNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\TranscribedAudio;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\TranslatedText;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\VotesList;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\WebPage;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\WebPagePreview;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "messages" group.
 */
final readonly class MessagesMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param list<InputMessageID|InputMessageReplyTo|InputMessagePinned|InputMessageCallbackQuery> $id
     * @return Future<Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null>
     * @see https://core.telegram.org/method/messages.getMessages
     * @api
     */
    public function getMessagesAsync(array $id): Future
    {
        return $this->client->call(new GetMessagesRequest(id: $id));
    }

    /**
     * @param list<InputMessageID|InputMessageReplyTo|InputMessagePinned|InputMessageCallbackQuery> $id
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getMessages
     * @api
     */
    public function getMessages(array $id): ?AbstractMessages
    {
        return $this->getMessagesAsync(id: $id)->await();
    }

    /**
     * @param int $offsetDate
     * @param int $offsetId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $offsetPeer
     * @param int $limit
     * @param int $hash
     * @param bool|null $excludePinned
     * @param int|null $folderId
     * @return Future<Dialogs|DialogsSlice|DialogsNotModified|null>
     * @see https://core.telegram.org/method/messages.getDialogs
     * @api
     */
    public function getDialogsAsync(int $offsetDate, int $offsetId, AbstractInputPeer|string|int $offsetPeer, int $limit, int $hash, ?bool $excludePinned = null, ?int $folderId = null): Future
    {
        if (is_string($offsetPeer) || is_int($offsetPeer)) {
            $offsetPeer = $this->client->peerManager->resolve($offsetPeer);
        }
        return $this->client->call(new GetDialogsRequest(offsetDate: $offsetDate, offsetId: $offsetId, offsetPeer: $offsetPeer, limit: $limit, hash: $hash, excludePinned: $excludePinned, folderId: $folderId));
    }

    /**
     * @param int $offsetDate
     * @param int $offsetId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $offsetPeer
     * @param int $limit
     * @param int $hash
     * @param bool|null $excludePinned
     * @param int|null $folderId
     * @return Dialogs|DialogsSlice|DialogsNotModified|null
     * @see https://core.telegram.org/method/messages.getDialogs
     * @api
     */
    public function getDialogs(int $offsetDate, int $offsetId, AbstractInputPeer|string|int $offsetPeer, int $limit, int $hash, ?bool $excludePinned = null, ?int $folderId = null): ?AbstractDialogs
    {
        return $this->getDialogsAsync(offsetDate: $offsetDate, offsetId: $offsetId, offsetPeer: $offsetPeer, limit: $limit, hash: $hash, excludePinned: $excludePinned, folderId: $folderId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $offsetId
     * @param int $offsetDate
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int $hash
     * @return Future<Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null>
     * @see https://core.telegram.org/method/messages.getHistory
     * @api
     */
    public function getHistoryAsync(AbstractInputPeer|string|int $peer, int $offsetId, int $offsetDate, int $addOffset, int $limit, int $maxId, int $minId, int $hash): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetHistoryRequest(peer: $peer, offsetId: $offsetId, offsetDate: $offsetDate, addOffset: $addOffset, limit: $limit, maxId: $maxId, minId: $minId, hash: $hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $offsetId
     * @param int $offsetDate
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int $hash
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getHistory
     * @api
     */
    public function getHistory(AbstractInputPeer|string|int $peer, int $offsetId, int $offsetDate, int $addOffset, int $limit, int $maxId, int $minId, int $hash): ?AbstractMessages
    {
        return $this->getHistoryAsync(peer: $peer, offsetId: $offsetId, offsetDate: $offsetDate, addOffset: $addOffset, limit: $limit, maxId: $maxId, minId: $minId, hash: $hash)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $q
     * @param InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned $filter
     * @param int $minDate
     * @param int $maxDate
     * @param int $offsetId
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int $hash
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $fromId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $savedPeerId
     * @param list<ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid>|null $savedReaction
     * @param int|null $topMsgId
     * @return Future<Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null>
     * @see https://core.telegram.org/method/messages.search
     * @api
     */
    public function searchAsync(AbstractInputPeer|string|int $peer, string $q, AbstractMessagesFilter $filter, int $minDate, int $maxDate, int $offsetId, int $addOffset, int $limit, int $maxId, int $minId, int $hash, AbstractInputPeer|string|int|null $fromId = null, AbstractInputPeer|string|int|null $savedPeerId = null, ?array $savedReaction = null, ?int $topMsgId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($fromId) || is_int($fromId)) {
            $fromId = $this->client->peerManager->resolve($fromId);
        }
        if (is_string($savedPeerId) || is_int($savedPeerId)) {
            $savedPeerId = $this->client->peerManager->resolve($savedPeerId);
        }
        return $this->client->call(new SearchRequest(peer: $peer, q: $q, filter: $filter, minDate: $minDate, maxDate: $maxDate, offsetId: $offsetId, addOffset: $addOffset, limit: $limit, maxId: $maxId, minId: $minId, hash: $hash, fromId: $fromId, savedPeerId: $savedPeerId, savedReaction: $savedReaction, topMsgId: $topMsgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $q
     * @param InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned $filter
     * @param int $minDate
     * @param int $maxDate
     * @param int $offsetId
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int $hash
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $fromId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $savedPeerId
     * @param list<ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid>|null $savedReaction
     * @param int|null $topMsgId
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.search
     * @api
     */
    public function search(AbstractInputPeer|string|int $peer, string $q, AbstractMessagesFilter $filter, int $minDate, int $maxDate, int $offsetId, int $addOffset, int $limit, int $maxId, int $minId, int $hash, AbstractInputPeer|string|int|null $fromId = null, AbstractInputPeer|string|int|null $savedPeerId = null, ?array $savedReaction = null, ?int $topMsgId = null): ?AbstractMessages
    {
        return $this->searchAsync(peer: $peer, q: $q, filter: $filter, minDate: $minDate, maxDate: $maxDate, offsetId: $offsetId, addOffset: $addOffset, limit: $limit, maxId: $maxId, minId: $minId, hash: $hash, fromId: $fromId, savedPeerId: $savedPeerId, savedReaction: $savedReaction, topMsgId: $topMsgId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $maxId
     * @return Future<AffectedMessages|null>
     * @see https://core.telegram.org/method/messages.readHistory
     * @api
     */
    public function readHistoryAsync(AbstractInputPeer|string|int $peer, int $maxId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ReadHistoryRequest(peer: $peer, maxId: $maxId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $maxId
     * @return AffectedMessages|null
     * @see https://core.telegram.org/method/messages.readHistory
     * @api
     */
    public function readHistory(AbstractInputPeer|string|int $peer, int $maxId): ?AffectedMessages
    {
        return $this->readHistoryAsync(peer: $peer, maxId: $maxId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $maxId
     * @param bool|null $justClear
     * @param bool|null $revoke
     * @param int|null $minDate
     * @param int|null $maxDate
     * @return Future<AffectedHistory|null>
     * @see https://core.telegram.org/method/messages.deleteHistory
     * @api
     */
    public function deleteHistoryAsync(AbstractInputPeer|string|int $peer, int $maxId, ?bool $justClear = null, ?bool $revoke = null, ?int $minDate = null, ?int $maxDate = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new DeleteHistoryRequest(peer: $peer, maxId: $maxId, justClear: $justClear, revoke: $revoke, minDate: $minDate, maxDate: $maxDate));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $maxId
     * @param bool|null $justClear
     * @param bool|null $revoke
     * @param int|null $minDate
     * @param int|null $maxDate
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/messages.deleteHistory
     * @api
     */
    public function deleteHistory(AbstractInputPeer|string|int $peer, int $maxId, ?bool $justClear = null, ?bool $revoke = null, ?int $minDate = null, ?int $maxDate = null): ?AffectedHistory
    {
        return $this->deleteHistoryAsync(peer: $peer, maxId: $maxId, justClear: $justClear, revoke: $revoke, minDate: $minDate, maxDate: $maxDate)->await();
    }

    /**
     * @param list<int> $id
     * @param bool|null $revoke
     * @return Future<AffectedMessages|null>
     * @see https://core.telegram.org/method/messages.deleteMessages
     * @api
     */
    public function deleteMessagesAsync(array $id, ?bool $revoke = null): Future
    {
        return $this->client->call(new DeleteMessagesRequest(id: $id, revoke: $revoke));
    }

    /**
     * @param list<int> $id
     * @param bool|null $revoke
     * @return AffectedMessages|null
     * @see https://core.telegram.org/method/messages.deleteMessages
     * @api
     */
    public function deleteMessages(array $id, ?bool $revoke = null): ?AffectedMessages
    {
        return $this->deleteMessagesAsync(id: $id, revoke: $revoke)->await();
    }

    /**
     * @param int $maxId
     * @return Future<list<ReceivedNotifyMessage>>
     * @see https://core.telegram.org/method/messages.receivedMessages
     * @api
     */
    public function receivedMessagesAsync(int $maxId): Future
    {
        return $this->client->call(new ReceivedMessagesRequest(maxId: $maxId));
    }

    /**
     * @param int $maxId
     * @return list<ReceivedNotifyMessage>
     * @see https://core.telegram.org/method/messages.receivedMessages
     * @api
     */
    public function receivedMessages(int $maxId): array
    {
        return $this->receivedMessagesAsync(maxId: $maxId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param SendMessageTypingAction|SendMessageCancelAction|SendMessageRecordVideoAction|SendMessageUploadVideoAction|SendMessageRecordAudioAction|SendMessageUploadAudioAction|SendMessageUploadPhotoAction|SendMessageUploadDocumentAction|SendMessageGeoLocationAction|SendMessageChooseContactAction|SendMessageGamePlayAction|SendMessageRecordRoundAction|SendMessageUploadRoundAction|SpeakingInGroupCallAction|SendMessageHistoryImportAction|SendMessageChooseStickerAction|SendMessageEmojiInteraction|SendMessageEmojiInteractionSeen|SendMessageTextDraftAction $action
     * @param int|null $topMsgId
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.setTyping
     * @api
     */
    public function setTypingAsync(AbstractInputPeer|string|int $peer, AbstractSendMessageAction $action, ?int $topMsgId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new SetTypingRequest(peer: $peer, action: $action, topMsgId: $topMsgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param SendMessageTypingAction|SendMessageCancelAction|SendMessageRecordVideoAction|SendMessageUploadVideoAction|SendMessageRecordAudioAction|SendMessageUploadAudioAction|SendMessageUploadPhotoAction|SendMessageUploadDocumentAction|SendMessageGeoLocationAction|SendMessageChooseContactAction|SendMessageGamePlayAction|SendMessageRecordRoundAction|SendMessageUploadRoundAction|SpeakingInGroupCallAction|SendMessageHistoryImportAction|SendMessageChooseStickerAction|SendMessageEmojiInteraction|SendMessageEmojiInteractionSeen|SendMessageTextDraftAction $action
     * @param int|null $topMsgId
     * @return bool
     * @see https://core.telegram.org/method/messages.setTyping
     * @api
     */
    public function setTyping(AbstractInputPeer|string|int $peer, AbstractSendMessageAction $action, ?int $topMsgId = null): bool
    {
        return (bool) $this->setTypingAsync(peer: $peer, action: $action, topMsgId: $topMsgId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $message
     * @param bool|null $noWebpage
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $clearDraft
     * @param bool|null $noforwards
     * @param bool|null $updateStickersetsOrder
     * @param bool|null $invertMedia
     * @param bool|null $allowPaidFloodskip
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param int|null $randomId
     * @param ReplyKeyboardHide|ReplyKeyboardForceReply|ReplyKeyboardMarkup|ReplyInlineMarkup|null $replyMarkup
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param int|null $scheduleDate
     * @param int|null $scheduleRepeatPeriod
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $effect
     * @param int|null $allowPaidStars
     * @param SuggestedPost|null $suggestedPost
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.sendMessage
     * @api
     */
    public function sendMessageAsync(AbstractInputPeer|string|int $peer, string $message, ?bool $noWebpage = null, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $noforwards = null, ?bool $updateStickersetsOrder = null, ?bool $invertMedia = null, ?bool $allowPaidFloodskip = null, ?AbstractInputReplyTo $replyTo = null, ?int $randomId = null, ?AbstractReplyMarkup $replyMarkup = null, ?array $entities = null, ?int $scheduleDate = null, ?int $scheduleRepeatPeriod = null, AbstractInputPeer|string|int|null $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $effect = null, ?int $allowPaidStars = null, ?SuggestedPost $suggestedPost = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($sendAs) || is_int($sendAs)) {
            $sendAs = $this->client->peerManager->resolve($sendAs);
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new SendMessageRequest(peer: $peer, message: $message, noWebpage: $noWebpage, silent: $silent, background: $background, clearDraft: $clearDraft, noforwards: $noforwards, updateStickersetsOrder: $updateStickersetsOrder, invertMedia: $invertMedia, allowPaidFloodskip: $allowPaidFloodskip, replyTo: $replyTo, randomId: $randomId, replyMarkup: $replyMarkup, entities: $entities, scheduleDate: $scheduleDate, scheduleRepeatPeriod: $scheduleRepeatPeriod, sendAs: $sendAs, quickReplyShortcut: $quickReplyShortcut, effect: $effect, allowPaidStars: $allowPaidStars, suggestedPost: $suggestedPost));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $message
     * @param bool|null $noWebpage
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $clearDraft
     * @param bool|null $noforwards
     * @param bool|null $updateStickersetsOrder
     * @param bool|null $invertMedia
     * @param bool|null $allowPaidFloodskip
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param int|null $randomId
     * @param ReplyKeyboardHide|ReplyKeyboardForceReply|ReplyKeyboardMarkup|ReplyInlineMarkup|null $replyMarkup
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param int|null $scheduleDate
     * @param int|null $scheduleRepeatPeriod
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $effect
     * @param int|null $allowPaidStars
     * @param SuggestedPost|null $suggestedPost
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendMessage
     * @api
     */
    public function sendMessage(AbstractInputPeer|string|int $peer, string $message, ?bool $noWebpage = null, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $noforwards = null, ?bool $updateStickersetsOrder = null, ?bool $invertMedia = null, ?bool $allowPaidFloodskip = null, ?AbstractInputReplyTo $replyTo = null, ?int $randomId = null, ?AbstractReplyMarkup $replyMarkup = null, ?array $entities = null, ?int $scheduleDate = null, ?int $scheduleRepeatPeriod = null, AbstractInputPeer|string|int|null $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $effect = null, ?int $allowPaidStars = null, ?SuggestedPost $suggestedPost = null): ?AbstractUpdates
    {
        return $this->sendMessageAsync(peer: $peer, message: $message, noWebpage: $noWebpage, silent: $silent, background: $background, clearDraft: $clearDraft, noforwards: $noforwards, updateStickersetsOrder: $updateStickersetsOrder, invertMedia: $invertMedia, allowPaidFloodskip: $allowPaidFloodskip, replyTo: $replyTo, randomId: $randomId, replyMarkup: $replyMarkup, entities: $entities, scheduleDate: $scheduleDate, scheduleRepeatPeriod: $scheduleRepeatPeriod, sendAs: $sendAs, quickReplyShortcut: $quickReplyShortcut, effect: $effect, allowPaidStars: $allowPaidStars, suggestedPost: $suggestedPost)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $media
     * @param string $message
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $clearDraft
     * @param bool|null $noforwards
     * @param bool|null $updateStickersetsOrder
     * @param bool|null $invertMedia
     * @param bool|null $allowPaidFloodskip
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param int|null $randomId
     * @param ReplyKeyboardHide|ReplyKeyboardForceReply|ReplyKeyboardMarkup|ReplyInlineMarkup|null $replyMarkup
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param int|null $scheduleDate
     * @param int|null $scheduleRepeatPeriod
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $effect
     * @param int|null $allowPaidStars
     * @param SuggestedPost|null $suggestedPost
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.sendMedia
     * @api
     */
    public function sendMediaAsync(AbstractInputPeer|string|int $peer, AbstractInputMedia $media, string $message, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $noforwards = null, ?bool $updateStickersetsOrder = null, ?bool $invertMedia = null, ?bool $allowPaidFloodskip = null, ?AbstractInputReplyTo $replyTo = null, ?int $randomId = null, ?AbstractReplyMarkup $replyMarkup = null, ?array $entities = null, ?int $scheduleDate = null, ?int $scheduleRepeatPeriod = null, AbstractInputPeer|string|int|null $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $effect = null, ?int $allowPaidStars = null, ?SuggestedPost $suggestedPost = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($sendAs) || is_int($sendAs)) {
            $sendAs = $this->client->peerManager->resolve($sendAs);
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new SendMediaRequest(peer: $peer, media: $media, message: $message, silent: $silent, background: $background, clearDraft: $clearDraft, noforwards: $noforwards, updateStickersetsOrder: $updateStickersetsOrder, invertMedia: $invertMedia, allowPaidFloodskip: $allowPaidFloodskip, replyTo: $replyTo, randomId: $randomId, replyMarkup: $replyMarkup, entities: $entities, scheduleDate: $scheduleDate, scheduleRepeatPeriod: $scheduleRepeatPeriod, sendAs: $sendAs, quickReplyShortcut: $quickReplyShortcut, effect: $effect, allowPaidStars: $allowPaidStars, suggestedPost: $suggestedPost));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $media
     * @param string $message
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $clearDraft
     * @param bool|null $noforwards
     * @param bool|null $updateStickersetsOrder
     * @param bool|null $invertMedia
     * @param bool|null $allowPaidFloodskip
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param int|null $randomId
     * @param ReplyKeyboardHide|ReplyKeyboardForceReply|ReplyKeyboardMarkup|ReplyInlineMarkup|null $replyMarkup
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param int|null $scheduleDate
     * @param int|null $scheduleRepeatPeriod
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $effect
     * @param int|null $allowPaidStars
     * @param SuggestedPost|null $suggestedPost
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendMedia
     * @api
     */
    public function sendMedia(AbstractInputPeer|string|int $peer, AbstractInputMedia $media, string $message, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $noforwards = null, ?bool $updateStickersetsOrder = null, ?bool $invertMedia = null, ?bool $allowPaidFloodskip = null, ?AbstractInputReplyTo $replyTo = null, ?int $randomId = null, ?AbstractReplyMarkup $replyMarkup = null, ?array $entities = null, ?int $scheduleDate = null, ?int $scheduleRepeatPeriod = null, AbstractInputPeer|string|int|null $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $effect = null, ?int $allowPaidStars = null, ?SuggestedPost $suggestedPost = null): ?AbstractUpdates
    {
        return $this->sendMediaAsync(peer: $peer, media: $media, message: $message, silent: $silent, background: $background, clearDraft: $clearDraft, noforwards: $noforwards, updateStickersetsOrder: $updateStickersetsOrder, invertMedia: $invertMedia, allowPaidFloodskip: $allowPaidFloodskip, replyTo: $replyTo, randomId: $randomId, replyMarkup: $replyMarkup, entities: $entities, scheduleDate: $scheduleDate, scheduleRepeatPeriod: $scheduleRepeatPeriod, sendAs: $sendAs, quickReplyShortcut: $quickReplyShortcut, effect: $effect, allowPaidStars: $allowPaidStars, suggestedPost: $suggestedPost)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $fromPeer
     * @param list<int> $id
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $toPeer
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $withMyScore
     * @param bool|null $dropAuthor
     * @param bool|null $dropMediaCaptions
     * @param bool|null $noforwards
     * @param bool|null $allowPaidFloodskip
     * @param list<int>|null $randomId
     * @param int|null $topMsgId
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param int|null $scheduleDate
     * @param int|null $scheduleRepeatPeriod
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $effect
     * @param int|null $videoTimestamp
     * @param int|null $allowPaidStars
     * @param SuggestedPost|null $suggestedPost
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.forwardMessages
     * @api
     */
    public function forwardMessagesAsync(AbstractInputPeer|string|int $fromPeer, array $id, AbstractInputPeer|string|int $toPeer, ?bool $silent = null, ?bool $background = null, ?bool $withMyScore = null, ?bool $dropAuthor = null, ?bool $dropMediaCaptions = null, ?bool $noforwards = null, ?bool $allowPaidFloodskip = null, ?array $randomId = null, ?int $topMsgId = null, ?AbstractInputReplyTo $replyTo = null, ?int $scheduleDate = null, ?int $scheduleRepeatPeriod = null, AbstractInputPeer|string|int|null $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $effect = null, ?int $videoTimestamp = null, ?int $allowPaidStars = null, ?SuggestedPost $suggestedPost = null): Future
    {
        if (is_string($fromPeer) || is_int($fromPeer)) {
            $fromPeer = $this->client->peerManager->resolve($fromPeer);
        }
        if (is_string($toPeer) || is_int($toPeer)) {
            $toPeer = $this->client->peerManager->resolve($toPeer);
        }
        if (is_string($sendAs) || is_int($sendAs)) {
            $sendAs = $this->client->peerManager->resolve($sendAs);
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new ForwardMessagesRequest(fromPeer: $fromPeer, id: $id, toPeer: $toPeer, silent: $silent, background: $background, withMyScore: $withMyScore, dropAuthor: $dropAuthor, dropMediaCaptions: $dropMediaCaptions, noforwards: $noforwards, allowPaidFloodskip: $allowPaidFloodskip, randomId: $randomId, topMsgId: $topMsgId, replyTo: $replyTo, scheduleDate: $scheduleDate, scheduleRepeatPeriod: $scheduleRepeatPeriod, sendAs: $sendAs, quickReplyShortcut: $quickReplyShortcut, effect: $effect, videoTimestamp: $videoTimestamp, allowPaidStars: $allowPaidStars, suggestedPost: $suggestedPost));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $fromPeer
     * @param list<int> $id
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $toPeer
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $withMyScore
     * @param bool|null $dropAuthor
     * @param bool|null $dropMediaCaptions
     * @param bool|null $noforwards
     * @param bool|null $allowPaidFloodskip
     * @param list<int>|null $randomId
     * @param int|null $topMsgId
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param int|null $scheduleDate
     * @param int|null $scheduleRepeatPeriod
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $effect
     * @param int|null $videoTimestamp
     * @param int|null $allowPaidStars
     * @param SuggestedPost|null $suggestedPost
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.forwardMessages
     * @api
     */
    public function forwardMessages(AbstractInputPeer|string|int $fromPeer, array $id, AbstractInputPeer|string|int $toPeer, ?bool $silent = null, ?bool $background = null, ?bool $withMyScore = null, ?bool $dropAuthor = null, ?bool $dropMediaCaptions = null, ?bool $noforwards = null, ?bool $allowPaidFloodskip = null, ?array $randomId = null, ?int $topMsgId = null, ?AbstractInputReplyTo $replyTo = null, ?int $scheduleDate = null, ?int $scheduleRepeatPeriod = null, AbstractInputPeer|string|int|null $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $effect = null, ?int $videoTimestamp = null, ?int $allowPaidStars = null, ?SuggestedPost $suggestedPost = null): ?AbstractUpdates
    {
        return $this->forwardMessagesAsync(fromPeer: $fromPeer, id: $id, toPeer: $toPeer, silent: $silent, background: $background, withMyScore: $withMyScore, dropAuthor: $dropAuthor, dropMediaCaptions: $dropMediaCaptions, noforwards: $noforwards, allowPaidFloodskip: $allowPaidFloodskip, randomId: $randomId, topMsgId: $topMsgId, replyTo: $replyTo, scheduleDate: $scheduleDate, scheduleRepeatPeriod: $scheduleRepeatPeriod, sendAs: $sendAs, quickReplyShortcut: $quickReplyShortcut, effect: $effect, videoTimestamp: $videoTimestamp, allowPaidStars: $allowPaidStars, suggestedPost: $suggestedPost)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.reportSpam
     * @api
     */
    public function reportSpamAsync(AbstractInputPeer|string|int $peer): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ReportSpamRequest(peer: $peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return bool
     * @see https://core.telegram.org/method/messages.reportSpam
     * @api
     */
    public function reportSpam(AbstractInputPeer|string|int $peer): bool
    {
        return (bool) $this->reportSpamAsync(peer: $peer)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return Future<PeerSettings|null>
     * @see https://core.telegram.org/method/messages.getPeerSettings
     * @api
     */
    public function getPeerSettingsAsync(AbstractInputPeer|string|int $peer): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetPeerSettingsRequest(peer: $peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return PeerSettings|null
     * @see https://core.telegram.org/method/messages.getPeerSettings
     * @api
     */
    public function getPeerSettings(AbstractInputPeer|string|int $peer): ?PeerSettings
    {
        return $this->getPeerSettingsAsync(peer: $peer)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @param string $option
     * @param string $message
     * @return Future<ReportResultChooseOption|ReportResultAddComment|ReportResultReported|null>
     * @see https://core.telegram.org/method/messages.report
     * @api
     */
    public function reportAsync(AbstractInputPeer|string|int $peer, array $id, string $option, string $message): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ReportRequest(peer: $peer, id: $id, option: $option, message: $message));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @param string $option
     * @param string $message
     * @return ReportResultChooseOption|ReportResultAddComment|ReportResultReported|null
     * @see https://core.telegram.org/method/messages.report
     * @api
     */
    public function report(AbstractInputPeer|string|int $peer, array $id, string $option, string $message): ?AbstractReportResult
    {
        return $this->reportAsync(peer: $peer, id: $id, option: $option, message: $message)->await();
    }

    /**
     * @param list<int> $id
     * @return Future<Chats|ChatsSlice|null>
     * @see https://core.telegram.org/method/messages.getChats
     * @api
     */
    public function getChatsAsync(array $id): Future
    {
        return $this->client->call(new GetChatsRequest(id: $id));
    }

    /**
     * @param list<int> $id
     * @return Chats|ChatsSlice|null
     * @see https://core.telegram.org/method/messages.getChats
     * @api
     */
    public function getChats(array $id): ?AbstractChats
    {
        return $this->getChatsAsync(id: $id)->await();
    }

    /**
     * @param int $chatId
     * @return Future<ChatFull|null>
     * @see https://core.telegram.org/method/messages.getFullChat
     * @api
     */
    public function getFullChatAsync(int $chatId): Future
    {
        return $this->client->call(new GetFullChatRequest(chatId: $chatId));
    }

    /**
     * @param int $chatId
     * @return ChatFull|null
     * @see https://core.telegram.org/method/messages.getFullChat
     * @api
     */
    public function getFullChat(int $chatId): ?ChatFull
    {
        return $this->getFullChatAsync(chatId: $chatId)->await();
    }

    /**
     * @param int $chatId
     * @param string $title
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.editChatTitle
     * @api
     */
    public function editChatTitleAsync(int $chatId, string $title): Future
    {
        return $this->client->call(new EditChatTitleRequest(chatId: $chatId, title: $title));
    }

    /**
     * @param int $chatId
     * @param string $title
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.editChatTitle
     * @api
     */
    public function editChatTitle(int $chatId, string $title): ?AbstractUpdates
    {
        return $this->editChatTitleAsync(chatId: $chatId, title: $title)->await();
    }

    /**
     * @param int $chatId
     * @param InputChatPhotoEmpty|InputChatUploadedPhoto|InputChatPhoto $photo
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.editChatPhoto
     * @api
     */
    public function editChatPhotoAsync(int $chatId, AbstractInputChatPhoto $photo): Future
    {
        return $this->client->call(new EditChatPhotoRequest(chatId: $chatId, photo: $photo));
    }

    /**
     * @param int $chatId
     * @param InputChatPhotoEmpty|InputChatUploadedPhoto|InputChatPhoto $photo
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.editChatPhoto
     * @api
     */
    public function editChatPhoto(int $chatId, AbstractInputChatPhoto $photo): ?AbstractUpdates
    {
        return $this->editChatPhotoAsync(chatId: $chatId, photo: $photo)->await();
    }

    /**
     * @param int $chatId
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param int $fwdLimit
     * @return Future<InvitedUsers|null>
     * @see https://core.telegram.org/method/messages.addChatUser
     * @api
     */
    public function addChatUserAsync(int $chatId, AbstractInputUser|string|int $userId, int $fwdLimit): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new AddChatUserRequest(chatId: $chatId, userId: $userId, fwdLimit: $fwdLimit));
    }

    /**
     * @param int $chatId
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param int $fwdLimit
     * @return InvitedUsers|null
     * @see https://core.telegram.org/method/messages.addChatUser
     * @api
     */
    public function addChatUser(int $chatId, AbstractInputUser|string|int $userId, int $fwdLimit): ?InvitedUsers
    {
        return $this->addChatUserAsync(chatId: $chatId, userId: $userId, fwdLimit: $fwdLimit)->await();
    }

    /**
     * @param int $chatId
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param bool|null $revokeHistory
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.deleteChatUser
     * @api
     */
    public function deleteChatUserAsync(int $chatId, AbstractInputUser|string|int $userId, ?bool $revokeHistory = null): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new DeleteChatUserRequest(chatId: $chatId, userId: $userId, revokeHistory: $revokeHistory));
    }

    /**
     * @param int $chatId
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param bool|null $revokeHistory
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.deleteChatUser
     * @api
     */
    public function deleteChatUser(int $chatId, AbstractInputUser|string|int $userId, ?bool $revokeHistory = null): ?AbstractUpdates
    {
        return $this->deleteChatUserAsync(chatId: $chatId, userId: $userId, revokeHistory: $revokeHistory)->await();
    }

    /**
     * @param list<InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage> $users
     * @param string $title
     * @param int|null $ttlPeriod
     * @return Future<InvitedUsers|null>
     * @see https://core.telegram.org/method/messages.createChat
     * @api
     */
    public function createChatAsync(array $users, string $title, ?int $ttlPeriod = null): Future
    {
        return $this->client->call(new CreateChatRequest(users: $users, title: $title, ttlPeriod: $ttlPeriod));
    }

    /**
     * @param list<InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage> $users
     * @param string $title
     * @param int|null $ttlPeriod
     * @return InvitedUsers|null
     * @see https://core.telegram.org/method/messages.createChat
     * @api
     */
    public function createChat(array $users, string $title, ?int $ttlPeriod = null): ?InvitedUsers
    {
        return $this->createChatAsync(users: $users, title: $title, ttlPeriod: $ttlPeriod)->await();
    }

    /**
     * @param int $version
     * @param int $randomLength
     * @return Future<DhConfigNotModified|DhConfig|null>
     * @see https://core.telegram.org/method/messages.getDhConfig
     * @api
     */
    public function getDhConfigAsync(int $version, int $randomLength): Future
    {
        return $this->client->call(new GetDhConfigRequest(version: $version, randomLength: $randomLength));
    }

    /**
     * @param int $version
     * @param int $randomLength
     * @return DhConfigNotModified|DhConfig|null
     * @see https://core.telegram.org/method/messages.getDhConfig
     * @api
     */
    public function getDhConfig(int $version, int $randomLength): ?AbstractDhConfig
    {
        return $this->getDhConfigAsync(version: $version, randomLength: $randomLength)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param string $gA
     * @param int|null $randomId
     * @return Future<EncryptedChatEmpty|EncryptedChatWaiting|EncryptedChatRequested|EncryptedChat|EncryptedChatDiscarded|null>
     * @see https://core.telegram.org/method/messages.requestEncryption
     * @api
     */
    public function requestEncryptionAsync(AbstractInputUser|string|int $userId, string $gA, ?int $randomId = null): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new RequestEncryptionRequest(userId: $userId, gA: $gA, randomId: $randomId));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param string $gA
     * @param int|null $randomId
     * @return EncryptedChatEmpty|EncryptedChatWaiting|EncryptedChatRequested|EncryptedChat|EncryptedChatDiscarded|null
     * @see https://core.telegram.org/method/messages.requestEncryption
     * @api
     */
    public function requestEncryption(AbstractInputUser|string|int $userId, string $gA, ?int $randomId = null): ?AbstractEncryptedChat
    {
        return $this->requestEncryptionAsync(userId: $userId, gA: $gA, randomId: $randomId)->await();
    }

    /**
     * @param InputEncryptedChat $peer
     * @param string $gB
     * @param int $keyFingerprint
     * @return Future<EncryptedChatEmpty|EncryptedChatWaiting|EncryptedChatRequested|EncryptedChat|EncryptedChatDiscarded|null>
     * @see https://core.telegram.org/method/messages.acceptEncryption
     * @api
     */
    public function acceptEncryptionAsync(InputEncryptedChat $peer, string $gB, int $keyFingerprint): Future
    {
        return $this->client->call(new AcceptEncryptionRequest(peer: $peer, gB: $gB, keyFingerprint: $keyFingerprint));
    }

    /**
     * @param InputEncryptedChat $peer
     * @param string $gB
     * @param int $keyFingerprint
     * @return EncryptedChatEmpty|EncryptedChatWaiting|EncryptedChatRequested|EncryptedChat|EncryptedChatDiscarded|null
     * @see https://core.telegram.org/method/messages.acceptEncryption
     * @api
     */
    public function acceptEncryption(InputEncryptedChat $peer, string $gB, int $keyFingerprint): ?AbstractEncryptedChat
    {
        return $this->acceptEncryptionAsync(peer: $peer, gB: $gB, keyFingerprint: $keyFingerprint)->await();
    }

    /**
     * @param int $chatId
     * @param bool|null $deleteHistory
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.discardEncryption
     * @api
     */
    public function discardEncryptionAsync(int $chatId, ?bool $deleteHistory = null): Future
    {
        return $this->client->call(new DiscardEncryptionRequest(chatId: $chatId, deleteHistory: $deleteHistory));
    }

    /**
     * @param int $chatId
     * @param bool|null $deleteHistory
     * @return bool
     * @see https://core.telegram.org/method/messages.discardEncryption
     * @api
     */
    public function discardEncryption(int $chatId, ?bool $deleteHistory = null): bool
    {
        return (bool) $this->discardEncryptionAsync(chatId: $chatId, deleteHistory: $deleteHistory)->await();
    }

    /**
     * @param InputEncryptedChat $peer
     * @param bool $typing
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.setEncryptedTyping
     * @api
     */
    public function setEncryptedTypingAsync(InputEncryptedChat $peer, bool $typing): Future
    {
        return $this->client->call(new SetEncryptedTypingRequest(peer: $peer, typing: $typing));
    }

    /**
     * @param InputEncryptedChat $peer
     * @param bool $typing
     * @return bool
     * @see https://core.telegram.org/method/messages.setEncryptedTyping
     * @api
     */
    public function setEncryptedTyping(InputEncryptedChat $peer, bool $typing): bool
    {
        return (bool) $this->setEncryptedTypingAsync(peer: $peer, typing: $typing)->await();
    }

    /**
     * @param InputEncryptedChat $peer
     * @param int $maxDate
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.readEncryptedHistory
     * @api
     */
    public function readEncryptedHistoryAsync(InputEncryptedChat $peer, int $maxDate): Future
    {
        return $this->client->call(new ReadEncryptedHistoryRequest(peer: $peer, maxDate: $maxDate));
    }

    /**
     * @param InputEncryptedChat $peer
     * @param int $maxDate
     * @return bool
     * @see https://core.telegram.org/method/messages.readEncryptedHistory
     * @api
     */
    public function readEncryptedHistory(InputEncryptedChat $peer, int $maxDate): bool
    {
        return (bool) $this->readEncryptedHistoryAsync(peer: $peer, maxDate: $maxDate)->await();
    }

    /**
     * @param InputEncryptedChat $peer
     * @param string $data
     * @param bool|null $silent
     * @param int|null $randomId
     * @return Future<SentEncryptedMessage|SentEncryptedFile|null>
     * @see https://core.telegram.org/method/messages.sendEncrypted
     * @api
     */
    public function sendEncryptedAsync(InputEncryptedChat $peer, string $data, ?bool $silent = null, ?int $randomId = null): Future
    {
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new SendEncryptedRequest(peer: $peer, data: $data, silent: $silent, randomId: $randomId));
    }

    /**
     * @param InputEncryptedChat $peer
     * @param string $data
     * @param bool|null $silent
     * @param int|null $randomId
     * @return SentEncryptedMessage|SentEncryptedFile|null
     * @see https://core.telegram.org/method/messages.sendEncrypted
     * @api
     */
    public function sendEncrypted(InputEncryptedChat $peer, string $data, ?bool $silent = null, ?int $randomId = null): ?AbstractSentEncryptedMessage
    {
        return $this->sendEncryptedAsync(peer: $peer, data: $data, silent: $silent, randomId: $randomId)->await();
    }

    /**
     * @param InputEncryptedChat $peer
     * @param string $data
     * @param InputEncryptedFileEmpty|InputEncryptedFileUploaded|InputEncryptedFile|InputEncryptedFileBigUploaded $file
     * @param bool|null $silent
     * @param int|null $randomId
     * @return Future<SentEncryptedMessage|SentEncryptedFile|null>
     * @see https://core.telegram.org/method/messages.sendEncryptedFile
     * @api
     */
    public function sendEncryptedFileAsync(InputEncryptedChat $peer, string $data, AbstractInputEncryptedFile $file, ?bool $silent = null, ?int $randomId = null): Future
    {
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new SendEncryptedFileRequest(peer: $peer, data: $data, file: $file, silent: $silent, randomId: $randomId));
    }

    /**
     * @param InputEncryptedChat $peer
     * @param string $data
     * @param InputEncryptedFileEmpty|InputEncryptedFileUploaded|InputEncryptedFile|InputEncryptedFileBigUploaded $file
     * @param bool|null $silent
     * @param int|null $randomId
     * @return SentEncryptedMessage|SentEncryptedFile|null
     * @see https://core.telegram.org/method/messages.sendEncryptedFile
     * @api
     */
    public function sendEncryptedFile(InputEncryptedChat $peer, string $data, AbstractInputEncryptedFile $file, ?bool $silent = null, ?int $randomId = null): ?AbstractSentEncryptedMessage
    {
        return $this->sendEncryptedFileAsync(peer: $peer, data: $data, file: $file, silent: $silent, randomId: $randomId)->await();
    }

    /**
     * @param InputEncryptedChat $peer
     * @param string $data
     * @param int|null $randomId
     * @return Future<SentEncryptedMessage|SentEncryptedFile|null>
     * @see https://core.telegram.org/method/messages.sendEncryptedService
     * @api
     */
    public function sendEncryptedServiceAsync(InputEncryptedChat $peer, string $data, ?int $randomId = null): Future
    {
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new SendEncryptedServiceRequest(peer: $peer, data: $data, randomId: $randomId));
    }

    /**
     * @param InputEncryptedChat $peer
     * @param string $data
     * @param int|null $randomId
     * @return SentEncryptedMessage|SentEncryptedFile|null
     * @see https://core.telegram.org/method/messages.sendEncryptedService
     * @api
     */
    public function sendEncryptedService(InputEncryptedChat $peer, string $data, ?int $randomId = null): ?AbstractSentEncryptedMessage
    {
        return $this->sendEncryptedServiceAsync(peer: $peer, data: $data, randomId: $randomId)->await();
    }

    /**
     * @param int $maxQts
     * @return Future<list<int>>
     * @see https://core.telegram.org/method/messages.receivedQueue
     * @api
     */
    public function receivedQueueAsync(int $maxQts): Future
    {
        return $this->client->call(new ReceivedQueueRequest(maxQts: $maxQts));
    }

    /**
     * @param int $maxQts
     * @return list<int>
     * @see https://core.telegram.org/method/messages.receivedQueue
     * @api
     */
    public function receivedQueue(int $maxQts): array
    {
        return $this->receivedQueueAsync(maxQts: $maxQts)->await();
    }

    /**
     * @param InputEncryptedChat $peer
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.reportEncryptedSpam
     * @api
     */
    public function reportEncryptedSpamAsync(InputEncryptedChat $peer): Future
    {
        return $this->client->call(new ReportEncryptedSpamRequest(peer: $peer));
    }

    /**
     * @param InputEncryptedChat $peer
     * @return bool
     * @see https://core.telegram.org/method/messages.reportEncryptedSpam
     * @api
     */
    public function reportEncryptedSpam(InputEncryptedChat $peer): bool
    {
        return (bool) $this->reportEncryptedSpamAsync(peer: $peer)->await();
    }

    /**
     * @param list<int> $id
     * @return Future<AffectedMessages|null>
     * @see https://core.telegram.org/method/messages.readMessageContents
     * @api
     */
    public function readMessageContentsAsync(array $id): Future
    {
        return $this->client->call(new ReadMessageContentsRequest(id: $id));
    }

    /**
     * @param list<int> $id
     * @return AffectedMessages|null
     * @see https://core.telegram.org/method/messages.readMessageContents
     * @api
     */
    public function readMessageContents(array $id): ?AffectedMessages
    {
        return $this->readMessageContentsAsync(id: $id)->await();
    }

    /**
     * @param string $emoticon
     * @param int $hash
     * @return Future<StickersNotModified|Stickers|null>
     * @see https://core.telegram.org/method/messages.getStickers
     * @api
     */
    public function getStickersAsync(string $emoticon, int $hash): Future
    {
        return $this->client->call(new GetStickersRequest(emoticon: $emoticon, hash: $hash));
    }

    /**
     * @param string $emoticon
     * @param int $hash
     * @return StickersNotModified|Stickers|null
     * @see https://core.telegram.org/method/messages.getStickers
     * @api
     */
    public function getStickers(string $emoticon, int $hash): ?AbstractStickers
    {
        return $this->getStickersAsync(emoticon: $emoticon, hash: $hash)->await();
    }

    /**
     * @param int $hash
     * @return Future<AllStickersNotModified|AllStickers|null>
     * @see https://core.telegram.org/method/messages.getAllStickers
     * @api
     */
    public function getAllStickersAsync(int $hash): Future
    {
        return $this->client->call(new GetAllStickersRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return AllStickersNotModified|AllStickers|null
     * @see https://core.telegram.org/method/messages.getAllStickers
     * @api
     */
    public function getAllStickers(int $hash): ?AbstractAllStickers
    {
        return $this->getAllStickersAsync(hash: $hash)->await();
    }

    /**
     * @param string $message
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @return Future<WebPagePreview|null>
     * @see https://core.telegram.org/method/messages.getWebPagePreview
     * @api
     */
    public function getWebPagePreviewAsync(string $message, ?array $entities = null): Future
    {
        return $this->client->call(new GetWebPagePreviewRequest(message: $message, entities: $entities));
    }

    /**
     * @param string $message
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @return WebPagePreview|null
     * @see https://core.telegram.org/method/messages.getWebPagePreview
     * @api
     */
    public function getWebPagePreview(string $message, ?array $entities = null): ?WebPagePreview
    {
        return $this->getWebPagePreviewAsync(message: $message, entities: $entities)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $legacyRevokePermanent
     * @param bool|null $requestNeeded
     * @param int|null $expireDate
     * @param int|null $usageLimit
     * @param string|null $title
     * @param StarsSubscriptionPricing|null $subscriptionPricing
     * @return Future<ChatInviteExported|ChatInvitePublicJoinRequests|null>
     * @see https://core.telegram.org/method/messages.exportChatInvite
     * @api
     */
    public function exportChatInviteAsync(AbstractInputPeer|string|int $peer, ?bool $legacyRevokePermanent = null, ?bool $requestNeeded = null, ?int $expireDate = null, ?int $usageLimit = null, ?string $title = null, ?StarsSubscriptionPricing $subscriptionPricing = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ExportChatInviteRequest(peer: $peer, legacyRevokePermanent: $legacyRevokePermanent, requestNeeded: $requestNeeded, expireDate: $expireDate, usageLimit: $usageLimit, title: $title, subscriptionPricing: $subscriptionPricing));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $legacyRevokePermanent
     * @param bool|null $requestNeeded
     * @param int|null $expireDate
     * @param int|null $usageLimit
     * @param string|null $title
     * @param StarsSubscriptionPricing|null $subscriptionPricing
     * @return ChatInviteExported|ChatInvitePublicJoinRequests|null
     * @see https://core.telegram.org/method/messages.exportChatInvite
     * @api
     */
    public function exportChatInvite(AbstractInputPeer|string|int $peer, ?bool $legacyRevokePermanent = null, ?bool $requestNeeded = null, ?int $expireDate = null, ?int $usageLimit = null, ?string $title = null, ?StarsSubscriptionPricing $subscriptionPricing = null): ?AbstractExportedChatInvite
    {
        return $this->exportChatInviteAsync(peer: $peer, legacyRevokePermanent: $legacyRevokePermanent, requestNeeded: $requestNeeded, expireDate: $expireDate, usageLimit: $usageLimit, title: $title, subscriptionPricing: $subscriptionPricing)->await();
    }

    /**
     * @param string $hash
     * @return Future<ChatInviteAlready|ChatInvite|ChatInvitePeek|null>
     * @see https://core.telegram.org/method/messages.checkChatInvite
     * @api
     */
    public function checkChatInviteAsync(string $hash): Future
    {
        return $this->client->call(new CheckChatInviteRequest(hash: $hash));
    }

    /**
     * @param string $hash
     * @return ChatInviteAlready|ChatInvite|ChatInvitePeek|null
     * @see https://core.telegram.org/method/messages.checkChatInvite
     * @api
     */
    public function checkChatInvite(string $hash): ?AbstractChatInvite
    {
        return $this->checkChatInviteAsync(hash: $hash)->await();
    }

    /**
     * @param string $hash
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.importChatInvite
     * @api
     */
    public function importChatInviteAsync(string $hash): Future
    {
        return $this->client->call(new ImportChatInviteRequest(hash: $hash));
    }

    /**
     * @param string $hash
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.importChatInvite
     * @api
     */
    public function importChatInvite(string $hash): ?AbstractUpdates
    {
        return $this->importChatInviteAsync(hash: $hash)->await();
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @param int $hash
     * @return Future<StickerSet|StickerSetNotModified|null>
     * @see https://core.telegram.org/method/messages.getStickerSet
     * @api
     */
    public function getStickerSetAsync(AbstractInputStickerSet $stickerset, int $hash): Future
    {
        return $this->client->call(new GetStickerSetRequest(stickerset: $stickerset, hash: $hash));
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @param int $hash
     * @return StickerSet|StickerSetNotModified|null
     * @see https://core.telegram.org/method/messages.getStickerSet
     * @api
     */
    public function getStickerSet(AbstractInputStickerSet $stickerset, int $hash): ?AbstractStickerSet
    {
        return $this->getStickerSetAsync(stickerset: $stickerset, hash: $hash)->await();
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @param bool $archived
     * @return Future<StickerSetInstallResultSuccess|StickerSetInstallResultArchive|null>
     * @see https://core.telegram.org/method/messages.installStickerSet
     * @api
     */
    public function installStickerSetAsync(AbstractInputStickerSet $stickerset, bool $archived): Future
    {
        return $this->client->call(new InstallStickerSetRequest(stickerset: $stickerset, archived: $archived));
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @param bool $archived
     * @return StickerSetInstallResultSuccess|StickerSetInstallResultArchive|null
     * @see https://core.telegram.org/method/messages.installStickerSet
     * @api
     */
    public function installStickerSet(AbstractInputStickerSet $stickerset, bool $archived): ?AbstractStickerSetInstallResult
    {
        return $this->installStickerSetAsync(stickerset: $stickerset, archived: $archived)->await();
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.uninstallStickerSet
     * @api
     */
    public function uninstallStickerSetAsync(AbstractInputStickerSet $stickerset): Future
    {
        return $this->client->call(new UninstallStickerSetRequest(stickerset: $stickerset));
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @return bool
     * @see https://core.telegram.org/method/messages.uninstallStickerSet
     * @api
     */
    public function uninstallStickerSet(AbstractInputStickerSet $stickerset): bool
    {
        return (bool) $this->uninstallStickerSetAsync(stickerset: $stickerset)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $startParam
     * @param int|null $randomId
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.startBot
     * @api
     */
    public function startBotAsync(AbstractInputUser|string|int $bot, AbstractInputPeer|string|int $peer, string $startParam, ?int $randomId = null): Future
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
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new StartBotRequest(bot: $bot, peer: $peer, startParam: $startParam, randomId: $randomId));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $startParam
     * @param int|null $randomId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.startBot
     * @api
     */
    public function startBot(AbstractInputUser|string|int $bot, AbstractInputPeer|string|int $peer, string $startParam, ?int $randomId = null): ?AbstractUpdates
    {
        return $this->startBotAsync(bot: $bot, peer: $peer, startParam: $startParam, randomId: $randomId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @param bool $increment
     * @return Future<MessageViews|null>
     * @see https://core.telegram.org/method/messages.getMessagesViews
     * @api
     */
    public function getMessagesViewsAsync(AbstractInputPeer|string|int $peer, array $id, bool $increment): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetMessagesViewsRequest(peer: $peer, id: $id, increment: $increment));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @param bool $increment
     * @return MessageViews|null
     * @see https://core.telegram.org/method/messages.getMessagesViews
     * @api
     */
    public function getMessagesViews(AbstractInputPeer|string|int $peer, array $id, bool $increment): ?MessageViews
    {
        return $this->getMessagesViewsAsync(peer: $peer, id: $id, increment: $increment)->await();
    }

    /**
     * @param int $chatId
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param bool $isAdmin
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.editChatAdmin
     * @api
     */
    public function editChatAdminAsync(int $chatId, AbstractInputUser|string|int $userId, bool $isAdmin): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new EditChatAdminRequest(chatId: $chatId, userId: $userId, isAdmin: $isAdmin));
    }

    /**
     * @param int $chatId
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param bool $isAdmin
     * @return bool
     * @see https://core.telegram.org/method/messages.editChatAdmin
     * @api
     */
    public function editChatAdmin(int $chatId, AbstractInputUser|string|int $userId, bool $isAdmin): bool
    {
        return (bool) $this->editChatAdminAsync(chatId: $chatId, userId: $userId, isAdmin: $isAdmin)->await();
    }

    /**
     * @param int $chatId
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.migrateChat
     * @api
     */
    public function migrateChatAsync(int $chatId): Future
    {
        return $this->client->call(new MigrateChatRequest(chatId: $chatId));
    }

    /**
     * @param int $chatId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.migrateChat
     * @api
     */
    public function migrateChat(int $chatId): ?AbstractUpdates
    {
        return $this->migrateChatAsync(chatId: $chatId)->await();
    }

    /**
     * @param string $q
     * @param InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned $filter
     * @param int $minDate
     * @param int $maxDate
     * @param int $offsetRate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $offsetPeer
     * @param int $offsetId
     * @param int $limit
     * @param bool|null $broadcastsOnly
     * @param bool|null $groupsOnly
     * @param bool|null $usersOnly
     * @param int|null $folderId
     * @return Future<Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null>
     * @see https://core.telegram.org/method/messages.searchGlobal
     * @api
     */
    public function searchGlobalAsync(string $q, AbstractMessagesFilter $filter, int $minDate, int $maxDate, int $offsetRate, AbstractInputPeer|string|int $offsetPeer, int $offsetId, int $limit, ?bool $broadcastsOnly = null, ?bool $groupsOnly = null, ?bool $usersOnly = null, ?int $folderId = null): Future
    {
        if (is_string($offsetPeer) || is_int($offsetPeer)) {
            $offsetPeer = $this->client->peerManager->resolve($offsetPeer);
        }
        return $this->client->call(new SearchGlobalRequest(q: $q, filter: $filter, minDate: $minDate, maxDate: $maxDate, offsetRate: $offsetRate, offsetPeer: $offsetPeer, offsetId: $offsetId, limit: $limit, broadcastsOnly: $broadcastsOnly, groupsOnly: $groupsOnly, usersOnly: $usersOnly, folderId: $folderId));
    }

    /**
     * @param string $q
     * @param InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned $filter
     * @param int $minDate
     * @param int $maxDate
     * @param int $offsetRate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $offsetPeer
     * @param int $offsetId
     * @param int $limit
     * @param bool|null $broadcastsOnly
     * @param bool|null $groupsOnly
     * @param bool|null $usersOnly
     * @param int|null $folderId
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.searchGlobal
     * @api
     */
    public function searchGlobal(string $q, AbstractMessagesFilter $filter, int $minDate, int $maxDate, int $offsetRate, AbstractInputPeer|string|int $offsetPeer, int $offsetId, int $limit, ?bool $broadcastsOnly = null, ?bool $groupsOnly = null, ?bool $usersOnly = null, ?int $folderId = null): ?AbstractMessages
    {
        return $this->searchGlobalAsync(q: $q, filter: $filter, minDate: $minDate, maxDate: $maxDate, offsetRate: $offsetRate, offsetPeer: $offsetPeer, offsetId: $offsetId, limit: $limit, broadcastsOnly: $broadcastsOnly, groupsOnly: $groupsOnly, usersOnly: $usersOnly, folderId: $folderId)->await();
    }

    /**
     * @param list<int> $order
     * @param bool|null $masks
     * @param bool|null $emojis
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.reorderStickerSets
     * @api
     */
    public function reorderStickerSetsAsync(array $order, ?bool $masks = null, ?bool $emojis = null): Future
    {
        return $this->client->call(new ReorderStickerSetsRequest(order: $order, masks: $masks, emojis: $emojis));
    }

    /**
     * @param list<int> $order
     * @param bool|null $masks
     * @param bool|null $emojis
     * @return bool
     * @see https://core.telegram.org/method/messages.reorderStickerSets
     * @api
     */
    public function reorderStickerSets(array $order, ?bool $masks = null, ?bool $emojis = null): bool
    {
        return (bool) $this->reorderStickerSetsAsync(order: $order, masks: $masks, emojis: $emojis)->await();
    }

    /**
     * @param string $sha256
     * @param int $size
     * @param string $mimeType
     * @return Future<DocumentEmpty|Document|null>
     * @see https://core.telegram.org/method/messages.getDocumentByHash
     * @api
     */
    public function getDocumentByHashAsync(string $sha256, int $size, string $mimeType): Future
    {
        return $this->client->call(new GetDocumentByHashRequest(sha256: $sha256, size: $size, mimeType: $mimeType));
    }

    /**
     * @param string $sha256
     * @param int $size
     * @param string $mimeType
     * @return DocumentEmpty|Document|null
     * @see https://core.telegram.org/method/messages.getDocumentByHash
     * @api
     */
    public function getDocumentByHash(string $sha256, int $size, string $mimeType): ?AbstractDocument
    {
        return $this->getDocumentByHashAsync(sha256: $sha256, size: $size, mimeType: $mimeType)->await();
    }

    /**
     * @param int $hash
     * @return Future<SavedGifsNotModified|SavedGifs|null>
     * @see https://core.telegram.org/method/messages.getSavedGifs
     * @api
     */
    public function getSavedGifsAsync(int $hash): Future
    {
        return $this->client->call(new GetSavedGifsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return SavedGifsNotModified|SavedGifs|null
     * @see https://core.telegram.org/method/messages.getSavedGifs
     * @api
     */
    public function getSavedGifs(int $hash): ?AbstractSavedGifs
    {
        return $this->getSavedGifsAsync(hash: $hash)->await();
    }

    /**
     * @param InputDocumentEmpty|InputDocument $id
     * @param bool $unsave
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.saveGif
     * @api
     */
    public function saveGifAsync(AbstractInputDocument $id, bool $unsave): Future
    {
        return $this->client->call(new SaveGifRequest(id: $id, unsave: $unsave));
    }

    /**
     * @param InputDocumentEmpty|InputDocument $id
     * @param bool $unsave
     * @return bool
     * @see https://core.telegram.org/method/messages.saveGif
     * @api
     */
    public function saveGif(AbstractInputDocument $id, bool $unsave): bool
    {
        return (bool) $this->saveGifAsync(id: $id, unsave: $unsave)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $query
     * @param string $offset
     * @param InputGeoPointEmpty|InputGeoPoint|null $geoPoint
     * @return Future<BotResults|null>
     * @see https://core.telegram.org/method/messages.getInlineBotResults
     * @api
     */
    public function getInlineBotResultsAsync(AbstractInputUser|string|int $bot, AbstractInputPeer|string|int $peer, string $query, string $offset, ?AbstractInputGeoPoint $geoPoint = null): Future
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
        return $this->client->call(new GetInlineBotResultsRequest(bot: $bot, peer: $peer, query: $query, offset: $offset, geoPoint: $geoPoint));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $query
     * @param string $offset
     * @param InputGeoPointEmpty|InputGeoPoint|null $geoPoint
     * @return BotResults|null
     * @see https://core.telegram.org/method/messages.getInlineBotResults
     * @api
     */
    public function getInlineBotResults(AbstractInputUser|string|int $bot, AbstractInputPeer|string|int $peer, string $query, string $offset, ?AbstractInputGeoPoint $geoPoint = null): ?BotResults
    {
        return $this->getInlineBotResultsAsync(bot: $bot, peer: $peer, query: $query, offset: $offset, geoPoint: $geoPoint)->await();
    }

    /**
     * @param int $queryId
     * @param list<InputBotInlineResult|InputBotInlineResultPhoto|InputBotInlineResultDocument|InputBotInlineResultGame> $results
     * @param int $cacheTime
     * @param bool|null $gallery
     * @param bool|null $private
     * @param string|null $nextOffset
     * @param InlineBotSwitchPM|null $switchPm
     * @param InlineBotWebView|null $switchWebview
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.setInlineBotResults
     * @api
     */
    public function setInlineBotResultsAsync(int $queryId, array $results, int $cacheTime, ?bool $gallery = null, ?bool $private = null, ?string $nextOffset = null, ?InlineBotSwitchPM $switchPm = null, ?InlineBotWebView $switchWebview = null): Future
    {
        return $this->client->call(new SetInlineBotResultsRequest(queryId: $queryId, results: $results, cacheTime: $cacheTime, gallery: $gallery, private: $private, nextOffset: $nextOffset, switchPm: $switchPm, switchWebview: $switchWebview));
    }

    /**
     * @param int $queryId
     * @param list<InputBotInlineResult|InputBotInlineResultPhoto|InputBotInlineResultDocument|InputBotInlineResultGame> $results
     * @param int $cacheTime
     * @param bool|null $gallery
     * @param bool|null $private
     * @param string|null $nextOffset
     * @param InlineBotSwitchPM|null $switchPm
     * @param InlineBotWebView|null $switchWebview
     * @return bool
     * @see https://core.telegram.org/method/messages.setInlineBotResults
     * @api
     */
    public function setInlineBotResults(int $queryId, array $results, int $cacheTime, ?bool $gallery = null, ?bool $private = null, ?string $nextOffset = null, ?InlineBotSwitchPM $switchPm = null, ?InlineBotWebView $switchWebview = null): bool
    {
        return (bool) $this->setInlineBotResultsAsync(queryId: $queryId, results: $results, cacheTime: $cacheTime, gallery: $gallery, private: $private, nextOffset: $nextOffset, switchPm: $switchPm, switchWebview: $switchWebview)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $queryId
     * @param string $id
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $clearDraft
     * @param bool|null $hideVia
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param int|null $randomId
     * @param int|null $scheduleDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $allowPaidStars
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.sendInlineBotResult
     * @api
     */
    public function sendInlineBotResultAsync(AbstractInputPeer|string|int $peer, int $queryId, string $id, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $hideVia = null, ?AbstractInputReplyTo $replyTo = null, ?int $randomId = null, ?int $scheduleDate = null, AbstractInputPeer|string|int|null $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $allowPaidStars = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($sendAs) || is_int($sendAs)) {
            $sendAs = $this->client->peerManager->resolve($sendAs);
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new SendInlineBotResultRequest(peer: $peer, queryId: $queryId, id: $id, silent: $silent, background: $background, clearDraft: $clearDraft, hideVia: $hideVia, replyTo: $replyTo, randomId: $randomId, scheduleDate: $scheduleDate, sendAs: $sendAs, quickReplyShortcut: $quickReplyShortcut, allowPaidStars: $allowPaidStars));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $queryId
     * @param string $id
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $clearDraft
     * @param bool|null $hideVia
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param int|null $randomId
     * @param int|null $scheduleDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $allowPaidStars
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendInlineBotResult
     * @api
     */
    public function sendInlineBotResult(AbstractInputPeer|string|int $peer, int $queryId, string $id, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $hideVia = null, ?AbstractInputReplyTo $replyTo = null, ?int $randomId = null, ?int $scheduleDate = null, AbstractInputPeer|string|int|null $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $allowPaidStars = null): ?AbstractUpdates
    {
        return $this->sendInlineBotResultAsync(peer: $peer, queryId: $queryId, id: $id, silent: $silent, background: $background, clearDraft: $clearDraft, hideVia: $hideVia, replyTo: $replyTo, randomId: $randomId, scheduleDate: $scheduleDate, sendAs: $sendAs, quickReplyShortcut: $quickReplyShortcut, allowPaidStars: $allowPaidStars)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @return Future<MessageEditData|null>
     * @see https://core.telegram.org/method/messages.getMessageEditData
     * @api
     */
    public function getMessageEditDataAsync(AbstractInputPeer|string|int $peer, int $id): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetMessageEditDataRequest(peer: $peer, id: $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @return MessageEditData|null
     * @see https://core.telegram.org/method/messages.getMessageEditData
     * @api
     */
    public function getMessageEditData(AbstractInputPeer|string|int $peer, int $id): ?MessageEditData
    {
        return $this->getMessageEditDataAsync(peer: $peer, id: $id)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param bool|null $noWebpage
     * @param bool|null $invertMedia
     * @param string|null $message
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo|null $media
     * @param ReplyKeyboardHide|ReplyKeyboardForceReply|ReplyKeyboardMarkup|ReplyInlineMarkup|null $replyMarkup
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param int|null $scheduleDate
     * @param int|null $scheduleRepeatPeriod
     * @param int|null $quickReplyShortcutId
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.editMessage
     * @api
     */
    public function editMessageAsync(AbstractInputPeer|string|int $peer, int $id, ?bool $noWebpage = null, ?bool $invertMedia = null, ?string $message = null, ?AbstractInputMedia $media = null, ?AbstractReplyMarkup $replyMarkup = null, ?array $entities = null, ?int $scheduleDate = null, ?int $scheduleRepeatPeriod = null, ?int $quickReplyShortcutId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new EditMessageRequest(peer: $peer, id: $id, noWebpage: $noWebpage, invertMedia: $invertMedia, message: $message, media: $media, replyMarkup: $replyMarkup, entities: $entities, scheduleDate: $scheduleDate, scheduleRepeatPeriod: $scheduleRepeatPeriod, quickReplyShortcutId: $quickReplyShortcutId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param bool|null $noWebpage
     * @param bool|null $invertMedia
     * @param string|null $message
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo|null $media
     * @param ReplyKeyboardHide|ReplyKeyboardForceReply|ReplyKeyboardMarkup|ReplyInlineMarkup|null $replyMarkup
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param int|null $scheduleDate
     * @param int|null $scheduleRepeatPeriod
     * @param int|null $quickReplyShortcutId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.editMessage
     * @api
     */
    public function editMessage(AbstractInputPeer|string|int $peer, int $id, ?bool $noWebpage = null, ?bool $invertMedia = null, ?string $message = null, ?AbstractInputMedia $media = null, ?AbstractReplyMarkup $replyMarkup = null, ?array $entities = null, ?int $scheduleDate = null, ?int $scheduleRepeatPeriod = null, ?int $quickReplyShortcutId = null): ?AbstractUpdates
    {
        return $this->editMessageAsync(peer: $peer, id: $id, noWebpage: $noWebpage, invertMedia: $invertMedia, message: $message, media: $media, replyMarkup: $replyMarkup, entities: $entities, scheduleDate: $scheduleDate, scheduleRepeatPeriod: $scheduleRepeatPeriod, quickReplyShortcutId: $quickReplyShortcutId)->await();
    }

    /**
     * @param InputBotInlineMessageID|InputBotInlineMessageID64 $id
     * @param bool|null $noWebpage
     * @param bool|null $invertMedia
     * @param string|null $message
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo|null $media
     * @param ReplyKeyboardHide|ReplyKeyboardForceReply|ReplyKeyboardMarkup|ReplyInlineMarkup|null $replyMarkup
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.editInlineBotMessage
     * @api
     */
    public function editInlineBotMessageAsync(AbstractInputBotInlineMessageID $id, ?bool $noWebpage = null, ?bool $invertMedia = null, ?string $message = null, ?AbstractInputMedia $media = null, ?AbstractReplyMarkup $replyMarkup = null, ?array $entities = null): Future
    {
        return $this->client->call(new EditInlineBotMessageRequest(id: $id, noWebpage: $noWebpage, invertMedia: $invertMedia, message: $message, media: $media, replyMarkup: $replyMarkup, entities: $entities));
    }

    /**
     * @param InputBotInlineMessageID|InputBotInlineMessageID64 $id
     * @param bool|null $noWebpage
     * @param bool|null $invertMedia
     * @param string|null $message
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo|null $media
     * @param ReplyKeyboardHide|ReplyKeyboardForceReply|ReplyKeyboardMarkup|ReplyInlineMarkup|null $replyMarkup
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @return bool
     * @see https://core.telegram.org/method/messages.editInlineBotMessage
     * @api
     */
    public function editInlineBotMessage(AbstractInputBotInlineMessageID $id, ?bool $noWebpage = null, ?bool $invertMedia = null, ?string $message = null, ?AbstractInputMedia $media = null, ?AbstractReplyMarkup $replyMarkup = null, ?array $entities = null): bool
    {
        return (bool) $this->editInlineBotMessageAsync(id: $id, noWebpage: $noWebpage, invertMedia: $invertMedia, message: $message, media: $media, replyMarkup: $replyMarkup, entities: $entities)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param bool|null $game
     * @param string|null $data
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP|null $password
     * @return Future<BotCallbackAnswer|null>
     * @see https://core.telegram.org/method/messages.getBotCallbackAnswer
     * @api
     */
    public function getBotCallbackAnswerAsync(AbstractInputPeer|string|int $peer, int $msgId, ?bool $game = null, ?string $data = null, ?AbstractInputCheckPasswordSRP $password = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetBotCallbackAnswerRequest(peer: $peer, msgId: $msgId, game: $game, data: $data, password: $password));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param bool|null $game
     * @param string|null $data
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP|null $password
     * @return BotCallbackAnswer|null
     * @see https://core.telegram.org/method/messages.getBotCallbackAnswer
     * @api
     */
    public function getBotCallbackAnswer(AbstractInputPeer|string|int $peer, int $msgId, ?bool $game = null, ?string $data = null, ?AbstractInputCheckPasswordSRP $password = null): ?BotCallbackAnswer
    {
        return $this->getBotCallbackAnswerAsync(peer: $peer, msgId: $msgId, game: $game, data: $data, password: $password)->await();
    }

    /**
     * @param int $queryId
     * @param int $cacheTime
     * @param bool|null $alert
     * @param string|null $message
     * @param string|null $url
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.setBotCallbackAnswer
     * @api
     */
    public function setBotCallbackAnswerAsync(int $queryId, int $cacheTime, ?bool $alert = null, ?string $message = null, ?string $url = null): Future
    {
        return $this->client->call(new SetBotCallbackAnswerRequest(queryId: $queryId, cacheTime: $cacheTime, alert: $alert, message: $message, url: $url));
    }

    /**
     * @param int $queryId
     * @param int $cacheTime
     * @param bool|null $alert
     * @param string|null $message
     * @param string|null $url
     * @return bool
     * @see https://core.telegram.org/method/messages.setBotCallbackAnswer
     * @api
     */
    public function setBotCallbackAnswer(int $queryId, int $cacheTime, ?bool $alert = null, ?string $message = null, ?string $url = null): bool
    {
        return (bool) $this->setBotCallbackAnswerAsync(queryId: $queryId, cacheTime: $cacheTime, alert: $alert, message: $message, url: $url)->await();
    }

    /**
     * @param list<InputDialogPeer|InputDialogPeerFolder> $peers
     * @return Future<PeerDialogs|null>
     * @see https://core.telegram.org/method/messages.getPeerDialogs
     * @api
     */
    public function getPeerDialogsAsync(array $peers): Future
    {
        return $this->client->call(new GetPeerDialogsRequest(peers: $peers));
    }

    /**
     * @param list<InputDialogPeer|InputDialogPeerFolder> $peers
     * @return PeerDialogs|null
     * @see https://core.telegram.org/method/messages.getPeerDialogs
     * @api
     */
    public function getPeerDialogs(array $peers): ?PeerDialogs
    {
        return $this->getPeerDialogsAsync(peers: $peers)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $message
     * @param bool|null $noWebpage
     * @param bool|null $invertMedia
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo|null $media
     * @param int|null $effect
     * @param SuggestedPost|null $suggestedPost
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.saveDraft
     * @api
     */
    public function saveDraftAsync(AbstractInputPeer|string|int $peer, string $message, ?bool $noWebpage = null, ?bool $invertMedia = null, ?AbstractInputReplyTo $replyTo = null, ?array $entities = null, ?AbstractInputMedia $media = null, ?int $effect = null, ?SuggestedPost $suggestedPost = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new SaveDraftRequest(peer: $peer, message: $message, noWebpage: $noWebpage, invertMedia: $invertMedia, replyTo: $replyTo, entities: $entities, media: $media, effect: $effect, suggestedPost: $suggestedPost));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $message
     * @param bool|null $noWebpage
     * @param bool|null $invertMedia
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo|null $media
     * @param int|null $effect
     * @param SuggestedPost|null $suggestedPost
     * @return bool
     * @see https://core.telegram.org/method/messages.saveDraft
     * @api
     */
    public function saveDraft(AbstractInputPeer|string|int $peer, string $message, ?bool $noWebpage = null, ?bool $invertMedia = null, ?AbstractInputReplyTo $replyTo = null, ?array $entities = null, ?AbstractInputMedia $media = null, ?int $effect = null, ?SuggestedPost $suggestedPost = null): bool
    {
        return (bool) $this->saveDraftAsync(peer: $peer, message: $message, noWebpage: $noWebpage, invertMedia: $invertMedia, replyTo: $replyTo, entities: $entities, media: $media, effect: $effect, suggestedPost: $suggestedPost)->await();
    }

    /**
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.getAllDrafts
     * @api
     */
    public function getAllDraftsAsync(): Future
    {
        return $this->client->call(new GetAllDraftsRequest());
    }

    /**
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.getAllDrafts
     * @api
     */
    public function getAllDrafts(): ?AbstractUpdates
    {
        return $this->getAllDraftsAsync()->await();
    }

    /**
     * @param int $hash
     * @return Future<FeaturedStickersNotModified|FeaturedStickers|null>
     * @see https://core.telegram.org/method/messages.getFeaturedStickers
     * @api
     */
    public function getFeaturedStickersAsync(int $hash): Future
    {
        return $this->client->call(new GetFeaturedStickersRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return FeaturedStickersNotModified|FeaturedStickers|null
     * @see https://core.telegram.org/method/messages.getFeaturedStickers
     * @api
     */
    public function getFeaturedStickers(int $hash): ?AbstractFeaturedStickers
    {
        return $this->getFeaturedStickersAsync(hash: $hash)->await();
    }

    /**
     * @param list<int> $id
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.readFeaturedStickers
     * @api
     */
    public function readFeaturedStickersAsync(array $id): Future
    {
        return $this->client->call(new ReadFeaturedStickersRequest(id: $id));
    }

    /**
     * @param list<int> $id
     * @return bool
     * @see https://core.telegram.org/method/messages.readFeaturedStickers
     * @api
     */
    public function readFeaturedStickers(array $id): bool
    {
        return (bool) $this->readFeaturedStickersAsync(id: $id)->await();
    }

    /**
     * @param int $hash
     * @param bool|null $attached
     * @return Future<RecentStickersNotModified|RecentStickers|null>
     * @see https://core.telegram.org/method/messages.getRecentStickers
     * @api
     */
    public function getRecentStickersAsync(int $hash, ?bool $attached = null): Future
    {
        return $this->client->call(new GetRecentStickersRequest(hash: $hash, attached: $attached));
    }

    /**
     * @param int $hash
     * @param bool|null $attached
     * @return RecentStickersNotModified|RecentStickers|null
     * @see https://core.telegram.org/method/messages.getRecentStickers
     * @api
     */
    public function getRecentStickers(int $hash, ?bool $attached = null): ?AbstractRecentStickers
    {
        return $this->getRecentStickersAsync(hash: $hash, attached: $attached)->await();
    }

    /**
     * @param InputDocumentEmpty|InputDocument $id
     * @param bool $unsave
     * @param bool|null $attached
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.saveRecentSticker
     * @api
     */
    public function saveRecentStickerAsync(AbstractInputDocument $id, bool $unsave, ?bool $attached = null): Future
    {
        return $this->client->call(new SaveRecentStickerRequest(id: $id, unsave: $unsave, attached: $attached));
    }

    /**
     * @param InputDocumentEmpty|InputDocument $id
     * @param bool $unsave
     * @param bool|null $attached
     * @return bool
     * @see https://core.telegram.org/method/messages.saveRecentSticker
     * @api
     */
    public function saveRecentSticker(AbstractInputDocument $id, bool $unsave, ?bool $attached = null): bool
    {
        return (bool) $this->saveRecentStickerAsync(id: $id, unsave: $unsave, attached: $attached)->await();
    }

    /**
     * @param bool|null $attached
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.clearRecentStickers
     * @api
     */
    public function clearRecentStickersAsync(?bool $attached = null): Future
    {
        return $this->client->call(new ClearRecentStickersRequest(attached: $attached));
    }

    /**
     * @param bool|null $attached
     * @return bool
     * @see https://core.telegram.org/method/messages.clearRecentStickers
     * @api
     */
    public function clearRecentStickers(?bool $attached = null): bool
    {
        return (bool) $this->clearRecentStickersAsync(attached: $attached)->await();
    }

    /**
     * @param int $offsetId
     * @param int $limit
     * @param bool|null $masks
     * @param bool|null $emojis
     * @return Future<ArchivedStickers|null>
     * @see https://core.telegram.org/method/messages.getArchivedStickers
     * @api
     */
    public function getArchivedStickersAsync(int $offsetId, int $limit, ?bool $masks = null, ?bool $emojis = null): Future
    {
        return $this->client->call(new GetArchivedStickersRequest(offsetId: $offsetId, limit: $limit, masks: $masks, emojis: $emojis));
    }

    /**
     * @param int $offsetId
     * @param int $limit
     * @param bool|null $masks
     * @param bool|null $emojis
     * @return ArchivedStickers|null
     * @see https://core.telegram.org/method/messages.getArchivedStickers
     * @api
     */
    public function getArchivedStickers(int $offsetId, int $limit, ?bool $masks = null, ?bool $emojis = null): ?ArchivedStickers
    {
        return $this->getArchivedStickersAsync(offsetId: $offsetId, limit: $limit, masks: $masks, emojis: $emojis)->await();
    }

    /**
     * @param int $hash
     * @return Future<AllStickersNotModified|AllStickers|null>
     * @see https://core.telegram.org/method/messages.getMaskStickers
     * @api
     */
    public function getMaskStickersAsync(int $hash): Future
    {
        return $this->client->call(new GetMaskStickersRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return AllStickersNotModified|AllStickers|null
     * @see https://core.telegram.org/method/messages.getMaskStickers
     * @api
     */
    public function getMaskStickers(int $hash): ?AbstractAllStickers
    {
        return $this->getMaskStickersAsync(hash: $hash)->await();
    }

    /**
     * @param InputStickeredMediaPhoto|InputStickeredMediaDocument $media
     * @return Future<list<StickerSetCovered|StickerSetMultiCovered|StickerSetFullCovered|StickerSetNoCovered>>
     * @see https://core.telegram.org/method/messages.getAttachedStickers
     * @api
     */
    public function getAttachedStickersAsync(AbstractInputStickeredMedia $media): Future
    {
        return $this->client->call(new GetAttachedStickersRequest(media: $media));
    }

    /**
     * @param InputStickeredMediaPhoto|InputStickeredMediaDocument $media
     * @return list<StickerSetCovered|StickerSetMultiCovered|StickerSetFullCovered|StickerSetNoCovered>
     * @see https://core.telegram.org/method/messages.getAttachedStickers
     * @api
     */
    public function getAttachedStickers(AbstractInputStickeredMedia $media): array
    {
        return $this->getAttachedStickersAsync(media: $media)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param int $score
     * @param bool|null $editMessage
     * @param bool|null $force
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.setGameScore
     * @api
     */
    public function setGameScoreAsync(AbstractInputPeer|string|int $peer, int $id, AbstractInputUser|string|int $userId, int $score, ?bool $editMessage = null, ?bool $force = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new SetGameScoreRequest(peer: $peer, id: $id, userId: $userId, score: $score, editMessage: $editMessage, force: $force));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param int $score
     * @param bool|null $editMessage
     * @param bool|null $force
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.setGameScore
     * @api
     */
    public function setGameScore(AbstractInputPeer|string|int $peer, int $id, AbstractInputUser|string|int $userId, int $score, ?bool $editMessage = null, ?bool $force = null): ?AbstractUpdates
    {
        return $this->setGameScoreAsync(peer: $peer, id: $id, userId: $userId, score: $score, editMessage: $editMessage, force: $force)->await();
    }

    /**
     * @param InputBotInlineMessageID|InputBotInlineMessageID64 $id
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param int $score
     * @param bool|null $editMessage
     * @param bool|null $force
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.setInlineGameScore
     * @api
     */
    public function setInlineGameScoreAsync(AbstractInputBotInlineMessageID $id, AbstractInputUser|string|int $userId, int $score, ?bool $editMessage = null, ?bool $force = null): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new SetInlineGameScoreRequest(id: $id, userId: $userId, score: $score, editMessage: $editMessage, force: $force));
    }

    /**
     * @param InputBotInlineMessageID|InputBotInlineMessageID64 $id
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param int $score
     * @param bool|null $editMessage
     * @param bool|null $force
     * @return bool
     * @see https://core.telegram.org/method/messages.setInlineGameScore
     * @api
     */
    public function setInlineGameScore(AbstractInputBotInlineMessageID $id, AbstractInputUser|string|int $userId, int $score, ?bool $editMessage = null, ?bool $force = null): bool
    {
        return (bool) $this->setInlineGameScoreAsync(id: $id, userId: $userId, score: $score, editMessage: $editMessage, force: $force)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @return Future<HighScores|null>
     * @see https://core.telegram.org/method/messages.getGameHighScores
     * @api
     */
    public function getGameHighScoresAsync(AbstractInputPeer|string|int $peer, int $id, AbstractInputUser|string|int $userId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new GetGameHighScoresRequest(peer: $peer, id: $id, userId: $userId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @return HighScores|null
     * @see https://core.telegram.org/method/messages.getGameHighScores
     * @api
     */
    public function getGameHighScores(AbstractInputPeer|string|int $peer, int $id, AbstractInputUser|string|int $userId): ?HighScores
    {
        return $this->getGameHighScoresAsync(peer: $peer, id: $id, userId: $userId)->await();
    }

    /**
     * @param InputBotInlineMessageID|InputBotInlineMessageID64 $id
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @return Future<HighScores|null>
     * @see https://core.telegram.org/method/messages.getInlineGameHighScores
     * @api
     */
    public function getInlineGameHighScoresAsync(AbstractInputBotInlineMessageID $id, AbstractInputUser|string|int $userId): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new GetInlineGameHighScoresRequest(id: $id, userId: $userId));
    }

    /**
     * @param InputBotInlineMessageID|InputBotInlineMessageID64 $id
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @return HighScores|null
     * @see https://core.telegram.org/method/messages.getInlineGameHighScores
     * @api
     */
    public function getInlineGameHighScores(AbstractInputBotInlineMessageID $id, AbstractInputUser|string|int $userId): ?HighScores
    {
        return $this->getInlineGameHighScoresAsync(id: $id, userId: $userId)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param int $maxId
     * @param int $limit
     * @return Future<Chats|ChatsSlice|null>
     * @see https://core.telegram.org/method/messages.getCommonChats
     * @api
     */
    public function getCommonChatsAsync(AbstractInputUser|string|int $userId, int $maxId, int $limit): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new GetCommonChatsRequest(userId: $userId, maxId: $maxId, limit: $limit));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param int $maxId
     * @param int $limit
     * @return Chats|ChatsSlice|null
     * @see https://core.telegram.org/method/messages.getCommonChats
     * @api
     */
    public function getCommonChats(AbstractInputUser|string|int $userId, int $maxId, int $limit): ?AbstractChats
    {
        return $this->getCommonChatsAsync(userId: $userId, maxId: $maxId, limit: $limit)->await();
    }

    /**
     * @param string $url
     * @param int $hash
     * @return Future<WebPage|null>
     * @see https://core.telegram.org/method/messages.getWebPage
     * @api
     */
    public function getWebPageAsync(string $url, int $hash): Future
    {
        return $this->client->call(new GetWebPageRequest(url: $url, hash: $hash));
    }

    /**
     * @param string $url
     * @param int $hash
     * @return WebPage|null
     * @see https://core.telegram.org/method/messages.getWebPage
     * @api
     */
    public function getWebPage(string $url, int $hash): ?WebPage
    {
        return $this->getWebPageAsync(url: $url, hash: $hash)->await();
    }

    /**
     * @param InputDialogPeer|InputDialogPeerFolder $peer
     * @param bool|null $pinned
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.toggleDialogPin
     * @api
     */
    public function toggleDialogPinAsync(AbstractInputDialogPeer $peer, ?bool $pinned = null): Future
    {
        return $this->client->call(new ToggleDialogPinRequest(peer: $peer, pinned: $pinned));
    }

    /**
     * @param InputDialogPeer|InputDialogPeerFolder $peer
     * @param bool|null $pinned
     * @return bool
     * @see https://core.telegram.org/method/messages.toggleDialogPin
     * @api
     */
    public function toggleDialogPin(AbstractInputDialogPeer $peer, ?bool $pinned = null): bool
    {
        return (bool) $this->toggleDialogPinAsync(peer: $peer, pinned: $pinned)->await();
    }

    /**
     * @param int $folderId
     * @param list<InputDialogPeer|InputDialogPeerFolder> $order
     * @param bool|null $force
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.reorderPinnedDialogs
     * @api
     */
    public function reorderPinnedDialogsAsync(int $folderId, array $order, ?bool $force = null): Future
    {
        return $this->client->call(new ReorderPinnedDialogsRequest(folderId: $folderId, order: $order, force: $force));
    }

    /**
     * @param int $folderId
     * @param list<InputDialogPeer|InputDialogPeerFolder> $order
     * @param bool|null $force
     * @return bool
     * @see https://core.telegram.org/method/messages.reorderPinnedDialogs
     * @api
     */
    public function reorderPinnedDialogs(int $folderId, array $order, ?bool $force = null): bool
    {
        return (bool) $this->reorderPinnedDialogsAsync(folderId: $folderId, order: $order, force: $force)->await();
    }

    /**
     * @param int $folderId
     * @return Future<PeerDialogs|null>
     * @see https://core.telegram.org/method/messages.getPinnedDialogs
     * @api
     */
    public function getPinnedDialogsAsync(int $folderId): Future
    {
        return $this->client->call(new GetPinnedDialogsRequest(folderId: $folderId));
    }

    /**
     * @param int $folderId
     * @return PeerDialogs|null
     * @see https://core.telegram.org/method/messages.getPinnedDialogs
     * @api
     */
    public function getPinnedDialogs(int $folderId): ?PeerDialogs
    {
        return $this->getPinnedDialogsAsync(folderId: $folderId)->await();
    }

    /**
     * @param int $queryId
     * @param string|null $error
     * @param list<ShippingOption>|null $shippingOptions
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.setBotShippingResults
     * @api
     */
    public function setBotShippingResultsAsync(int $queryId, ?string $error = null, ?array $shippingOptions = null): Future
    {
        return $this->client->call(new SetBotShippingResultsRequest(queryId: $queryId, error: $error, shippingOptions: $shippingOptions));
    }

    /**
     * @param int $queryId
     * @param string|null $error
     * @param list<ShippingOption>|null $shippingOptions
     * @return bool
     * @see https://core.telegram.org/method/messages.setBotShippingResults
     * @api
     */
    public function setBotShippingResults(int $queryId, ?string $error = null, ?array $shippingOptions = null): bool
    {
        return (bool) $this->setBotShippingResultsAsync(queryId: $queryId, error: $error, shippingOptions: $shippingOptions)->await();
    }

    /**
     * @param int $queryId
     * @param bool|null $success
     * @param string|null $error
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.setBotPrecheckoutResults
     * @api
     */
    public function setBotPrecheckoutResultsAsync(int $queryId, ?bool $success = null, ?string $error = null): Future
    {
        return $this->client->call(new SetBotPrecheckoutResultsRequest(queryId: $queryId, success: $success, error: $error));
    }

    /**
     * @param int $queryId
     * @param bool|null $success
     * @param string|null $error
     * @return bool
     * @see https://core.telegram.org/method/messages.setBotPrecheckoutResults
     * @api
     */
    public function setBotPrecheckoutResults(int $queryId, ?bool $success = null, ?string $error = null): bool
    {
        return (bool) $this->setBotPrecheckoutResultsAsync(queryId: $queryId, success: $success, error: $error)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $media
     * @param string|null $businessConnectionId
     * @return Future<MessageMediaEmpty|MessageMediaPhoto|MessageMediaGeo|MessageMediaContact|MessageMediaUnsupported|MessageMediaDocument|MessageMediaWebPage|MessageMediaVenue|MessageMediaGame|MessageMediaInvoice|MessageMediaGeoLive|MessageMediaPoll|MessageMediaDice|MessageMediaStory|MessageMediaGiveaway|MessageMediaGiveawayResults|MessageMediaPaidMedia|MessageMediaToDo|MessageMediaVideoStream|null>
     * @see https://core.telegram.org/method/messages.uploadMedia
     * @api
     */
    public function uploadMediaAsync(AbstractInputPeer|string|int $peer, AbstractInputMedia $media, ?string $businessConnectionId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new UploadMediaRequest(peer: $peer, media: $media, businessConnectionId: $businessConnectionId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $media
     * @param string|null $businessConnectionId
     * @return MessageMediaEmpty|MessageMediaPhoto|MessageMediaGeo|MessageMediaContact|MessageMediaUnsupported|MessageMediaDocument|MessageMediaWebPage|MessageMediaVenue|MessageMediaGame|MessageMediaInvoice|MessageMediaGeoLive|MessageMediaPoll|MessageMediaDice|MessageMediaStory|MessageMediaGiveaway|MessageMediaGiveawayResults|MessageMediaPaidMedia|MessageMediaToDo|MessageMediaVideoStream|null
     * @see https://core.telegram.org/method/messages.uploadMedia
     * @api
     */
    public function uploadMedia(AbstractInputPeer|string|int $peer, AbstractInputMedia $media, ?string $businessConnectionId = null): ?AbstractMessageMedia
    {
        return $this->uploadMediaAsync(peer: $peer, media: $media, businessConnectionId: $businessConnectionId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum $replyTo
     * @param int|null $randomId
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.sendScreenshotNotification
     * @api
     */
    public function sendScreenshotNotificationAsync(AbstractInputPeer|string|int $peer, AbstractInputReplyTo $replyTo, ?int $randomId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new SendScreenshotNotificationRequest(peer: $peer, replyTo: $replyTo, randomId: $randomId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum $replyTo
     * @param int|null $randomId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendScreenshotNotification
     * @api
     */
    public function sendScreenshotNotification(AbstractInputPeer|string|int $peer, AbstractInputReplyTo $replyTo, ?int $randomId = null): ?AbstractUpdates
    {
        return $this->sendScreenshotNotificationAsync(peer: $peer, replyTo: $replyTo, randomId: $randomId)->await();
    }

    /**
     * @param int $hash
     * @return Future<FavedStickersNotModified|FavedStickers|null>
     * @see https://core.telegram.org/method/messages.getFavedStickers
     * @api
     */
    public function getFavedStickersAsync(int $hash): Future
    {
        return $this->client->call(new GetFavedStickersRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return FavedStickersNotModified|FavedStickers|null
     * @see https://core.telegram.org/method/messages.getFavedStickers
     * @api
     */
    public function getFavedStickers(int $hash): ?AbstractFavedStickers
    {
        return $this->getFavedStickersAsync(hash: $hash)->await();
    }

    /**
     * @param InputDocumentEmpty|InputDocument $id
     * @param bool $unfave
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.faveSticker
     * @api
     */
    public function faveStickerAsync(AbstractInputDocument $id, bool $unfave): Future
    {
        return $this->client->call(new FaveStickerRequest(id: $id, unfave: $unfave));
    }

    /**
     * @param InputDocumentEmpty|InputDocument $id
     * @param bool $unfave
     * @return bool
     * @see https://core.telegram.org/method/messages.faveSticker
     * @api
     */
    public function faveSticker(AbstractInputDocument $id, bool $unfave): bool
    {
        return (bool) $this->faveStickerAsync(id: $id, unfave: $unfave)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $offsetId
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int|null $topMsgId
     * @return Future<Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null>
     * @see https://core.telegram.org/method/messages.getUnreadMentions
     * @api
     */
    public function getUnreadMentionsAsync(AbstractInputPeer|string|int $peer, int $offsetId, int $addOffset, int $limit, int $maxId, int $minId, ?int $topMsgId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetUnreadMentionsRequest(peer: $peer, offsetId: $offsetId, addOffset: $addOffset, limit: $limit, maxId: $maxId, minId: $minId, topMsgId: $topMsgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $offsetId
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int|null $topMsgId
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getUnreadMentions
     * @api
     */
    public function getUnreadMentions(AbstractInputPeer|string|int $peer, int $offsetId, int $addOffset, int $limit, int $maxId, int $minId, ?int $topMsgId = null): ?AbstractMessages
    {
        return $this->getUnreadMentionsAsync(peer: $peer, offsetId: $offsetId, addOffset: $addOffset, limit: $limit, maxId: $maxId, minId: $minId, topMsgId: $topMsgId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int|null $topMsgId
     * @return Future<AffectedHistory|null>
     * @see https://core.telegram.org/method/messages.readMentions
     * @api
     */
    public function readMentionsAsync(AbstractInputPeer|string|int $peer, ?int $topMsgId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ReadMentionsRequest(peer: $peer, topMsgId: $topMsgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int|null $topMsgId
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/messages.readMentions
     * @api
     */
    public function readMentions(AbstractInputPeer|string|int $peer, ?int $topMsgId = null): ?AffectedHistory
    {
        return $this->readMentionsAsync(peer: $peer, topMsgId: $topMsgId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $limit
     * @param int $hash
     * @return Future<Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null>
     * @see https://core.telegram.org/method/messages.getRecentLocations
     * @api
     */
    public function getRecentLocationsAsync(AbstractInputPeer|string|int $peer, int $limit, int $hash): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetRecentLocationsRequest(peer: $peer, limit: $limit, hash: $hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $limit
     * @param int $hash
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getRecentLocations
     * @api
     */
    public function getRecentLocations(AbstractInputPeer|string|int $peer, int $limit, int $hash): ?AbstractMessages
    {
        return $this->getRecentLocationsAsync(peer: $peer, limit: $limit, hash: $hash)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<InputSingleMedia> $multiMedia
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $clearDraft
     * @param bool|null $noforwards
     * @param bool|null $updateStickersetsOrder
     * @param bool|null $invertMedia
     * @param bool|null $allowPaidFloodskip
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param int|null $scheduleDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $effect
     * @param int|null $allowPaidStars
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.sendMultiMedia
     * @api
     */
    public function sendMultiMediaAsync(AbstractInputPeer|string|int $peer, array $multiMedia, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $noforwards = null, ?bool $updateStickersetsOrder = null, ?bool $invertMedia = null, ?bool $allowPaidFloodskip = null, ?AbstractInputReplyTo $replyTo = null, ?int $scheduleDate = null, AbstractInputPeer|string|int|null $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $effect = null, ?int $allowPaidStars = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($sendAs) || is_int($sendAs)) {
            $sendAs = $this->client->peerManager->resolve($sendAs);
        }
        return $this->client->call(new SendMultiMediaRequest(peer: $peer, multiMedia: $multiMedia, silent: $silent, background: $background, clearDraft: $clearDraft, noforwards: $noforwards, updateStickersetsOrder: $updateStickersetsOrder, invertMedia: $invertMedia, allowPaidFloodskip: $allowPaidFloodskip, replyTo: $replyTo, scheduleDate: $scheduleDate, sendAs: $sendAs, quickReplyShortcut: $quickReplyShortcut, effect: $effect, allowPaidStars: $allowPaidStars));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<InputSingleMedia> $multiMedia
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $clearDraft
     * @param bool|null $noforwards
     * @param bool|null $updateStickersetsOrder
     * @param bool|null $invertMedia
     * @param bool|null $allowPaidFloodskip
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param int|null $scheduleDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $effect
     * @param int|null $allowPaidStars
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendMultiMedia
     * @api
     */
    public function sendMultiMedia(AbstractInputPeer|string|int $peer, array $multiMedia, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $noforwards = null, ?bool $updateStickersetsOrder = null, ?bool $invertMedia = null, ?bool $allowPaidFloodskip = null, ?AbstractInputReplyTo $replyTo = null, ?int $scheduleDate = null, AbstractInputPeer|string|int|null $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $effect = null, ?int $allowPaidStars = null): ?AbstractUpdates
    {
        return $this->sendMultiMediaAsync(peer: $peer, multiMedia: $multiMedia, silent: $silent, background: $background, clearDraft: $clearDraft, noforwards: $noforwards, updateStickersetsOrder: $updateStickersetsOrder, invertMedia: $invertMedia, allowPaidFloodskip: $allowPaidFloodskip, replyTo: $replyTo, scheduleDate: $scheduleDate, sendAs: $sendAs, quickReplyShortcut: $quickReplyShortcut, effect: $effect, allowPaidStars: $allowPaidStars)->await();
    }

    /**
     * @param InputEncryptedChat $peer
     * @param InputEncryptedFileEmpty|InputEncryptedFileUploaded|InputEncryptedFile|InputEncryptedFileBigUploaded $file
     * @return Future<EncryptedFileEmpty|EncryptedFile|null>
     * @see https://core.telegram.org/method/messages.uploadEncryptedFile
     * @api
     */
    public function uploadEncryptedFileAsync(InputEncryptedChat $peer, AbstractInputEncryptedFile $file): Future
    {
        return $this->client->call(new UploadEncryptedFileRequest(peer: $peer, file: $file));
    }

    /**
     * @param InputEncryptedChat $peer
     * @param InputEncryptedFileEmpty|InputEncryptedFileUploaded|InputEncryptedFile|InputEncryptedFileBigUploaded $file
     * @return EncryptedFileEmpty|EncryptedFile|null
     * @see https://core.telegram.org/method/messages.uploadEncryptedFile
     * @api
     */
    public function uploadEncryptedFile(InputEncryptedChat $peer, AbstractInputEncryptedFile $file): ?AbstractEncryptedFile
    {
        return $this->uploadEncryptedFileAsync(peer: $peer, file: $file)->await();
    }

    /**
     * @param string $q
     * @param int $hash
     * @param bool|null $excludeFeatured
     * @return Future<FoundStickerSetsNotModified|FoundStickerSets|null>
     * @see https://core.telegram.org/method/messages.searchStickerSets
     * @api
     */
    public function searchStickerSetsAsync(string $q, int $hash, ?bool $excludeFeatured = null): Future
    {
        return $this->client->call(new SearchStickerSetsRequest(q: $q, hash: $hash, excludeFeatured: $excludeFeatured));
    }

    /**
     * @param string $q
     * @param int $hash
     * @param bool|null $excludeFeatured
     * @return FoundStickerSetsNotModified|FoundStickerSets|null
     * @see https://core.telegram.org/method/messages.searchStickerSets
     * @api
     */
    public function searchStickerSets(string $q, int $hash, ?bool $excludeFeatured = null): ?AbstractFoundStickerSets
    {
        return $this->searchStickerSetsAsync(q: $q, hash: $hash, excludeFeatured: $excludeFeatured)->await();
    }

    /**
     * @return Future<list<MessageRange>>
     * @see https://core.telegram.org/method/messages.getSplitRanges
     * @api
     */
    public function getSplitRangesAsync(): Future
    {
        return $this->client->call(new GetSplitRangesRequest());
    }

    /**
     * @return list<MessageRange>
     * @see https://core.telegram.org/method/messages.getSplitRanges
     * @api
     */
    public function getSplitRanges(): array
    {
        return $this->getSplitRangesAsync()->await();
    }

    /**
     * @param InputDialogPeer|InputDialogPeerFolder $peer
     * @param bool|null $unread
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.markDialogUnread
     * @api
     */
    public function markDialogUnreadAsync(AbstractInputDialogPeer $peer, ?bool $unread = null, AbstractInputPeer|string|int|null $parentPeer = null): Future
    {
        if (is_string($parentPeer) || is_int($parentPeer)) {
            $parentPeer = $this->client->peerManager->resolve($parentPeer);
        }
        return $this->client->call(new MarkDialogUnreadRequest(peer: $peer, unread: $unread, parentPeer: $parentPeer));
    }

    /**
     * @param InputDialogPeer|InputDialogPeerFolder $peer
     * @param bool|null $unread
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @return bool
     * @see https://core.telegram.org/method/messages.markDialogUnread
     * @api
     */
    public function markDialogUnread(AbstractInputDialogPeer $peer, ?bool $unread = null, AbstractInputPeer|string|int|null $parentPeer = null): bool
    {
        return (bool) $this->markDialogUnreadAsync(peer: $peer, unread: $unread, parentPeer: $parentPeer)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @return Future<list<DialogPeer|DialogPeerFolder>>
     * @see https://core.telegram.org/method/messages.getDialogUnreadMarks
     * @api
     */
    public function getDialogUnreadMarksAsync(AbstractInputPeer|string|int|null $parentPeer = null): Future
    {
        if (is_string($parentPeer) || is_int($parentPeer)) {
            $parentPeer = $this->client->peerManager->resolve($parentPeer);
        }
        return $this->client->call(new GetDialogUnreadMarksRequest(parentPeer: $parentPeer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @return list<DialogPeer|DialogPeerFolder>
     * @see https://core.telegram.org/method/messages.getDialogUnreadMarks
     * @api
     */
    public function getDialogUnreadMarks(AbstractInputPeer|string|int|null $parentPeer = null): array
    {
        return $this->getDialogUnreadMarksAsync(parentPeer: $parentPeer)->await();
    }

    /**
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.clearAllDrafts
     * @api
     */
    public function clearAllDraftsAsync(): Future
    {
        return $this->client->call(new ClearAllDraftsRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/messages.clearAllDrafts
     * @api
     */
    public function clearAllDrafts(): bool
    {
        return (bool) $this->clearAllDraftsAsync()->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param bool|null $silent
     * @param bool|null $unpin
     * @param bool|null $pmOneside
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.updatePinnedMessage
     * @api
     */
    public function updatePinnedMessageAsync(AbstractInputPeer|string|int $peer, int $id, ?bool $silent = null, ?bool $unpin = null, ?bool $pmOneside = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new UpdatePinnedMessageRequest(peer: $peer, id: $id, silent: $silent, unpin: $unpin, pmOneside: $pmOneside));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param bool|null $silent
     * @param bool|null $unpin
     * @param bool|null $pmOneside
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.updatePinnedMessage
     * @api
     */
    public function updatePinnedMessage(AbstractInputPeer|string|int $peer, int $id, ?bool $silent = null, ?bool $unpin = null, ?bool $pmOneside = null): ?AbstractUpdates
    {
        return $this->updatePinnedMessageAsync(peer: $peer, id: $id, silent: $silent, unpin: $unpin, pmOneside: $pmOneside)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param list<string> $options
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.sendVote
     * @api
     */
    public function sendVoteAsync(AbstractInputPeer|string|int $peer, int $msgId, array $options): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new SendVoteRequest(peer: $peer, msgId: $msgId, options: $options));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param list<string> $options
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendVote
     * @api
     */
    public function sendVote(AbstractInputPeer|string|int $peer, int $msgId, array $options): ?AbstractUpdates
    {
        return $this->sendVoteAsync(peer: $peer, msgId: $msgId, options: $options)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.getPollResults
     * @api
     */
    public function getPollResultsAsync(AbstractInputPeer|string|int $peer, int $msgId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetPollResultsRequest(peer: $peer, msgId: $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.getPollResults
     * @api
     */
    public function getPollResults(AbstractInputPeer|string|int $peer, int $msgId): ?AbstractUpdates
    {
        return $this->getPollResultsAsync(peer: $peer, msgId: $msgId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return Future<ChatOnlines|null>
     * @see https://core.telegram.org/method/messages.getOnlines
     * @api
     */
    public function getOnlinesAsync(AbstractInputPeer|string|int $peer): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetOnlinesRequest(peer: $peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return ChatOnlines|null
     * @see https://core.telegram.org/method/messages.getOnlines
     * @api
     */
    public function getOnlines(AbstractInputPeer|string|int $peer): ?ChatOnlines
    {
        return $this->getOnlinesAsync(peer: $peer)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $about
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.editChatAbout
     * @api
     */
    public function editChatAboutAsync(AbstractInputPeer|string|int $peer, string $about): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new EditChatAboutRequest(peer: $peer, about: $about));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $about
     * @return bool
     * @see https://core.telegram.org/method/messages.editChatAbout
     * @api
     */
    public function editChatAbout(AbstractInputPeer|string|int $peer, string $about): bool
    {
        return (bool) $this->editChatAboutAsync(peer: $peer, about: $about)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param ChatBannedRights $bannedRights
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.editChatDefaultBannedRights
     * @api
     */
    public function editChatDefaultBannedRightsAsync(AbstractInputPeer|string|int $peer, ChatBannedRights $bannedRights): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new EditChatDefaultBannedRightsRequest(peer: $peer, bannedRights: $bannedRights));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param ChatBannedRights $bannedRights
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.editChatDefaultBannedRights
     * @api
     */
    public function editChatDefaultBannedRights(AbstractInputPeer|string|int $peer, ChatBannedRights $bannedRights): ?AbstractUpdates
    {
        return $this->editChatDefaultBannedRightsAsync(peer: $peer, bannedRights: $bannedRights)->await();
    }

    /**
     * @param string $langCode
     * @return Future<EmojiKeywordsDifference|null>
     * @see https://core.telegram.org/method/messages.getEmojiKeywords
     * @api
     */
    public function getEmojiKeywordsAsync(string $langCode): Future
    {
        return $this->client->call(new GetEmojiKeywordsRequest(langCode: $langCode));
    }

    /**
     * @param string $langCode
     * @return EmojiKeywordsDifference|null
     * @see https://core.telegram.org/method/messages.getEmojiKeywords
     * @api
     */
    public function getEmojiKeywords(string $langCode): ?EmojiKeywordsDifference
    {
        return $this->getEmojiKeywordsAsync(langCode: $langCode)->await();
    }

    /**
     * @param string $langCode
     * @param int $fromVersion
     * @return Future<EmojiKeywordsDifference|null>
     * @see https://core.telegram.org/method/messages.getEmojiKeywordsDifference
     * @api
     */
    public function getEmojiKeywordsDifferenceAsync(string $langCode, int $fromVersion): Future
    {
        return $this->client->call(new GetEmojiKeywordsDifferenceRequest(langCode: $langCode, fromVersion: $fromVersion));
    }

    /**
     * @param string $langCode
     * @param int $fromVersion
     * @return EmojiKeywordsDifference|null
     * @see https://core.telegram.org/method/messages.getEmojiKeywordsDifference
     * @api
     */
    public function getEmojiKeywordsDifference(string $langCode, int $fromVersion): ?EmojiKeywordsDifference
    {
        return $this->getEmojiKeywordsDifferenceAsync(langCode: $langCode, fromVersion: $fromVersion)->await();
    }

    /**
     * @param list<string> $langCodes
     * @return Future<list<EmojiLanguage>>
     * @see https://core.telegram.org/method/messages.getEmojiKeywordsLanguages
     * @api
     */
    public function getEmojiKeywordsLanguagesAsync(array $langCodes): Future
    {
        return $this->client->call(new GetEmojiKeywordsLanguagesRequest(langCodes: $langCodes));
    }

    /**
     * @param list<string> $langCodes
     * @return list<EmojiLanguage>
     * @see https://core.telegram.org/method/messages.getEmojiKeywordsLanguages
     * @api
     */
    public function getEmojiKeywordsLanguages(array $langCodes): array
    {
        return $this->getEmojiKeywordsLanguagesAsync(langCodes: $langCodes)->await();
    }

    /**
     * @param string $langCode
     * @return Future<EmojiURL|null>
     * @see https://core.telegram.org/method/messages.getEmojiURL
     * @api
     */
    public function getEmojiURLAsync(string $langCode): Future
    {
        return $this->client->call(new GetEmojiURLRequest(langCode: $langCode));
    }

    /**
     * @param string $langCode
     * @return EmojiURL|null
     * @see https://core.telegram.org/method/messages.getEmojiURL
     * @api
     */
    public function getEmojiURL(string $langCode): ?EmojiURL
    {
        return $this->getEmojiURLAsync(langCode: $langCode)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned> $filters
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $savedPeerId
     * @param int|null $topMsgId
     * @return Future<list<SearchCounter>>
     * @see https://core.telegram.org/method/messages.getSearchCounters
     * @api
     */
    public function getSearchCountersAsync(AbstractInputPeer|string|int $peer, array $filters, AbstractInputPeer|string|int|null $savedPeerId = null, ?int $topMsgId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($savedPeerId) || is_int($savedPeerId)) {
            $savedPeerId = $this->client->peerManager->resolve($savedPeerId);
        }
        return $this->client->call(new GetSearchCountersRequest(peer: $peer, filters: $filters, savedPeerId: $savedPeerId, topMsgId: $topMsgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned> $filters
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $savedPeerId
     * @param int|null $topMsgId
     * @return list<SearchCounter>
     * @see https://core.telegram.org/method/messages.getSearchCounters
     * @api
     */
    public function getSearchCounters(AbstractInputPeer|string|int $peer, array $filters, AbstractInputPeer|string|int|null $savedPeerId = null, ?int $topMsgId = null): array
    {
        return $this->getSearchCountersAsync(peer: $peer, filters: $filters, savedPeerId: $savedPeerId, topMsgId: $topMsgId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $peer
     * @param int|null $msgId
     * @param int|null $buttonId
     * @param string|null $url
     * @return Future<UrlAuthResultRequest|UrlAuthResultAccepted|UrlAuthResultDefault|null>
     * @see https://core.telegram.org/method/messages.requestUrlAuth
     * @api
     */
    public function requestUrlAuthAsync(AbstractInputPeer|string|int|null $peer = null, ?int $msgId = null, ?int $buttonId = null, ?string $url = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new RequestUrlAuthRequest(peer: $peer, msgId: $msgId, buttonId: $buttonId, url: $url));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $peer
     * @param int|null $msgId
     * @param int|null $buttonId
     * @param string|null $url
     * @return UrlAuthResultRequest|UrlAuthResultAccepted|UrlAuthResultDefault|null
     * @see https://core.telegram.org/method/messages.requestUrlAuth
     * @api
     */
    public function requestUrlAuth(AbstractInputPeer|string|int|null $peer = null, ?int $msgId = null, ?int $buttonId = null, ?string $url = null): ?AbstractUrlAuthResult
    {
        return $this->requestUrlAuthAsync(peer: $peer, msgId: $msgId, buttonId: $buttonId, url: $url)->await();
    }

    /**
     * @param bool|null $writeAllowed
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $peer
     * @param int|null $msgId
     * @param int|null $buttonId
     * @param string|null $url
     * @return Future<UrlAuthResultRequest|UrlAuthResultAccepted|UrlAuthResultDefault|null>
     * @see https://core.telegram.org/method/messages.acceptUrlAuth
     * @api
     */
    public function acceptUrlAuthAsync(?bool $writeAllowed = null, AbstractInputPeer|string|int|null $peer = null, ?int $msgId = null, ?int $buttonId = null, ?string $url = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new AcceptUrlAuthRequest(writeAllowed: $writeAllowed, peer: $peer, msgId: $msgId, buttonId: $buttonId, url: $url));
    }

    /**
     * @param bool|null $writeAllowed
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $peer
     * @param int|null $msgId
     * @param int|null $buttonId
     * @param string|null $url
     * @return UrlAuthResultRequest|UrlAuthResultAccepted|UrlAuthResultDefault|null
     * @see https://core.telegram.org/method/messages.acceptUrlAuth
     * @api
     */
    public function acceptUrlAuth(?bool $writeAllowed = null, AbstractInputPeer|string|int|null $peer = null, ?int $msgId = null, ?int $buttonId = null, ?string $url = null): ?AbstractUrlAuthResult
    {
        return $this->acceptUrlAuthAsync(writeAllowed: $writeAllowed, peer: $peer, msgId: $msgId, buttonId: $buttonId, url: $url)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.hidePeerSettingsBar
     * @api
     */
    public function hidePeerSettingsBarAsync(AbstractInputPeer|string|int $peer): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new HidePeerSettingsBarRequest(peer: $peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return bool
     * @see https://core.telegram.org/method/messages.hidePeerSettingsBar
     * @api
     */
    public function hidePeerSettingsBar(AbstractInputPeer|string|int $peer): bool
    {
        return (bool) $this->hidePeerSettingsBarAsync(peer: $peer)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $hash
     * @return Future<Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null>
     * @see https://core.telegram.org/method/messages.getScheduledHistory
     * @api
     */
    public function getScheduledHistoryAsync(AbstractInputPeer|string|int $peer, int $hash): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetScheduledHistoryRequest(peer: $peer, hash: $hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $hash
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getScheduledHistory
     * @api
     */
    public function getScheduledHistory(AbstractInputPeer|string|int $peer, int $hash): ?AbstractMessages
    {
        return $this->getScheduledHistoryAsync(peer: $peer, hash: $hash)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @return Future<Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null>
     * @see https://core.telegram.org/method/messages.getScheduledMessages
     * @api
     */
    public function getScheduledMessagesAsync(AbstractInputPeer|string|int $peer, array $id): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetScheduledMessagesRequest(peer: $peer, id: $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getScheduledMessages
     * @api
     */
    public function getScheduledMessages(AbstractInputPeer|string|int $peer, array $id): ?AbstractMessages
    {
        return $this->getScheduledMessagesAsync(peer: $peer, id: $id)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.sendScheduledMessages
     * @api
     */
    public function sendScheduledMessagesAsync(AbstractInputPeer|string|int $peer, array $id): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new SendScheduledMessagesRequest(peer: $peer, id: $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendScheduledMessages
     * @api
     */
    public function sendScheduledMessages(AbstractInputPeer|string|int $peer, array $id): ?AbstractUpdates
    {
        return $this->sendScheduledMessagesAsync(peer: $peer, id: $id)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.deleteScheduledMessages
     * @api
     */
    public function deleteScheduledMessagesAsync(AbstractInputPeer|string|int $peer, array $id): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new DeleteScheduledMessagesRequest(peer: $peer, id: $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.deleteScheduledMessages
     * @api
     */
    public function deleteScheduledMessages(AbstractInputPeer|string|int $peer, array $id): ?AbstractUpdates
    {
        return $this->deleteScheduledMessagesAsync(peer: $peer, id: $id)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param int $limit
     * @param string|null $option
     * @param string|null $offset
     * @return Future<VotesList|null>
     * @see https://core.telegram.org/method/messages.getPollVotes
     * @api
     */
    public function getPollVotesAsync(AbstractInputPeer|string|int $peer, int $id, int $limit, ?string $option = null, ?string $offset = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetPollVotesRequest(peer: $peer, id: $id, limit: $limit, option: $option, offset: $offset));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param int $limit
     * @param string|null $option
     * @param string|null $offset
     * @return VotesList|null
     * @see https://core.telegram.org/method/messages.getPollVotes
     * @api
     */
    public function getPollVotes(AbstractInputPeer|string|int $peer, int $id, int $limit, ?string $option = null, ?string $offset = null): ?VotesList
    {
        return $this->getPollVotesAsync(peer: $peer, id: $id, limit: $limit, option: $option, offset: $offset)->await();
    }

    /**
     * @param list<InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts> $stickersets
     * @param bool|null $uninstall
     * @param bool|null $archive
     * @param bool|null $unarchive
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.toggleStickerSets
     * @api
     */
    public function toggleStickerSetsAsync(array $stickersets, ?bool $uninstall = null, ?bool $archive = null, ?bool $unarchive = null): Future
    {
        return $this->client->call(new ToggleStickerSetsRequest(stickersets: $stickersets, uninstall: $uninstall, archive: $archive, unarchive: $unarchive));
    }

    /**
     * @param list<InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts> $stickersets
     * @param bool|null $uninstall
     * @param bool|null $archive
     * @param bool|null $unarchive
     * @return bool
     * @see https://core.telegram.org/method/messages.toggleStickerSets
     * @api
     */
    public function toggleStickerSets(array $stickersets, ?bool $uninstall = null, ?bool $archive = null, ?bool $unarchive = null): bool
    {
        return (bool) $this->toggleStickerSetsAsync(stickersets: $stickersets, uninstall: $uninstall, archive: $archive, unarchive: $unarchive)->await();
    }

    /**
     * @return Future<DialogFilters|null>
     * @see https://core.telegram.org/method/messages.getDialogFilters
     * @api
     */
    public function getDialogFiltersAsync(): Future
    {
        return $this->client->call(new GetDialogFiltersRequest());
    }

    /**
     * @return DialogFilters|null
     * @see https://core.telegram.org/method/messages.getDialogFilters
     * @api
     */
    public function getDialogFilters(): ?DialogFilters
    {
        return $this->getDialogFiltersAsync()->await();
    }

    /**
     * @return Future<list<DialogFilterSuggested>>
     * @see https://core.telegram.org/method/messages.getSuggestedDialogFilters
     * @api
     */
    public function getSuggestedDialogFiltersAsync(): Future
    {
        return $this->client->call(new GetSuggestedDialogFiltersRequest());
    }

    /**
     * @return list<DialogFilterSuggested>
     * @see https://core.telegram.org/method/messages.getSuggestedDialogFilters
     * @api
     */
    public function getSuggestedDialogFilters(): array
    {
        return $this->getSuggestedDialogFiltersAsync()->await();
    }

    /**
     * @param int $id
     * @param DialogFilter|DialogFilterDefault|DialogFilterChatlist|null $filter
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.updateDialogFilter
     * @api
     */
    public function updateDialogFilterAsync(int $id, ?AbstractDialogFilter $filter = null): Future
    {
        return $this->client->call(new UpdateDialogFilterRequest(id: $id, filter: $filter));
    }

    /**
     * @param int $id
     * @param DialogFilter|DialogFilterDefault|DialogFilterChatlist|null $filter
     * @return bool
     * @see https://core.telegram.org/method/messages.updateDialogFilter
     * @api
     */
    public function updateDialogFilter(int $id, ?AbstractDialogFilter $filter = null): bool
    {
        return (bool) $this->updateDialogFilterAsync(id: $id, filter: $filter)->await();
    }

    /**
     * @param list<int> $order
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.updateDialogFiltersOrder
     * @api
     */
    public function updateDialogFiltersOrderAsync(array $order): Future
    {
        return $this->client->call(new UpdateDialogFiltersOrderRequest(order: $order));
    }

    /**
     * @param list<int> $order
     * @return bool
     * @see https://core.telegram.org/method/messages.updateDialogFiltersOrder
     * @api
     */
    public function updateDialogFiltersOrder(array $order): bool
    {
        return (bool) $this->updateDialogFiltersOrderAsync(order: $order)->await();
    }

    /**
     * @param int $offset
     * @param int $limit
     * @param int $hash
     * @return Future<FeaturedStickersNotModified|FeaturedStickers|null>
     * @see https://core.telegram.org/method/messages.getOldFeaturedStickers
     * @api
     */
    public function getOldFeaturedStickersAsync(int $offset, int $limit, int $hash): Future
    {
        return $this->client->call(new GetOldFeaturedStickersRequest(offset: $offset, limit: $limit, hash: $hash));
    }

    /**
     * @param int $offset
     * @param int $limit
     * @param int $hash
     * @return FeaturedStickersNotModified|FeaturedStickers|null
     * @see https://core.telegram.org/method/messages.getOldFeaturedStickers
     * @api
     */
    public function getOldFeaturedStickers(int $offset, int $limit, int $hash): ?AbstractFeaturedStickers
    {
        return $this->getOldFeaturedStickersAsync(offset: $offset, limit: $limit, hash: $hash)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param int $offsetId
     * @param int $offsetDate
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int $hash
     * @return Future<Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null>
     * @see https://core.telegram.org/method/messages.getReplies
     * @api
     */
    public function getRepliesAsync(AbstractInputPeer|string|int $peer, int $msgId, int $offsetId, int $offsetDate, int $addOffset, int $limit, int $maxId, int $minId, int $hash): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetRepliesRequest(peer: $peer, msgId: $msgId, offsetId: $offsetId, offsetDate: $offsetDate, addOffset: $addOffset, limit: $limit, maxId: $maxId, minId: $minId, hash: $hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param int $offsetId
     * @param int $offsetDate
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int $hash
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getReplies
     * @api
     */
    public function getReplies(AbstractInputPeer|string|int $peer, int $msgId, int $offsetId, int $offsetDate, int $addOffset, int $limit, int $maxId, int $minId, int $hash): ?AbstractMessages
    {
        return $this->getRepliesAsync(peer: $peer, msgId: $msgId, offsetId: $offsetId, offsetDate: $offsetDate, addOffset: $addOffset, limit: $limit, maxId: $maxId, minId: $minId, hash: $hash)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return Future<DiscussionMessage|null>
     * @see https://core.telegram.org/method/messages.getDiscussionMessage
     * @api
     */
    public function getDiscussionMessageAsync(AbstractInputPeer|string|int $peer, int $msgId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetDiscussionMessageRequest(peer: $peer, msgId: $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return DiscussionMessage|null
     * @see https://core.telegram.org/method/messages.getDiscussionMessage
     * @api
     */
    public function getDiscussionMessage(AbstractInputPeer|string|int $peer, int $msgId): ?DiscussionMessage
    {
        return $this->getDiscussionMessageAsync(peer: $peer, msgId: $msgId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param int $readMaxId
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.readDiscussion
     * @api
     */
    public function readDiscussionAsync(AbstractInputPeer|string|int $peer, int $msgId, int $readMaxId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ReadDiscussionRequest(peer: $peer, msgId: $msgId, readMaxId: $readMaxId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param int $readMaxId
     * @return bool
     * @see https://core.telegram.org/method/messages.readDiscussion
     * @api
     */
    public function readDiscussion(AbstractInputPeer|string|int $peer, int $msgId, int $readMaxId): bool
    {
        return (bool) $this->readDiscussionAsync(peer: $peer, msgId: $msgId, readMaxId: $readMaxId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int|null $topMsgId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $savedPeerId
     * @return Future<AffectedHistory|null>
     * @see https://core.telegram.org/method/messages.unpinAllMessages
     * @api
     */
    public function unpinAllMessagesAsync(AbstractInputPeer|string|int $peer, ?int $topMsgId = null, AbstractInputPeer|string|int|null $savedPeerId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($savedPeerId) || is_int($savedPeerId)) {
            $savedPeerId = $this->client->peerManager->resolve($savedPeerId);
        }
        return $this->client->call(new UnpinAllMessagesRequest(peer: $peer, topMsgId: $topMsgId, savedPeerId: $savedPeerId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int|null $topMsgId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $savedPeerId
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/messages.unpinAllMessages
     * @api
     */
    public function unpinAllMessages(AbstractInputPeer|string|int $peer, ?int $topMsgId = null, AbstractInputPeer|string|int|null $savedPeerId = null): ?AffectedHistory
    {
        return $this->unpinAllMessagesAsync(peer: $peer, topMsgId: $topMsgId, savedPeerId: $savedPeerId)->await();
    }

    /**
     * @param int $chatId
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.deleteChat
     * @api
     */
    public function deleteChatAsync(int $chatId): Future
    {
        return $this->client->call(new DeleteChatRequest(chatId: $chatId));
    }

    /**
     * @param int $chatId
     * @return bool
     * @see https://core.telegram.org/method/messages.deleteChat
     * @api
     */
    public function deleteChat(int $chatId): bool
    {
        return (bool) $this->deleteChatAsync(chatId: $chatId)->await();
    }

    /**
     * @param bool|null $revoke
     * @return Future<AffectedFoundMessages|null>
     * @see https://core.telegram.org/method/messages.deletePhoneCallHistory
     * @api
     */
    public function deletePhoneCallHistoryAsync(?bool $revoke = null): Future
    {
        return $this->client->call(new DeletePhoneCallHistoryRequest(revoke: $revoke));
    }

    /**
     * @param bool|null $revoke
     * @return AffectedFoundMessages|null
     * @see https://core.telegram.org/method/messages.deletePhoneCallHistory
     * @api
     */
    public function deletePhoneCallHistory(?bool $revoke = null): ?AffectedFoundMessages
    {
        return $this->deletePhoneCallHistoryAsync(revoke: $revoke)->await();
    }

    /**
     * @param string $importHead
     * @return Future<HistoryImportParsed|null>
     * @see https://core.telegram.org/method/messages.checkHistoryImport
     * @api
     */
    public function checkHistoryImportAsync(string $importHead): Future
    {
        return $this->client->call(new CheckHistoryImportRequest(importHead: $importHead));
    }

    /**
     * @param string $importHead
     * @return HistoryImportParsed|null
     * @see https://core.telegram.org/method/messages.checkHistoryImport
     * @api
     */
    public function checkHistoryImport(string $importHead): ?HistoryImportParsed
    {
        return $this->checkHistoryImportAsync(importHead: $importHead)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputFile|InputFileBig|InputFileStoryDocument $file
     * @param int $mediaCount
     * @return Future<HistoryImport|null>
     * @see https://core.telegram.org/method/messages.initHistoryImport
     * @api
     */
    public function initHistoryImportAsync(AbstractInputPeer|string|int $peer, AbstractInputFile $file, int $mediaCount): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new InitHistoryImportRequest(peer: $peer, file: $file, mediaCount: $mediaCount));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputFile|InputFileBig|InputFileStoryDocument $file
     * @param int $mediaCount
     * @return HistoryImport|null
     * @see https://core.telegram.org/method/messages.initHistoryImport
     * @api
     */
    public function initHistoryImport(AbstractInputPeer|string|int $peer, AbstractInputFile $file, int $mediaCount): ?HistoryImport
    {
        return $this->initHistoryImportAsync(peer: $peer, file: $file, mediaCount: $mediaCount)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $importId
     * @param string $fileName
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $media
     * @return Future<MessageMediaEmpty|MessageMediaPhoto|MessageMediaGeo|MessageMediaContact|MessageMediaUnsupported|MessageMediaDocument|MessageMediaWebPage|MessageMediaVenue|MessageMediaGame|MessageMediaInvoice|MessageMediaGeoLive|MessageMediaPoll|MessageMediaDice|MessageMediaStory|MessageMediaGiveaway|MessageMediaGiveawayResults|MessageMediaPaidMedia|MessageMediaToDo|MessageMediaVideoStream|null>
     * @see https://core.telegram.org/method/messages.uploadImportedMedia
     * @api
     */
    public function uploadImportedMediaAsync(AbstractInputPeer|string|int $peer, int $importId, string $fileName, AbstractInputMedia $media): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new UploadImportedMediaRequest(peer: $peer, importId: $importId, fileName: $fileName, media: $media));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $importId
     * @param string $fileName
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $media
     * @return MessageMediaEmpty|MessageMediaPhoto|MessageMediaGeo|MessageMediaContact|MessageMediaUnsupported|MessageMediaDocument|MessageMediaWebPage|MessageMediaVenue|MessageMediaGame|MessageMediaInvoice|MessageMediaGeoLive|MessageMediaPoll|MessageMediaDice|MessageMediaStory|MessageMediaGiveaway|MessageMediaGiveawayResults|MessageMediaPaidMedia|MessageMediaToDo|MessageMediaVideoStream|null
     * @see https://core.telegram.org/method/messages.uploadImportedMedia
     * @api
     */
    public function uploadImportedMedia(AbstractInputPeer|string|int $peer, int $importId, string $fileName, AbstractInputMedia $media): ?AbstractMessageMedia
    {
        return $this->uploadImportedMediaAsync(peer: $peer, importId: $importId, fileName: $fileName, media: $media)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $importId
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.startHistoryImport
     * @api
     */
    public function startHistoryImportAsync(AbstractInputPeer|string|int $peer, int $importId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new StartHistoryImportRequest(peer: $peer, importId: $importId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $importId
     * @return bool
     * @see https://core.telegram.org/method/messages.startHistoryImport
     * @api
     */
    public function startHistoryImport(AbstractInputPeer|string|int $peer, int $importId): bool
    {
        return (bool) $this->startHistoryImportAsync(peer: $peer, importId: $importId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $adminId
     * @param int $limit
     * @param bool|null $revoked
     * @param int|null $offsetDate
     * @param string|null $offsetLink
     * @return Future<ExportedChatInvites|null>
     * @see https://core.telegram.org/method/messages.getExportedChatInvites
     * @api
     */
    public function getExportedChatInvitesAsync(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $adminId, int $limit, ?bool $revoked = null, ?int $offsetDate = null, ?string $offsetLink = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($adminId) || is_int($adminId)) {
            $__tmpPeer = $this->client->peerManager->resolve($adminId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $adminId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $adminId = $__tmpPeer;
            }
        }
        return $this->client->call(new GetExportedChatInvitesRequest(peer: $peer, adminId: $adminId, limit: $limit, revoked: $revoked, offsetDate: $offsetDate, offsetLink: $offsetLink));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $adminId
     * @param int $limit
     * @param bool|null $revoked
     * @param int|null $offsetDate
     * @param string|null $offsetLink
     * @return ExportedChatInvites|null
     * @see https://core.telegram.org/method/messages.getExportedChatInvites
     * @api
     */
    public function getExportedChatInvites(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $adminId, int $limit, ?bool $revoked = null, ?int $offsetDate = null, ?string $offsetLink = null): ?ExportedChatInvites
    {
        return $this->getExportedChatInvitesAsync(peer: $peer, adminId: $adminId, limit: $limit, revoked: $revoked, offsetDate: $offsetDate, offsetLink: $offsetLink)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $link
     * @return Future<ExportedChatInvite|ExportedChatInviteReplaced|null>
     * @see https://core.telegram.org/method/messages.getExportedChatInvite
     * @api
     */
    public function getExportedChatInviteAsync(AbstractInputPeer|string|int $peer, string $link): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetExportedChatInviteRequest(peer: $peer, link: $link));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $link
     * @return ExportedChatInvite|ExportedChatInviteReplaced|null
     * @see https://core.telegram.org/method/messages.getExportedChatInvite
     * @api
     */
    public function getExportedChatInvite(AbstractInputPeer|string|int $peer, string $link): ?MessagesAbstractExportedChatInvite
    {
        return $this->getExportedChatInviteAsync(peer: $peer, link: $link)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $link
     * @param bool|null $revoked
     * @param int|null $expireDate
     * @param int|null $usageLimit
     * @param bool|null $requestNeeded
     * @param string|null $title
     * @return Future<ExportedChatInvite|ExportedChatInviteReplaced|null>
     * @see https://core.telegram.org/method/messages.editExportedChatInvite
     * @api
     */
    public function editExportedChatInviteAsync(AbstractInputPeer|string|int $peer, string $link, ?bool $revoked = null, ?int $expireDate = null, ?int $usageLimit = null, ?bool $requestNeeded = null, ?string $title = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new EditExportedChatInviteRequest(peer: $peer, link: $link, revoked: $revoked, expireDate: $expireDate, usageLimit: $usageLimit, requestNeeded: $requestNeeded, title: $title));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $link
     * @param bool|null $revoked
     * @param int|null $expireDate
     * @param int|null $usageLimit
     * @param bool|null $requestNeeded
     * @param string|null $title
     * @return ExportedChatInvite|ExportedChatInviteReplaced|null
     * @see https://core.telegram.org/method/messages.editExportedChatInvite
     * @api
     */
    public function editExportedChatInvite(AbstractInputPeer|string|int $peer, string $link, ?bool $revoked = null, ?int $expireDate = null, ?int $usageLimit = null, ?bool $requestNeeded = null, ?string $title = null): ?MessagesAbstractExportedChatInvite
    {
        return $this->editExportedChatInviteAsync(peer: $peer, link: $link, revoked: $revoked, expireDate: $expireDate, usageLimit: $usageLimit, requestNeeded: $requestNeeded, title: $title)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $adminId
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.deleteRevokedExportedChatInvites
     * @api
     */
    public function deleteRevokedExportedChatInvitesAsync(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $adminId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($adminId) || is_int($adminId)) {
            $__tmpPeer = $this->client->peerManager->resolve($adminId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $adminId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $adminId = $__tmpPeer;
            }
        }
        return $this->client->call(new DeleteRevokedExportedChatInvitesRequest(peer: $peer, adminId: $adminId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $adminId
     * @return bool
     * @see https://core.telegram.org/method/messages.deleteRevokedExportedChatInvites
     * @api
     */
    public function deleteRevokedExportedChatInvites(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $adminId): bool
    {
        return (bool) $this->deleteRevokedExportedChatInvitesAsync(peer: $peer, adminId: $adminId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $link
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.deleteExportedChatInvite
     * @api
     */
    public function deleteExportedChatInviteAsync(AbstractInputPeer|string|int $peer, string $link): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new DeleteExportedChatInviteRequest(peer: $peer, link: $link));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $link
     * @return bool
     * @see https://core.telegram.org/method/messages.deleteExportedChatInvite
     * @api
     */
    public function deleteExportedChatInvite(AbstractInputPeer|string|int $peer, string $link): bool
    {
        return (bool) $this->deleteExportedChatInviteAsync(peer: $peer, link: $link)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return Future<ChatAdminsWithInvites|null>
     * @see https://core.telegram.org/method/messages.getAdminsWithInvites
     * @api
     */
    public function getAdminsWithInvitesAsync(AbstractInputPeer|string|int $peer): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetAdminsWithInvitesRequest(peer: $peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return ChatAdminsWithInvites|null
     * @see https://core.telegram.org/method/messages.getAdminsWithInvites
     * @api
     */
    public function getAdminsWithInvites(AbstractInputPeer|string|int $peer): ?ChatAdminsWithInvites
    {
        return $this->getAdminsWithInvitesAsync(peer: $peer)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $offsetDate
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $offsetUser
     * @param int $limit
     * @param bool|null $requested
     * @param bool|null $subscriptionExpired
     * @param string|null $link
     * @param string|null $q
     * @return Future<ChatInviteImporters|null>
     * @see https://core.telegram.org/method/messages.getChatInviteImporters
     * @api
     */
    public function getChatInviteImportersAsync(AbstractInputPeer|string|int $peer, int $offsetDate, AbstractInputUser|string|int $offsetUser, int $limit, ?bool $requested = null, ?bool $subscriptionExpired = null, ?string $link = null, ?string $q = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($offsetUser) || is_int($offsetUser)) {
            $__tmpPeer = $this->client->peerManager->resolve($offsetUser);
            if ($__tmpPeer instanceof InputPeerUser) {
                $offsetUser = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $offsetUser = $__tmpPeer;
            }
        }
        return $this->client->call(new GetChatInviteImportersRequest(peer: $peer, offsetDate: $offsetDate, offsetUser: $offsetUser, limit: $limit, requested: $requested, subscriptionExpired: $subscriptionExpired, link: $link, q: $q));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $offsetDate
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $offsetUser
     * @param int $limit
     * @param bool|null $requested
     * @param bool|null $subscriptionExpired
     * @param string|null $link
     * @param string|null $q
     * @return ChatInviteImporters|null
     * @see https://core.telegram.org/method/messages.getChatInviteImporters
     * @api
     */
    public function getChatInviteImporters(AbstractInputPeer|string|int $peer, int $offsetDate, AbstractInputUser|string|int $offsetUser, int $limit, ?bool $requested = null, ?bool $subscriptionExpired = null, ?string $link = null, ?string $q = null): ?ChatInviteImporters
    {
        return $this->getChatInviteImportersAsync(peer: $peer, offsetDate: $offsetDate, offsetUser: $offsetUser, limit: $limit, requested: $requested, subscriptionExpired: $subscriptionExpired, link: $link, q: $q)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $period
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.setHistoryTTL
     * @api
     */
    public function setHistoryTTLAsync(AbstractInputPeer|string|int $peer, int $period): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new SetHistoryTTLRequest(peer: $peer, period: $period));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $period
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.setHistoryTTL
     * @api
     */
    public function setHistoryTTL(AbstractInputPeer|string|int $peer, int $period): ?AbstractUpdates
    {
        return $this->setHistoryTTLAsync(peer: $peer, period: $period)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return Future<CheckedHistoryImportPeer|null>
     * @see https://core.telegram.org/method/messages.checkHistoryImportPeer
     * @api
     */
    public function checkHistoryImportPeerAsync(AbstractInputPeer|string|int $peer): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new CheckHistoryImportPeerRequest(peer: $peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return CheckedHistoryImportPeer|null
     * @see https://core.telegram.org/method/messages.checkHistoryImportPeer
     * @api
     */
    public function checkHistoryImportPeer(AbstractInputPeer|string|int $peer): ?CheckedHistoryImportPeer
    {
        return $this->checkHistoryImportPeerAsync(peer: $peer)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputChatThemeEmpty|InputChatTheme|InputChatThemeUniqueGift $theme
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.setChatTheme
     * @api
     */
    public function setChatThemeAsync(AbstractInputPeer|string|int $peer, AbstractInputChatTheme $theme): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new SetChatThemeRequest(peer: $peer, theme: $theme));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputChatThemeEmpty|InputChatTheme|InputChatThemeUniqueGift $theme
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.setChatTheme
     * @api
     */
    public function setChatTheme(AbstractInputPeer|string|int $peer, AbstractInputChatTheme $theme): ?AbstractUpdates
    {
        return $this->setChatThemeAsync(peer: $peer, theme: $theme)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return Future<list<ReadParticipantDate>>
     * @see https://core.telegram.org/method/messages.getMessageReadParticipants
     * @api
     */
    public function getMessageReadParticipantsAsync(AbstractInputPeer|string|int $peer, int $msgId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetMessageReadParticipantsRequest(peer: $peer, msgId: $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return list<ReadParticipantDate>
     * @see https://core.telegram.org/method/messages.getMessageReadParticipants
     * @api
     */
    public function getMessageReadParticipants(AbstractInputPeer|string|int $peer, int $msgId): array
    {
        return $this->getMessageReadParticipantsAsync(peer: $peer, msgId: $msgId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned $filter
     * @param int $offsetId
     * @param int $offsetDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $savedPeerId
     * @return Future<SearchResultsCalendar|null>
     * @see https://core.telegram.org/method/messages.getSearchResultsCalendar
     * @api
     */
    public function getSearchResultsCalendarAsync(AbstractInputPeer|string|int $peer, AbstractMessagesFilter $filter, int $offsetId, int $offsetDate, AbstractInputPeer|string|int|null $savedPeerId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($savedPeerId) || is_int($savedPeerId)) {
            $savedPeerId = $this->client->peerManager->resolve($savedPeerId);
        }
        return $this->client->call(new GetSearchResultsCalendarRequest(peer: $peer, filter: $filter, offsetId: $offsetId, offsetDate: $offsetDate, savedPeerId: $savedPeerId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned $filter
     * @param int $offsetId
     * @param int $offsetDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $savedPeerId
     * @return SearchResultsCalendar|null
     * @see https://core.telegram.org/method/messages.getSearchResultsCalendar
     * @api
     */
    public function getSearchResultsCalendar(AbstractInputPeer|string|int $peer, AbstractMessagesFilter $filter, int $offsetId, int $offsetDate, AbstractInputPeer|string|int|null $savedPeerId = null): ?SearchResultsCalendar
    {
        return $this->getSearchResultsCalendarAsync(peer: $peer, filter: $filter, offsetId: $offsetId, offsetDate: $offsetDate, savedPeerId: $savedPeerId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned $filter
     * @param int $offsetId
     * @param int $limit
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $savedPeerId
     * @return Future<SearchResultsPositions|null>
     * @see https://core.telegram.org/method/messages.getSearchResultsPositions
     * @api
     */
    public function getSearchResultsPositionsAsync(AbstractInputPeer|string|int $peer, AbstractMessagesFilter $filter, int $offsetId, int $limit, AbstractInputPeer|string|int|null $savedPeerId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($savedPeerId) || is_int($savedPeerId)) {
            $savedPeerId = $this->client->peerManager->resolve($savedPeerId);
        }
        return $this->client->call(new GetSearchResultsPositionsRequest(peer: $peer, filter: $filter, offsetId: $offsetId, limit: $limit, savedPeerId: $savedPeerId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned $filter
     * @param int $offsetId
     * @param int $limit
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $savedPeerId
     * @return SearchResultsPositions|null
     * @see https://core.telegram.org/method/messages.getSearchResultsPositions
     * @api
     */
    public function getSearchResultsPositions(AbstractInputPeer|string|int $peer, AbstractMessagesFilter $filter, int $offsetId, int $limit, AbstractInputPeer|string|int|null $savedPeerId = null): ?SearchResultsPositions
    {
        return $this->getSearchResultsPositionsAsync(peer: $peer, filter: $filter, offsetId: $offsetId, limit: $limit, savedPeerId: $savedPeerId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param bool|null $approved
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.hideChatJoinRequest
     * @api
     */
    public function hideChatJoinRequestAsync(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $userId, ?bool $approved = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new HideChatJoinRequestRequest(peer: $peer, userId: $userId, approved: $approved));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param bool|null $approved
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.hideChatJoinRequest
     * @api
     */
    public function hideChatJoinRequest(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $userId, ?bool $approved = null): ?AbstractUpdates
    {
        return $this->hideChatJoinRequestAsync(peer: $peer, userId: $userId, approved: $approved)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $approved
     * @param string|null $link
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.hideAllChatJoinRequests
     * @api
     */
    public function hideAllChatJoinRequestsAsync(AbstractInputPeer|string|int $peer, ?bool $approved = null, ?string $link = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new HideAllChatJoinRequestsRequest(peer: $peer, approved: $approved, link: $link));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $approved
     * @param string|null $link
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.hideAllChatJoinRequests
     * @api
     */
    public function hideAllChatJoinRequests(AbstractInputPeer|string|int $peer, ?bool $approved = null, ?string $link = null): ?AbstractUpdates
    {
        return $this->hideAllChatJoinRequestsAsync(peer: $peer, approved: $approved, link: $link)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool $enabled
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.toggleNoForwards
     * @api
     */
    public function toggleNoForwardsAsync(AbstractInputPeer|string|int $peer, bool $enabled): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ToggleNoForwardsRequest(peer: $peer, enabled: $enabled));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.toggleNoForwards
     * @api
     */
    public function toggleNoForwards(AbstractInputPeer|string|int $peer, bool $enabled): ?AbstractUpdates
    {
        return $this->toggleNoForwardsAsync(peer: $peer, enabled: $enabled)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $sendAs
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.saveDefaultSendAs
     * @api
     */
    public function saveDefaultSendAsAsync(AbstractInputPeer|string|int $peer, AbstractInputPeer|string|int $sendAs): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($sendAs) || is_int($sendAs)) {
            $sendAs = $this->client->peerManager->resolve($sendAs);
        }
        return $this->client->call(new SaveDefaultSendAsRequest(peer: $peer, sendAs: $sendAs));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $sendAs
     * @return bool
     * @see https://core.telegram.org/method/messages.saveDefaultSendAs
     * @api
     */
    public function saveDefaultSendAs(AbstractInputPeer|string|int $peer, AbstractInputPeer|string|int $sendAs): bool
    {
        return (bool) $this->saveDefaultSendAsAsync(peer: $peer, sendAs: $sendAs)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param bool|null $big
     * @param bool|null $addToRecent
     * @param list<ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid>|null $reaction
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.sendReaction
     * @api
     */
    public function sendReactionAsync(AbstractInputPeer|string|int $peer, int $msgId, ?bool $big = null, ?bool $addToRecent = null, ?array $reaction = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new SendReactionRequest(peer: $peer, msgId: $msgId, big: $big, addToRecent: $addToRecent, reaction: $reaction));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param bool|null $big
     * @param bool|null $addToRecent
     * @param list<ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid>|null $reaction
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendReaction
     * @api
     */
    public function sendReaction(AbstractInputPeer|string|int $peer, int $msgId, ?bool $big = null, ?bool $addToRecent = null, ?array $reaction = null): ?AbstractUpdates
    {
        return $this->sendReactionAsync(peer: $peer, msgId: $msgId, big: $big, addToRecent: $addToRecent, reaction: $reaction)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.getMessagesReactions
     * @api
     */
    public function getMessagesReactionsAsync(AbstractInputPeer|string|int $peer, array $id): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetMessagesReactionsRequest(peer: $peer, id: $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.getMessagesReactions
     * @api
     */
    public function getMessagesReactions(AbstractInputPeer|string|int $peer, array $id): ?AbstractUpdates
    {
        return $this->getMessagesReactionsAsync(peer: $peer, id: $id)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param int $limit
     * @param ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid|null $reaction
     * @param string|null $offset
     * @return Future<MessageReactionsList|null>
     * @see https://core.telegram.org/method/messages.getMessageReactionsList
     * @api
     */
    public function getMessageReactionsListAsync(AbstractInputPeer|string|int $peer, int $id, int $limit, ?AbstractReaction $reaction = null, ?string $offset = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetMessageReactionsListRequest(peer: $peer, id: $id, limit: $limit, reaction: $reaction, offset: $offset));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param int $limit
     * @param ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid|null $reaction
     * @param string|null $offset
     * @return MessageReactionsList|null
     * @see https://core.telegram.org/method/messages.getMessageReactionsList
     * @api
     */
    public function getMessageReactionsList(AbstractInputPeer|string|int $peer, int $id, int $limit, ?AbstractReaction $reaction = null, ?string $offset = null): ?MessageReactionsList
    {
        return $this->getMessageReactionsListAsync(peer: $peer, id: $id, limit: $limit, reaction: $reaction, offset: $offset)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param ChatReactionsNone|ChatReactionsAll|ChatReactionsSome $availableReactions
     * @param int|null $reactionsLimit
     * @param bool|null $paidEnabled
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.setChatAvailableReactions
     * @api
     */
    public function setChatAvailableReactionsAsync(AbstractInputPeer|string|int $peer, AbstractChatReactions $availableReactions, ?int $reactionsLimit = null, ?bool $paidEnabled = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new SetChatAvailableReactionsRequest(peer: $peer, availableReactions: $availableReactions, reactionsLimit: $reactionsLimit, paidEnabled: $paidEnabled));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param ChatReactionsNone|ChatReactionsAll|ChatReactionsSome $availableReactions
     * @param int|null $reactionsLimit
     * @param bool|null $paidEnabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.setChatAvailableReactions
     * @api
     */
    public function setChatAvailableReactions(AbstractInputPeer|string|int $peer, AbstractChatReactions $availableReactions, ?int $reactionsLimit = null, ?bool $paidEnabled = null): ?AbstractUpdates
    {
        return $this->setChatAvailableReactionsAsync(peer: $peer, availableReactions: $availableReactions, reactionsLimit: $reactionsLimit, paidEnabled: $paidEnabled)->await();
    }

    /**
     * @param int $hash
     * @return Future<AvailableReactionsNotModified|AvailableReactions|null>
     * @see https://core.telegram.org/method/messages.getAvailableReactions
     * @api
     */
    public function getAvailableReactionsAsync(int $hash): Future
    {
        return $this->client->call(new GetAvailableReactionsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return AvailableReactionsNotModified|AvailableReactions|null
     * @see https://core.telegram.org/method/messages.getAvailableReactions
     * @api
     */
    public function getAvailableReactions(int $hash): ?AbstractAvailableReactions
    {
        return $this->getAvailableReactionsAsync(hash: $hash)->await();
    }

    /**
     * @param ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid $reaction
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.setDefaultReaction
     * @api
     */
    public function setDefaultReactionAsync(AbstractReaction $reaction): Future
    {
        return $this->client->call(new SetDefaultReactionRequest(reaction: $reaction));
    }

    /**
     * @param ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid $reaction
     * @return bool
     * @see https://core.telegram.org/method/messages.setDefaultReaction
     * @api
     */
    public function setDefaultReaction(AbstractReaction $reaction): bool
    {
        return (bool) $this->setDefaultReactionAsync(reaction: $reaction)->await();
    }

    /**
     * @param string $toLang
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $peer
     * @param list<int>|null $id
     * @param list<TextWithEntities>|null $text
     * @return Future<TranslatedText|null>
     * @see https://core.telegram.org/method/messages.translateText
     * @api
     */
    public function translateTextAsync(string $toLang, AbstractInputPeer|string|int|null $peer = null, ?array $id = null, ?array $text = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new TranslateTextRequest(toLang: $toLang, peer: $peer, id: $id, text: $text));
    }

    /**
     * @param string $toLang
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $peer
     * @param list<int>|null $id
     * @param list<TextWithEntities>|null $text
     * @return TranslatedText|null
     * @see https://core.telegram.org/method/messages.translateText
     * @api
     */
    public function translateText(string $toLang, AbstractInputPeer|string|int|null $peer = null, ?array $id = null, ?array $text = null): ?TranslatedText
    {
        return $this->translateTextAsync(toLang: $toLang, peer: $peer, id: $id, text: $text)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $offsetId
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int|null $topMsgId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $savedPeerId
     * @return Future<Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null>
     * @see https://core.telegram.org/method/messages.getUnreadReactions
     * @api
     */
    public function getUnreadReactionsAsync(AbstractInputPeer|string|int $peer, int $offsetId, int $addOffset, int $limit, int $maxId, int $minId, ?int $topMsgId = null, AbstractInputPeer|string|int|null $savedPeerId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($savedPeerId) || is_int($savedPeerId)) {
            $savedPeerId = $this->client->peerManager->resolve($savedPeerId);
        }
        return $this->client->call(new GetUnreadReactionsRequest(peer: $peer, offsetId: $offsetId, addOffset: $addOffset, limit: $limit, maxId: $maxId, minId: $minId, topMsgId: $topMsgId, savedPeerId: $savedPeerId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $offsetId
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int|null $topMsgId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $savedPeerId
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getUnreadReactions
     * @api
     */
    public function getUnreadReactions(AbstractInputPeer|string|int $peer, int $offsetId, int $addOffset, int $limit, int $maxId, int $minId, ?int $topMsgId = null, AbstractInputPeer|string|int|null $savedPeerId = null): ?AbstractMessages
    {
        return $this->getUnreadReactionsAsync(peer: $peer, offsetId: $offsetId, addOffset: $addOffset, limit: $limit, maxId: $maxId, minId: $minId, topMsgId: $topMsgId, savedPeerId: $savedPeerId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int|null $topMsgId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $savedPeerId
     * @return Future<AffectedHistory|null>
     * @see https://core.telegram.org/method/messages.readReactions
     * @api
     */
    public function readReactionsAsync(AbstractInputPeer|string|int $peer, ?int $topMsgId = null, AbstractInputPeer|string|int|null $savedPeerId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($savedPeerId) || is_int($savedPeerId)) {
            $savedPeerId = $this->client->peerManager->resolve($savedPeerId);
        }
        return $this->client->call(new ReadReactionsRequest(peer: $peer, topMsgId: $topMsgId, savedPeerId: $savedPeerId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int|null $topMsgId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $savedPeerId
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/messages.readReactions
     * @api
     */
    public function readReactions(AbstractInputPeer|string|int $peer, ?int $topMsgId = null, AbstractInputPeer|string|int|null $savedPeerId = null): ?AffectedHistory
    {
        return $this->readReactionsAsync(peer: $peer, topMsgId: $topMsgId, savedPeerId: $savedPeerId)->await();
    }

    /**
     * @param string $q
     * @param InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned $filter
     * @param int $limit
     * @return Future<Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null>
     * @see https://core.telegram.org/method/messages.searchSentMedia
     * @api
     */
    public function searchSentMediaAsync(string $q, AbstractMessagesFilter $filter, int $limit): Future
    {
        return $this->client->call(new SearchSentMediaRequest(q: $q, filter: $filter, limit: $limit));
    }

    /**
     * @param string $q
     * @param InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned $filter
     * @param int $limit
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.searchSentMedia
     * @api
     */
    public function searchSentMedia(string $q, AbstractMessagesFilter $filter, int $limit): ?AbstractMessages
    {
        return $this->searchSentMediaAsync(q: $q, filter: $filter, limit: $limit)->await();
    }

    /**
     * @param int $hash
     * @return Future<AttachMenuBotsNotModified|AttachMenuBots|null>
     * @see https://core.telegram.org/method/messages.getAttachMenuBots
     * @api
     */
    public function getAttachMenuBotsAsync(int $hash): Future
    {
        return $this->client->call(new GetAttachMenuBotsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return AttachMenuBotsNotModified|AttachMenuBots|null
     * @see https://core.telegram.org/method/messages.getAttachMenuBots
     * @api
     */
    public function getAttachMenuBots(int $hash): ?AbstractAttachMenuBots
    {
        return $this->getAttachMenuBotsAsync(hash: $hash)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @return Future<AttachMenuBotsBot|null>
     * @see https://core.telegram.org/method/messages.getAttachMenuBot
     * @api
     */
    public function getAttachMenuBotAsync(AbstractInputUser|string|int $bot): Future
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return $this->client->call(new GetAttachMenuBotRequest(bot: $bot));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @return AttachMenuBotsBot|null
     * @see https://core.telegram.org/method/messages.getAttachMenuBot
     * @api
     */
    public function getAttachMenuBot(AbstractInputUser|string|int $bot): ?AttachMenuBotsBot
    {
        return $this->getAttachMenuBotAsync(bot: $bot)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param bool $enabled
     * @param bool|null $writeAllowed
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.toggleBotInAttachMenu
     * @api
     */
    public function toggleBotInAttachMenuAsync(AbstractInputUser|string|int $bot, bool $enabled, ?bool $writeAllowed = null): Future
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return $this->client->call(new ToggleBotInAttachMenuRequest(bot: $bot, enabled: $enabled, writeAllowed: $writeAllowed));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param bool $enabled
     * @param bool|null $writeAllowed
     * @return bool
     * @see https://core.telegram.org/method/messages.toggleBotInAttachMenu
     * @api
     */
    public function toggleBotInAttachMenu(AbstractInputUser|string|int $bot, bool $enabled, ?bool $writeAllowed = null): bool
    {
        return (bool) $this->toggleBotInAttachMenuAsync(bot: $bot, enabled: $enabled, writeAllowed: $writeAllowed)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $platform
     * @param bool|null $fromBotMenu
     * @param bool|null $silent
     * @param bool|null $compact
     * @param bool|null $fullscreen
     * @param string|null $url
     * @param string|null $startParam
     * @param array|null $themeParams
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @return Future<WebViewResult|null>
     * @see https://core.telegram.org/method/messages.requestWebView
     * @api
     */
    public function requestWebViewAsync(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $bot, string $platform, ?bool $fromBotMenu = null, ?bool $silent = null, ?bool $compact = null, ?bool $fullscreen = null, ?string $url = null, ?string $startParam = null, ?array $themeParams = null, ?AbstractInputReplyTo $replyTo = null, AbstractInputPeer|string|int|null $sendAs = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        if (is_string($sendAs) || is_int($sendAs)) {
            $sendAs = $this->client->peerManager->resolve($sendAs);
        }
        return $this->client->call(new RequestWebViewRequest(peer: $peer, bot: $bot, platform: $platform, fromBotMenu: $fromBotMenu, silent: $silent, compact: $compact, fullscreen: $fullscreen, url: $url, startParam: $startParam, themeParams: $themeParams, replyTo: $replyTo, sendAs: $sendAs));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $platform
     * @param bool|null $fromBotMenu
     * @param bool|null $silent
     * @param bool|null $compact
     * @param bool|null $fullscreen
     * @param string|null $url
     * @param string|null $startParam
     * @param array|null $themeParams
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @return WebViewResult|null
     * @see https://core.telegram.org/method/messages.requestWebView
     * @api
     */
    public function requestWebView(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $bot, string $platform, ?bool $fromBotMenu = null, ?bool $silent = null, ?bool $compact = null, ?bool $fullscreen = null, ?string $url = null, ?string $startParam = null, ?array $themeParams = null, ?AbstractInputReplyTo $replyTo = null, AbstractInputPeer|string|int|null $sendAs = null): ?WebViewResult
    {
        return $this->requestWebViewAsync(peer: $peer, bot: $bot, platform: $platform, fromBotMenu: $fromBotMenu, silent: $silent, compact: $compact, fullscreen: $fullscreen, url: $url, startParam: $startParam, themeParams: $themeParams, replyTo: $replyTo, sendAs: $sendAs)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param int $queryId
     * @param bool|null $silent
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.prolongWebView
     * @api
     */
    public function prolongWebViewAsync(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $bot, int $queryId, ?bool $silent = null, ?AbstractInputReplyTo $replyTo = null, AbstractInputPeer|string|int|null $sendAs = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        if (is_string($sendAs) || is_int($sendAs)) {
            $sendAs = $this->client->peerManager->resolve($sendAs);
        }
        return $this->client->call(new ProlongWebViewRequest(peer: $peer, bot: $bot, queryId: $queryId, silent: $silent, replyTo: $replyTo, sendAs: $sendAs));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param int $queryId
     * @param bool|null $silent
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @return bool
     * @see https://core.telegram.org/method/messages.prolongWebView
     * @api
     */
    public function prolongWebView(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $bot, int $queryId, ?bool $silent = null, ?AbstractInputReplyTo $replyTo = null, AbstractInputPeer|string|int|null $sendAs = null): bool
    {
        return (bool) $this->prolongWebViewAsync(peer: $peer, bot: $bot, queryId: $queryId, silent: $silent, replyTo: $replyTo, sendAs: $sendAs)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $platform
     * @param bool|null $fromSwitchWebview
     * @param bool|null $fromSideMenu
     * @param bool|null $compact
     * @param bool|null $fullscreen
     * @param string|null $url
     * @param string|null $startParam
     * @param array|null $themeParams
     * @return Future<WebViewResult|null>
     * @see https://core.telegram.org/method/messages.requestSimpleWebView
     * @api
     */
    public function requestSimpleWebViewAsync(AbstractInputUser|string|int $bot, string $platform, ?bool $fromSwitchWebview = null, ?bool $fromSideMenu = null, ?bool $compact = null, ?bool $fullscreen = null, ?string $url = null, ?string $startParam = null, ?array $themeParams = null): Future
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return $this->client->call(new RequestSimpleWebViewRequest(bot: $bot, platform: $platform, fromSwitchWebview: $fromSwitchWebview, fromSideMenu: $fromSideMenu, compact: $compact, fullscreen: $fullscreen, url: $url, startParam: $startParam, themeParams: $themeParams));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $platform
     * @param bool|null $fromSwitchWebview
     * @param bool|null $fromSideMenu
     * @param bool|null $compact
     * @param bool|null $fullscreen
     * @param string|null $url
     * @param string|null $startParam
     * @param array|null $themeParams
     * @return WebViewResult|null
     * @see https://core.telegram.org/method/messages.requestSimpleWebView
     * @api
     */
    public function requestSimpleWebView(AbstractInputUser|string|int $bot, string $platform, ?bool $fromSwitchWebview = null, ?bool $fromSideMenu = null, ?bool $compact = null, ?bool $fullscreen = null, ?string $url = null, ?string $startParam = null, ?array $themeParams = null): ?WebViewResult
    {
        return $this->requestSimpleWebViewAsync(bot: $bot, platform: $platform, fromSwitchWebview: $fromSwitchWebview, fromSideMenu: $fromSideMenu, compact: $compact, fullscreen: $fullscreen, url: $url, startParam: $startParam, themeParams: $themeParams)->await();
    }

    /**
     * @param string $botQueryId
     * @param InputBotInlineResult|InputBotInlineResultPhoto|InputBotInlineResultDocument|InputBotInlineResultGame $result
     * @return Future<WebViewMessageSent|null>
     * @see https://core.telegram.org/method/messages.sendWebViewResultMessage
     * @api
     */
    public function sendWebViewResultMessageAsync(string $botQueryId, AbstractInputBotInlineResult $result): Future
    {
        return $this->client->call(new SendWebViewResultMessageRequest(botQueryId: $botQueryId, result: $result));
    }

    /**
     * @param string $botQueryId
     * @param InputBotInlineResult|InputBotInlineResultPhoto|InputBotInlineResultDocument|InputBotInlineResultGame $result
     * @return WebViewMessageSent|null
     * @see https://core.telegram.org/method/messages.sendWebViewResultMessage
     * @api
     */
    public function sendWebViewResultMessage(string $botQueryId, AbstractInputBotInlineResult $result): ?WebViewMessageSent
    {
        return $this->sendWebViewResultMessageAsync(botQueryId: $botQueryId, result: $result)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $buttonText
     * @param string $data
     * @param int|null $randomId
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.sendWebViewData
     * @api
     */
    public function sendWebViewDataAsync(AbstractInputUser|string|int $bot, string $buttonText, string $data, ?int $randomId = null): Future
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new SendWebViewDataRequest(bot: $bot, buttonText: $buttonText, data: $data, randomId: $randomId));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $buttonText
     * @param string $data
     * @param int|null $randomId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendWebViewData
     * @api
     */
    public function sendWebViewData(AbstractInputUser|string|int $bot, string $buttonText, string $data, ?int $randomId = null): ?AbstractUpdates
    {
        return $this->sendWebViewDataAsync(bot: $bot, buttonText: $buttonText, data: $data, randomId: $randomId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return Future<TranscribedAudio|null>
     * @see https://core.telegram.org/method/messages.transcribeAudio
     * @api
     */
    public function transcribeAudioAsync(AbstractInputPeer|string|int $peer, int $msgId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new TranscribeAudioRequest(peer: $peer, msgId: $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return TranscribedAudio|null
     * @see https://core.telegram.org/method/messages.transcribeAudio
     * @api
     */
    public function transcribeAudio(AbstractInputPeer|string|int $peer, int $msgId): ?TranscribedAudio
    {
        return $this->transcribeAudioAsync(peer: $peer, msgId: $msgId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param int $transcriptionId
     * @param bool $good
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.rateTranscribedAudio
     * @api
     */
    public function rateTranscribedAudioAsync(AbstractInputPeer|string|int $peer, int $msgId, int $transcriptionId, bool $good): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new RateTranscribedAudioRequest(peer: $peer, msgId: $msgId, transcriptionId: $transcriptionId, good: $good));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param int $transcriptionId
     * @param bool $good
     * @return bool
     * @see https://core.telegram.org/method/messages.rateTranscribedAudio
     * @api
     */
    public function rateTranscribedAudio(AbstractInputPeer|string|int $peer, int $msgId, int $transcriptionId, bool $good): bool
    {
        return (bool) $this->rateTranscribedAudioAsync(peer: $peer, msgId: $msgId, transcriptionId: $transcriptionId, good: $good)->await();
    }

    /**
     * @param list<int> $documentId
     * @return Future<list<DocumentEmpty|Document>>
     * @see https://core.telegram.org/method/messages.getCustomEmojiDocuments
     * @api
     */
    public function getCustomEmojiDocumentsAsync(array $documentId): Future
    {
        return $this->client->call(new GetCustomEmojiDocumentsRequest(documentId: $documentId));
    }

    /**
     * @param list<int> $documentId
     * @return list<DocumentEmpty|Document>
     * @see https://core.telegram.org/method/messages.getCustomEmojiDocuments
     * @api
     */
    public function getCustomEmojiDocuments(array $documentId): array
    {
        return $this->getCustomEmojiDocumentsAsync(documentId: $documentId)->await();
    }

    /**
     * @param int $hash
     * @return Future<AllStickersNotModified|AllStickers|null>
     * @see https://core.telegram.org/method/messages.getEmojiStickers
     * @api
     */
    public function getEmojiStickersAsync(int $hash): Future
    {
        return $this->client->call(new GetEmojiStickersRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return AllStickersNotModified|AllStickers|null
     * @see https://core.telegram.org/method/messages.getEmojiStickers
     * @api
     */
    public function getEmojiStickers(int $hash): ?AbstractAllStickers
    {
        return $this->getEmojiStickersAsync(hash: $hash)->await();
    }

    /**
     * @param int $hash
     * @return Future<FeaturedStickersNotModified|FeaturedStickers|null>
     * @see https://core.telegram.org/method/messages.getFeaturedEmojiStickers
     * @api
     */
    public function getFeaturedEmojiStickersAsync(int $hash): Future
    {
        return $this->client->call(new GetFeaturedEmojiStickersRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return FeaturedStickersNotModified|FeaturedStickers|null
     * @see https://core.telegram.org/method/messages.getFeaturedEmojiStickers
     * @api
     */
    public function getFeaturedEmojiStickers(int $hash): ?AbstractFeaturedStickers
    {
        return $this->getFeaturedEmojiStickersAsync(hash: $hash)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $reactionPeer
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.reportReaction
     * @api
     */
    public function reportReactionAsync(AbstractInputPeer|string|int $peer, int $id, AbstractInputPeer|string|int $reactionPeer): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($reactionPeer) || is_int($reactionPeer)) {
            $reactionPeer = $this->client->peerManager->resolve($reactionPeer);
        }
        return $this->client->call(new ReportReactionRequest(peer: $peer, id: $id, reactionPeer: $reactionPeer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $reactionPeer
     * @return bool
     * @see https://core.telegram.org/method/messages.reportReaction
     * @api
     */
    public function reportReaction(AbstractInputPeer|string|int $peer, int $id, AbstractInputPeer|string|int $reactionPeer): bool
    {
        return (bool) $this->reportReactionAsync(peer: $peer, id: $id, reactionPeer: $reactionPeer)->await();
    }

    /**
     * @param int $limit
     * @param int $hash
     * @return Future<ReactionsNotModified|Reactions|null>
     * @see https://core.telegram.org/method/messages.getTopReactions
     * @api
     */
    public function getTopReactionsAsync(int $limit, int $hash): Future
    {
        return $this->client->call(new GetTopReactionsRequest(limit: $limit, hash: $hash));
    }

    /**
     * @param int $limit
     * @param int $hash
     * @return ReactionsNotModified|Reactions|null
     * @see https://core.telegram.org/method/messages.getTopReactions
     * @api
     */
    public function getTopReactions(int $limit, int $hash): ?AbstractReactions
    {
        return $this->getTopReactionsAsync(limit: $limit, hash: $hash)->await();
    }

    /**
     * @param int $limit
     * @param int $hash
     * @return Future<ReactionsNotModified|Reactions|null>
     * @see https://core.telegram.org/method/messages.getRecentReactions
     * @api
     */
    public function getRecentReactionsAsync(int $limit, int $hash): Future
    {
        return $this->client->call(new GetRecentReactionsRequest(limit: $limit, hash: $hash));
    }

    /**
     * @param int $limit
     * @param int $hash
     * @return ReactionsNotModified|Reactions|null
     * @see https://core.telegram.org/method/messages.getRecentReactions
     * @api
     */
    public function getRecentReactions(int $limit, int $hash): ?AbstractReactions
    {
        return $this->getRecentReactionsAsync(limit: $limit, hash: $hash)->await();
    }

    /**
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.clearRecentReactions
     * @api
     */
    public function clearRecentReactionsAsync(): Future
    {
        return $this->client->call(new ClearRecentReactionsRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/messages.clearRecentReactions
     * @api
     */
    public function clearRecentReactions(): bool
    {
        return (bool) $this->clearRecentReactionsAsync()->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.getExtendedMedia
     * @api
     */
    public function getExtendedMediaAsync(AbstractInputPeer|string|int $peer, array $id): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetExtendedMediaRequest(peer: $peer, id: $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.getExtendedMedia
     * @api
     */
    public function getExtendedMedia(AbstractInputPeer|string|int $peer, array $id): ?AbstractUpdates
    {
        return $this->getExtendedMediaAsync(peer: $peer, id: $id)->await();
    }

    /**
     * @param int $period
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.setDefaultHistoryTTL
     * @api
     */
    public function setDefaultHistoryTTLAsync(int $period): Future
    {
        return $this->client->call(new SetDefaultHistoryTTLRequest(period: $period));
    }

    /**
     * @param int $period
     * @return bool
     * @see https://core.telegram.org/method/messages.setDefaultHistoryTTL
     * @api
     */
    public function setDefaultHistoryTTL(int $period): bool
    {
        return (bool) $this->setDefaultHistoryTTLAsync(period: $period)->await();
    }

    /**
     * @return Future<DefaultHistoryTTL|null>
     * @see https://core.telegram.org/method/messages.getDefaultHistoryTTL
     * @api
     */
    public function getDefaultHistoryTTLAsync(): Future
    {
        return $this->client->call(new GetDefaultHistoryTTLRequest());
    }

    /**
     * @return DefaultHistoryTTL|null
     * @see https://core.telegram.org/method/messages.getDefaultHistoryTTL
     * @api
     */
    public function getDefaultHistoryTTL(): ?DefaultHistoryTTL
    {
        return $this->getDefaultHistoryTTLAsync()->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param int $buttonId
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $requestedPeers
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.sendBotRequestedPeer
     * @api
     */
    public function sendBotRequestedPeerAsync(AbstractInputPeer|string|int $peer, int $msgId, int $buttonId, array $requestedPeers): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new SendBotRequestedPeerRequest(peer: $peer, msgId: $msgId, buttonId: $buttonId, requestedPeers: $requestedPeers));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param int $buttonId
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $requestedPeers
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendBotRequestedPeer
     * @api
     */
    public function sendBotRequestedPeer(AbstractInputPeer|string|int $peer, int $msgId, int $buttonId, array $requestedPeers): ?AbstractUpdates
    {
        return $this->sendBotRequestedPeerAsync(peer: $peer, msgId: $msgId, buttonId: $buttonId, requestedPeers: $requestedPeers)->await();
    }

    /**
     * @param int $hash
     * @return Future<EmojiGroupsNotModified|EmojiGroups|null>
     * @see https://core.telegram.org/method/messages.getEmojiGroups
     * @api
     */
    public function getEmojiGroupsAsync(int $hash): Future
    {
        return $this->client->call(new GetEmojiGroupsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return EmojiGroupsNotModified|EmojiGroups|null
     * @see https://core.telegram.org/method/messages.getEmojiGroups
     * @api
     */
    public function getEmojiGroups(int $hash): ?AbstractEmojiGroups
    {
        return $this->getEmojiGroupsAsync(hash: $hash)->await();
    }

    /**
     * @param int $hash
     * @return Future<EmojiGroupsNotModified|EmojiGroups|null>
     * @see https://core.telegram.org/method/messages.getEmojiStatusGroups
     * @api
     */
    public function getEmojiStatusGroupsAsync(int $hash): Future
    {
        return $this->client->call(new GetEmojiStatusGroupsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return EmojiGroupsNotModified|EmojiGroups|null
     * @see https://core.telegram.org/method/messages.getEmojiStatusGroups
     * @api
     */
    public function getEmojiStatusGroups(int $hash): ?AbstractEmojiGroups
    {
        return $this->getEmojiStatusGroupsAsync(hash: $hash)->await();
    }

    /**
     * @param int $hash
     * @return Future<EmojiGroupsNotModified|EmojiGroups|null>
     * @see https://core.telegram.org/method/messages.getEmojiProfilePhotoGroups
     * @api
     */
    public function getEmojiProfilePhotoGroupsAsync(int $hash): Future
    {
        return $this->client->call(new GetEmojiProfilePhotoGroupsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return EmojiGroupsNotModified|EmojiGroups|null
     * @see https://core.telegram.org/method/messages.getEmojiProfilePhotoGroups
     * @api
     */
    public function getEmojiProfilePhotoGroups(int $hash): ?AbstractEmojiGroups
    {
        return $this->getEmojiProfilePhotoGroupsAsync(hash: $hash)->await();
    }

    /**
     * @param string $emoticon
     * @param int $hash
     * @return Future<EmojiListNotModified|EmojiList|null>
     * @see https://core.telegram.org/method/messages.searchCustomEmoji
     * @api
     */
    public function searchCustomEmojiAsync(string $emoticon, int $hash): Future
    {
        return $this->client->call(new SearchCustomEmojiRequest(emoticon: $emoticon, hash: $hash));
    }

    /**
     * @param string $emoticon
     * @param int $hash
     * @return EmojiListNotModified|EmojiList|null
     * @see https://core.telegram.org/method/messages.searchCustomEmoji
     * @api
     */
    public function searchCustomEmoji(string $emoticon, int $hash): ?AbstractEmojiList
    {
        return $this->searchCustomEmojiAsync(emoticon: $emoticon, hash: $hash)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $disabled
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.togglePeerTranslations
     * @api
     */
    public function togglePeerTranslationsAsync(AbstractInputPeer|string|int $peer, ?bool $disabled = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new TogglePeerTranslationsRequest(peer: $peer, disabled: $disabled));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $disabled
     * @return bool
     * @see https://core.telegram.org/method/messages.togglePeerTranslations
     * @api
     */
    public function togglePeerTranslations(AbstractInputPeer|string|int $peer, ?bool $disabled = null): bool
    {
        return (bool) $this->togglePeerTranslationsAsync(peer: $peer, disabled: $disabled)->await();
    }

    /**
     * @param InputBotAppID|InputBotAppShortName $app
     * @param int $hash
     * @return Future<BotApp|null>
     * @see https://core.telegram.org/method/messages.getBotApp
     * @api
     */
    public function getBotAppAsync(AbstractInputBotApp $app, int $hash): Future
    {
        return $this->client->call(new GetBotAppRequest(app: $app, hash: $hash));
    }

    /**
     * @param InputBotAppID|InputBotAppShortName $app
     * @param int $hash
     * @return BotApp|null
     * @see https://core.telegram.org/method/messages.getBotApp
     * @api
     */
    public function getBotApp(AbstractInputBotApp $app, int $hash): ?BotApp
    {
        return $this->getBotAppAsync(app: $app, hash: $hash)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputBotAppID|InputBotAppShortName $app
     * @param string $platform
     * @param bool|null $writeAllowed
     * @param bool|null $compact
     * @param bool|null $fullscreen
     * @param string|null $startParam
     * @param array|null $themeParams
     * @return Future<WebViewResult|null>
     * @see https://core.telegram.org/method/messages.requestAppWebView
     * @api
     */
    public function requestAppWebViewAsync(AbstractInputPeer|string|int $peer, AbstractInputBotApp $app, string $platform, ?bool $writeAllowed = null, ?bool $compact = null, ?bool $fullscreen = null, ?string $startParam = null, ?array $themeParams = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new RequestAppWebViewRequest(peer: $peer, app: $app, platform: $platform, writeAllowed: $writeAllowed, compact: $compact, fullscreen: $fullscreen, startParam: $startParam, themeParams: $themeParams));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputBotAppID|InputBotAppShortName $app
     * @param string $platform
     * @param bool|null $writeAllowed
     * @param bool|null $compact
     * @param bool|null $fullscreen
     * @param string|null $startParam
     * @param array|null $themeParams
     * @return WebViewResult|null
     * @see https://core.telegram.org/method/messages.requestAppWebView
     * @api
     */
    public function requestAppWebView(AbstractInputPeer|string|int $peer, AbstractInputBotApp $app, string $platform, ?bool $writeAllowed = null, ?bool $compact = null, ?bool $fullscreen = null, ?string $startParam = null, ?array $themeParams = null): ?WebViewResult
    {
        return $this->requestAppWebViewAsync(peer: $peer, app: $app, platform: $platform, writeAllowed: $writeAllowed, compact: $compact, fullscreen: $fullscreen, startParam: $startParam, themeParams: $themeParams)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $forBoth
     * @param bool|null $revert
     * @param InputWallPaper|InputWallPaperSlug|InputWallPaperNoFile|null $wallpaper
     * @param WallPaperSettings|null $settings
     * @param int|null $id
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.setChatWallPaper
     * @api
     */
    public function setChatWallPaperAsync(AbstractInputPeer|string|int $peer, ?bool $forBoth = null, ?bool $revert = null, ?AbstractInputWallPaper $wallpaper = null, ?WallPaperSettings $settings = null, ?int $id = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new SetChatWallPaperRequest(peer: $peer, forBoth: $forBoth, revert: $revert, wallpaper: $wallpaper, settings: $settings, id: $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $forBoth
     * @param bool|null $revert
     * @param InputWallPaper|InputWallPaperSlug|InputWallPaperNoFile|null $wallpaper
     * @param WallPaperSettings|null $settings
     * @param int|null $id
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.setChatWallPaper
     * @api
     */
    public function setChatWallPaper(AbstractInputPeer|string|int $peer, ?bool $forBoth = null, ?bool $revert = null, ?AbstractInputWallPaper $wallpaper = null, ?WallPaperSettings $settings = null, ?int $id = null): ?AbstractUpdates
    {
        return $this->setChatWallPaperAsync(peer: $peer, forBoth: $forBoth, revert: $revert, wallpaper: $wallpaper, settings: $settings, id: $id)->await();
    }

    /**
     * @param string $q
     * @param int $hash
     * @param bool|null $excludeFeatured
     * @return Future<FoundStickerSetsNotModified|FoundStickerSets|null>
     * @see https://core.telegram.org/method/messages.searchEmojiStickerSets
     * @api
     */
    public function searchEmojiStickerSetsAsync(string $q, int $hash, ?bool $excludeFeatured = null): Future
    {
        return $this->client->call(new SearchEmojiStickerSetsRequest(q: $q, hash: $hash, excludeFeatured: $excludeFeatured));
    }

    /**
     * @param string $q
     * @param int $hash
     * @param bool|null $excludeFeatured
     * @return FoundStickerSetsNotModified|FoundStickerSets|null
     * @see https://core.telegram.org/method/messages.searchEmojiStickerSets
     * @api
     */
    public function searchEmojiStickerSets(string $q, int $hash, ?bool $excludeFeatured = null): ?AbstractFoundStickerSets
    {
        return $this->searchEmojiStickerSetsAsync(q: $q, hash: $hash, excludeFeatured: $excludeFeatured)->await();
    }

    /**
     * @param int $offsetDate
     * @param int $offsetId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $offsetPeer
     * @param int $limit
     * @param int $hash
     * @param bool|null $excludePinned
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @return Future<SavedDialogs|SavedDialogsSlice|SavedDialogsNotModified|null>
     * @see https://core.telegram.org/method/messages.getSavedDialogs
     * @api
     */
    public function getSavedDialogsAsync(int $offsetDate, int $offsetId, AbstractInputPeer|string|int $offsetPeer, int $limit, int $hash, ?bool $excludePinned = null, AbstractInputPeer|string|int|null $parentPeer = null): Future
    {
        if (is_string($parentPeer) || is_int($parentPeer)) {
            $parentPeer = $this->client->peerManager->resolve($parentPeer);
        }
        if (is_string($offsetPeer) || is_int($offsetPeer)) {
            $offsetPeer = $this->client->peerManager->resolve($offsetPeer);
        }
        return $this->client->call(new GetSavedDialogsRequest(offsetDate: $offsetDate, offsetId: $offsetId, offsetPeer: $offsetPeer, limit: $limit, hash: $hash, excludePinned: $excludePinned, parentPeer: $parentPeer));
    }

    /**
     * @param int $offsetDate
     * @param int $offsetId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $offsetPeer
     * @param int $limit
     * @param int $hash
     * @param bool|null $excludePinned
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @return SavedDialogs|SavedDialogsSlice|SavedDialogsNotModified|null
     * @see https://core.telegram.org/method/messages.getSavedDialogs
     * @api
     */
    public function getSavedDialogs(int $offsetDate, int $offsetId, AbstractInputPeer|string|int $offsetPeer, int $limit, int $hash, ?bool $excludePinned = null, AbstractInputPeer|string|int|null $parentPeer = null): ?AbstractSavedDialogs
    {
        return $this->getSavedDialogsAsync(offsetDate: $offsetDate, offsetId: $offsetId, offsetPeer: $offsetPeer, limit: $limit, hash: $hash, excludePinned: $excludePinned, parentPeer: $parentPeer)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $offsetId
     * @param int $offsetDate
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int $hash
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @return Future<Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null>
     * @see https://core.telegram.org/method/messages.getSavedHistory
     * @api
     */
    public function getSavedHistoryAsync(AbstractInputPeer|string|int $peer, int $offsetId, int $offsetDate, int $addOffset, int $limit, int $maxId, int $minId, int $hash, AbstractInputPeer|string|int|null $parentPeer = null): Future
    {
        if (is_string($parentPeer) || is_int($parentPeer)) {
            $parentPeer = $this->client->peerManager->resolve($parentPeer);
        }
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetSavedHistoryRequest(peer: $peer, offsetId: $offsetId, offsetDate: $offsetDate, addOffset: $addOffset, limit: $limit, maxId: $maxId, minId: $minId, hash: $hash, parentPeer: $parentPeer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $offsetId
     * @param int $offsetDate
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int $hash
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getSavedHistory
     * @api
     */
    public function getSavedHistory(AbstractInputPeer|string|int $peer, int $offsetId, int $offsetDate, int $addOffset, int $limit, int $maxId, int $minId, int $hash, AbstractInputPeer|string|int|null $parentPeer = null): ?AbstractMessages
    {
        return $this->getSavedHistoryAsync(peer: $peer, offsetId: $offsetId, offsetDate: $offsetDate, addOffset: $addOffset, limit: $limit, maxId: $maxId, minId: $minId, hash: $hash, parentPeer: $parentPeer)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $maxId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @param int|null $minDate
     * @param int|null $maxDate
     * @return Future<AffectedHistory|null>
     * @see https://core.telegram.org/method/messages.deleteSavedHistory
     * @api
     */
    public function deleteSavedHistoryAsync(AbstractInputPeer|string|int $peer, int $maxId, AbstractInputPeer|string|int|null $parentPeer = null, ?int $minDate = null, ?int $maxDate = null): Future
    {
        if (is_string($parentPeer) || is_int($parentPeer)) {
            $parentPeer = $this->client->peerManager->resolve($parentPeer);
        }
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new DeleteSavedHistoryRequest(peer: $peer, maxId: $maxId, parentPeer: $parentPeer, minDate: $minDate, maxDate: $maxDate));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $maxId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @param int|null $minDate
     * @param int|null $maxDate
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/messages.deleteSavedHistory
     * @api
     */
    public function deleteSavedHistory(AbstractInputPeer|string|int $peer, int $maxId, AbstractInputPeer|string|int|null $parentPeer = null, ?int $minDate = null, ?int $maxDate = null): ?AffectedHistory
    {
        return $this->deleteSavedHistoryAsync(peer: $peer, maxId: $maxId, parentPeer: $parentPeer, minDate: $minDate, maxDate: $maxDate)->await();
    }

    /**
     * @return Future<SavedDialogs|SavedDialogsSlice|SavedDialogsNotModified|null>
     * @see https://core.telegram.org/method/messages.getPinnedSavedDialogs
     * @api
     */
    public function getPinnedSavedDialogsAsync(): Future
    {
        return $this->client->call(new GetPinnedSavedDialogsRequest());
    }

    /**
     * @return SavedDialogs|SavedDialogsSlice|SavedDialogsNotModified|null
     * @see https://core.telegram.org/method/messages.getPinnedSavedDialogs
     * @api
     */
    public function getPinnedSavedDialogs(): ?AbstractSavedDialogs
    {
        return $this->getPinnedSavedDialogsAsync()->await();
    }

    /**
     * @param InputDialogPeer|InputDialogPeerFolder $peer
     * @param bool|null $pinned
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.toggleSavedDialogPin
     * @api
     */
    public function toggleSavedDialogPinAsync(AbstractInputDialogPeer $peer, ?bool $pinned = null): Future
    {
        return $this->client->call(new ToggleSavedDialogPinRequest(peer: $peer, pinned: $pinned));
    }

    /**
     * @param InputDialogPeer|InputDialogPeerFolder $peer
     * @param bool|null $pinned
     * @return bool
     * @see https://core.telegram.org/method/messages.toggleSavedDialogPin
     * @api
     */
    public function toggleSavedDialogPin(AbstractInputDialogPeer $peer, ?bool $pinned = null): bool
    {
        return (bool) $this->toggleSavedDialogPinAsync(peer: $peer, pinned: $pinned)->await();
    }

    /**
     * @param list<InputDialogPeer|InputDialogPeerFolder> $order
     * @param bool|null $force
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.reorderPinnedSavedDialogs
     * @api
     */
    public function reorderPinnedSavedDialogsAsync(array $order, ?bool $force = null): Future
    {
        return $this->client->call(new ReorderPinnedSavedDialogsRequest(order: $order, force: $force));
    }

    /**
     * @param list<InputDialogPeer|InputDialogPeerFolder> $order
     * @param bool|null $force
     * @return bool
     * @see https://core.telegram.org/method/messages.reorderPinnedSavedDialogs
     * @api
     */
    public function reorderPinnedSavedDialogs(array $order, ?bool $force = null): bool
    {
        return (bool) $this->reorderPinnedSavedDialogsAsync(order: $order, force: $force)->await();
    }

    /**
     * @param int $hash
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $peer
     * @return Future<SavedReactionTagsNotModified|SavedReactionTags|null>
     * @see https://core.telegram.org/method/messages.getSavedReactionTags
     * @api
     */
    public function getSavedReactionTagsAsync(int $hash, AbstractInputPeer|string|int|null $peer = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetSavedReactionTagsRequest(hash: $hash, peer: $peer));
    }

    /**
     * @param int $hash
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $peer
     * @return SavedReactionTagsNotModified|SavedReactionTags|null
     * @see https://core.telegram.org/method/messages.getSavedReactionTags
     * @api
     */
    public function getSavedReactionTags(int $hash, AbstractInputPeer|string|int|null $peer = null): ?AbstractSavedReactionTags
    {
        return $this->getSavedReactionTagsAsync(hash: $hash, peer: $peer)->await();
    }

    /**
     * @param ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid $reaction
     * @param string|null $title
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.updateSavedReactionTag
     * @api
     */
    public function updateSavedReactionTagAsync(AbstractReaction $reaction, ?string $title = null): Future
    {
        return $this->client->call(new UpdateSavedReactionTagRequest(reaction: $reaction, title: $title));
    }

    /**
     * @param ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid $reaction
     * @param string|null $title
     * @return bool
     * @see https://core.telegram.org/method/messages.updateSavedReactionTag
     * @api
     */
    public function updateSavedReactionTag(AbstractReaction $reaction, ?string $title = null): bool
    {
        return (bool) $this->updateSavedReactionTagAsync(reaction: $reaction, title: $title)->await();
    }

    /**
     * @param int $hash
     * @return Future<ReactionsNotModified|Reactions|null>
     * @see https://core.telegram.org/method/messages.getDefaultTagReactions
     * @api
     */
    public function getDefaultTagReactionsAsync(int $hash): Future
    {
        return $this->client->call(new GetDefaultTagReactionsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return ReactionsNotModified|Reactions|null
     * @see https://core.telegram.org/method/messages.getDefaultTagReactions
     * @api
     */
    public function getDefaultTagReactions(int $hash): ?AbstractReactions
    {
        return $this->getDefaultTagReactionsAsync(hash: $hash)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return Future<OutboxReadDate|null>
     * @see https://core.telegram.org/method/messages.getOutboxReadDate
     * @api
     */
    public function getOutboxReadDateAsync(AbstractInputPeer|string|int $peer, int $msgId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetOutboxReadDateRequest(peer: $peer, msgId: $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return OutboxReadDate|null
     * @see https://core.telegram.org/method/messages.getOutboxReadDate
     * @api
     */
    public function getOutboxReadDate(AbstractInputPeer|string|int $peer, int $msgId): ?OutboxReadDate
    {
        return $this->getOutboxReadDateAsync(peer: $peer, msgId: $msgId)->await();
    }

    /**
     * @param int $hash
     * @return Future<QuickReplies|QuickRepliesNotModified|null>
     * @see https://core.telegram.org/method/messages.getQuickReplies
     * @api
     */
    public function getQuickRepliesAsync(int $hash): Future
    {
        return $this->client->call(new GetQuickRepliesRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return QuickReplies|QuickRepliesNotModified|null
     * @see https://core.telegram.org/method/messages.getQuickReplies
     * @api
     */
    public function getQuickReplies(int $hash): ?AbstractQuickReplies
    {
        return $this->getQuickRepliesAsync(hash: $hash)->await();
    }

    /**
     * @param list<int> $order
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.reorderQuickReplies
     * @api
     */
    public function reorderQuickRepliesAsync(array $order): Future
    {
        return $this->client->call(new ReorderQuickRepliesRequest(order: $order));
    }

    /**
     * @param list<int> $order
     * @return bool
     * @see https://core.telegram.org/method/messages.reorderQuickReplies
     * @api
     */
    public function reorderQuickReplies(array $order): bool
    {
        return (bool) $this->reorderQuickRepliesAsync(order: $order)->await();
    }

    /**
     * @param string $shortcut
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.checkQuickReplyShortcut
     * @api
     */
    public function checkQuickReplyShortcutAsync(string $shortcut): Future
    {
        return $this->client->call(new CheckQuickReplyShortcutRequest(shortcut: $shortcut));
    }

    /**
     * @param string $shortcut
     * @return bool
     * @see https://core.telegram.org/method/messages.checkQuickReplyShortcut
     * @api
     */
    public function checkQuickReplyShortcut(string $shortcut): bool
    {
        return (bool) $this->checkQuickReplyShortcutAsync(shortcut: $shortcut)->await();
    }

    /**
     * @param int $shortcutId
     * @param string $shortcut
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.editQuickReplyShortcut
     * @api
     */
    public function editQuickReplyShortcutAsync(int $shortcutId, string $shortcut): Future
    {
        return $this->client->call(new EditQuickReplyShortcutRequest(shortcutId: $shortcutId, shortcut: $shortcut));
    }

    /**
     * @param int $shortcutId
     * @param string $shortcut
     * @return bool
     * @see https://core.telegram.org/method/messages.editQuickReplyShortcut
     * @api
     */
    public function editQuickReplyShortcut(int $shortcutId, string $shortcut): bool
    {
        return (bool) $this->editQuickReplyShortcutAsync(shortcutId: $shortcutId, shortcut: $shortcut)->await();
    }

    /**
     * @param int $shortcutId
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.deleteQuickReplyShortcut
     * @api
     */
    public function deleteQuickReplyShortcutAsync(int $shortcutId): Future
    {
        return $this->client->call(new DeleteQuickReplyShortcutRequest(shortcutId: $shortcutId));
    }

    /**
     * @param int $shortcutId
     * @return bool
     * @see https://core.telegram.org/method/messages.deleteQuickReplyShortcut
     * @api
     */
    public function deleteQuickReplyShortcut(int $shortcutId): bool
    {
        return (bool) $this->deleteQuickReplyShortcutAsync(shortcutId: $shortcutId)->await();
    }

    /**
     * @param int $shortcutId
     * @param int $hash
     * @param list<int>|null $id
     * @return Future<Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null>
     * @see https://core.telegram.org/method/messages.getQuickReplyMessages
     * @api
     */
    public function getQuickReplyMessagesAsync(int $shortcutId, int $hash, ?array $id = null): Future
    {
        return $this->client->call(new GetQuickReplyMessagesRequest(shortcutId: $shortcutId, hash: $hash, id: $id));
    }

    /**
     * @param int $shortcutId
     * @param int $hash
     * @param list<int>|null $id
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getQuickReplyMessages
     * @api
     */
    public function getQuickReplyMessages(int $shortcutId, int $hash, ?array $id = null): ?AbstractMessages
    {
        return $this->getQuickReplyMessagesAsync(shortcutId: $shortcutId, hash: $hash, id: $id)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $shortcutId
     * @param list<int> $id
     * @param list<int>|null $randomId
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.sendQuickReplyMessages
     * @api
     */
    public function sendQuickReplyMessagesAsync(AbstractInputPeer|string|int $peer, int $shortcutId, array $id, ?array $randomId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new SendQuickReplyMessagesRequest(peer: $peer, shortcutId: $shortcutId, id: $id, randomId: $randomId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $shortcutId
     * @param list<int> $id
     * @param list<int>|null $randomId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendQuickReplyMessages
     * @api
     */
    public function sendQuickReplyMessages(AbstractInputPeer|string|int $peer, int $shortcutId, array $id, ?array $randomId = null): ?AbstractUpdates
    {
        return $this->sendQuickReplyMessagesAsync(peer: $peer, shortcutId: $shortcutId, id: $id, randomId: $randomId)->await();
    }

    /**
     * @param int $shortcutId
     * @param list<int> $id
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.deleteQuickReplyMessages
     * @api
     */
    public function deleteQuickReplyMessagesAsync(int $shortcutId, array $id): Future
    {
        return $this->client->call(new DeleteQuickReplyMessagesRequest(shortcutId: $shortcutId, id: $id));
    }

    /**
     * @param int $shortcutId
     * @param list<int> $id
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.deleteQuickReplyMessages
     * @api
     */
    public function deleteQuickReplyMessages(int $shortcutId, array $id): ?AbstractUpdates
    {
        return $this->deleteQuickReplyMessagesAsync(shortcutId: $shortcutId, id: $id)->await();
    }

    /**
     * @param bool $enabled
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.toggleDialogFilterTags
     * @api
     */
    public function toggleDialogFilterTagsAsync(bool $enabled): Future
    {
        return $this->client->call(new ToggleDialogFilterTagsRequest(enabled: $enabled));
    }

    /**
     * @param bool $enabled
     * @return bool
     * @see https://core.telegram.org/method/messages.toggleDialogFilterTags
     * @api
     */
    public function toggleDialogFilterTags(bool $enabled): bool
    {
        return (bool) $this->toggleDialogFilterTagsAsync(enabled: $enabled)->await();
    }

    /**
     * @param int $offsetId
     * @param int $limit
     * @return Future<MyStickers|null>
     * @see https://core.telegram.org/method/messages.getMyStickers
     * @api
     */
    public function getMyStickersAsync(int $offsetId, int $limit): Future
    {
        return $this->client->call(new GetMyStickersRequest(offsetId: $offsetId, limit: $limit));
    }

    /**
     * @param int $offsetId
     * @param int $limit
     * @return MyStickers|null
     * @see https://core.telegram.org/method/messages.getMyStickers
     * @api
     */
    public function getMyStickers(int $offsetId, int $limit): ?MyStickers
    {
        return $this->getMyStickersAsync(offsetId: $offsetId, limit: $limit)->await();
    }

    /**
     * @param int $hash
     * @return Future<EmojiGroupsNotModified|EmojiGroups|null>
     * @see https://core.telegram.org/method/messages.getEmojiStickerGroups
     * @api
     */
    public function getEmojiStickerGroupsAsync(int $hash): Future
    {
        return $this->client->call(new GetEmojiStickerGroupsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return EmojiGroupsNotModified|EmojiGroups|null
     * @see https://core.telegram.org/method/messages.getEmojiStickerGroups
     * @api
     */
    public function getEmojiStickerGroups(int $hash): ?AbstractEmojiGroups
    {
        return $this->getEmojiStickerGroupsAsync(hash: $hash)->await();
    }

    /**
     * @param int $hash
     * @return Future<AvailableEffectsNotModified|AvailableEffects|null>
     * @see https://core.telegram.org/method/messages.getAvailableEffects
     * @api
     */
    public function getAvailableEffectsAsync(int $hash): Future
    {
        return $this->client->call(new GetAvailableEffectsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return AvailableEffectsNotModified|AvailableEffects|null
     * @see https://core.telegram.org/method/messages.getAvailableEffects
     * @api
     */
    public function getAvailableEffects(int $hash): ?AbstractAvailableEffects
    {
        return $this->getAvailableEffectsAsync(hash: $hash)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param TextWithEntities $text
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.editFactCheck
     * @api
     */
    public function editFactCheckAsync(AbstractInputPeer|string|int $peer, int $msgId, TextWithEntities $text): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new EditFactCheckRequest(peer: $peer, msgId: $msgId, text: $text));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param TextWithEntities $text
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.editFactCheck
     * @api
     */
    public function editFactCheck(AbstractInputPeer|string|int $peer, int $msgId, TextWithEntities $text): ?AbstractUpdates
    {
        return $this->editFactCheckAsync(peer: $peer, msgId: $msgId, text: $text)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.deleteFactCheck
     * @api
     */
    public function deleteFactCheckAsync(AbstractInputPeer|string|int $peer, int $msgId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new DeleteFactCheckRequest(peer: $peer, msgId: $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.deleteFactCheck
     * @api
     */
    public function deleteFactCheck(AbstractInputPeer|string|int $peer, int $msgId): ?AbstractUpdates
    {
        return $this->deleteFactCheckAsync(peer: $peer, msgId: $msgId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $msgId
     * @return Future<list<FactCheck>>
     * @see https://core.telegram.org/method/messages.getFactCheck
     * @api
     */
    public function getFactCheckAsync(AbstractInputPeer|string|int $peer, array $msgId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetFactCheckRequest(peer: $peer, msgId: $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $msgId
     * @return list<FactCheck>
     * @see https://core.telegram.org/method/messages.getFactCheck
     * @api
     */
    public function getFactCheck(AbstractInputPeer|string|int $peer, array $msgId): array
    {
        return $this->getFactCheckAsync(peer: $peer, msgId: $msgId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $platform
     * @param bool|null $compact
     * @param bool|null $fullscreen
     * @param string|null $startParam
     * @param array|null $themeParams
     * @return Future<WebViewResult|null>
     * @see https://core.telegram.org/method/messages.requestMainWebView
     * @api
     */
    public function requestMainWebViewAsync(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $bot, string $platform, ?bool $compact = null, ?bool $fullscreen = null, ?string $startParam = null, ?array $themeParams = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return $this->client->call(new RequestMainWebViewRequest(peer: $peer, bot: $bot, platform: $platform, compact: $compact, fullscreen: $fullscreen, startParam: $startParam, themeParams: $themeParams));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $platform
     * @param bool|null $compact
     * @param bool|null $fullscreen
     * @param string|null $startParam
     * @param array|null $themeParams
     * @return WebViewResult|null
     * @see https://core.telegram.org/method/messages.requestMainWebView
     * @api
     */
    public function requestMainWebView(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $bot, string $platform, ?bool $compact = null, ?bool $fullscreen = null, ?string $startParam = null, ?array $themeParams = null): ?WebViewResult
    {
        return $this->requestMainWebViewAsync(peer: $peer, bot: $bot, platform: $platform, compact: $compact, fullscreen: $fullscreen, startParam: $startParam, themeParams: $themeParams)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param int $count
     * @param int|null $randomId
     * @param PaidReactionPrivacyDefault|PaidReactionPrivacyAnonymous|PaidReactionPrivacyPeer|null $private
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.sendPaidReaction
     * @api
     */
    public function sendPaidReactionAsync(AbstractInputPeer|string|int $peer, int $msgId, int $count, ?int $randomId = null, ?AbstractPaidReactionPrivacy $private = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new SendPaidReactionRequest(peer: $peer, msgId: $msgId, count: $count, randomId: $randomId, private: $private));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param int $count
     * @param int|null $randomId
     * @param PaidReactionPrivacyDefault|PaidReactionPrivacyAnonymous|PaidReactionPrivacyPeer|null $private
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendPaidReaction
     * @api
     */
    public function sendPaidReaction(AbstractInputPeer|string|int $peer, int $msgId, int $count, ?int $randomId = null, ?AbstractPaidReactionPrivacy $private = null): ?AbstractUpdates
    {
        return $this->sendPaidReactionAsync(peer: $peer, msgId: $msgId, count: $count, randomId: $randomId, private: $private)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param PaidReactionPrivacyDefault|PaidReactionPrivacyAnonymous|PaidReactionPrivacyPeer $private
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.togglePaidReactionPrivacy
     * @api
     */
    public function togglePaidReactionPrivacyAsync(AbstractInputPeer|string|int $peer, int $msgId, AbstractPaidReactionPrivacy $private): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new TogglePaidReactionPrivacyRequest(peer: $peer, msgId: $msgId, private: $private));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param PaidReactionPrivacyDefault|PaidReactionPrivacyAnonymous|PaidReactionPrivacyPeer $private
     * @return bool
     * @see https://core.telegram.org/method/messages.togglePaidReactionPrivacy
     * @api
     */
    public function togglePaidReactionPrivacy(AbstractInputPeer|string|int $peer, int $msgId, AbstractPaidReactionPrivacy $private): bool
    {
        return (bool) $this->togglePaidReactionPrivacyAsync(peer: $peer, msgId: $msgId, private: $private)->await();
    }

    /**
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.getPaidReactionPrivacy
     * @api
     */
    public function getPaidReactionPrivacyAsync(): Future
    {
        return $this->client->call(new GetPaidReactionPrivacyRequest());
    }

    /**
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.getPaidReactionPrivacy
     * @api
     */
    public function getPaidReactionPrivacy(): ?AbstractUpdates
    {
        return $this->getPaidReactionPrivacyAsync()->await();
    }

    /**
     * @param string|null $randomId
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.viewSponsoredMessage
     * @api
     */
    public function viewSponsoredMessageAsync(?string $randomId = null): Future
    {
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new ViewSponsoredMessageRequest(randomId: $randomId));
    }

    /**
     * @param string|null $randomId
     * @return bool
     * @see https://core.telegram.org/method/messages.viewSponsoredMessage
     * @api
     */
    public function viewSponsoredMessage(?string $randomId = null): bool
    {
        return (bool) $this->viewSponsoredMessageAsync(randomId: $randomId)->await();
    }

    /**
     * @param bool|null $media
     * @param bool|null $fullscreen
     * @param string|null $randomId
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.clickSponsoredMessage
     * @api
     */
    public function clickSponsoredMessageAsync(?bool $media = null, ?bool $fullscreen = null, ?string $randomId = null): Future
    {
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new ClickSponsoredMessageRequest(media: $media, fullscreen: $fullscreen, randomId: $randomId));
    }

    /**
     * @param bool|null $media
     * @param bool|null $fullscreen
     * @param string|null $randomId
     * @return bool
     * @see https://core.telegram.org/method/messages.clickSponsoredMessage
     * @api
     */
    public function clickSponsoredMessage(?bool $media = null, ?bool $fullscreen = null, ?string $randomId = null): bool
    {
        return (bool) $this->clickSponsoredMessageAsync(media: $media, fullscreen: $fullscreen, randomId: $randomId)->await();
    }

    /**
     * @param string $option
     * @param string|null $randomId
     * @return Future<SponsoredMessageReportResultChooseOption|SponsoredMessageReportResultAdsHidden|SponsoredMessageReportResultReported|null>
     * @see https://core.telegram.org/method/messages.reportSponsoredMessage
     * @api
     */
    public function reportSponsoredMessageAsync(string $option, ?string $randomId = null): Future
    {
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new ReportSponsoredMessageRequest(option: $option, randomId: $randomId));
    }

    /**
     * @param string $option
     * @param string|null $randomId
     * @return SponsoredMessageReportResultChooseOption|SponsoredMessageReportResultAdsHidden|SponsoredMessageReportResultReported|null
     * @see https://core.telegram.org/method/messages.reportSponsoredMessage
     * @api
     */
    public function reportSponsoredMessage(string $option, ?string $randomId = null): ?AbstractSponsoredMessageReportResult
    {
        return $this->reportSponsoredMessageAsync(option: $option, randomId: $randomId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int|null $msgId
     * @return Future<SponsoredMessages|SponsoredMessagesEmpty|null>
     * @see https://core.telegram.org/method/messages.getSponsoredMessages
     * @api
     */
    public function getSponsoredMessagesAsync(AbstractInputPeer|string|int $peer, ?int $msgId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetSponsoredMessagesRequest(peer: $peer, msgId: $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int|null $msgId
     * @return SponsoredMessages|SponsoredMessagesEmpty|null
     * @see https://core.telegram.org/method/messages.getSponsoredMessages
     * @api
     */
    public function getSponsoredMessages(AbstractInputPeer|string|int $peer, ?int $msgId = null): ?AbstractSponsoredMessages
    {
        return $this->getSponsoredMessagesAsync(peer: $peer, msgId: $msgId)->await();
    }

    /**
     * @param InputBotInlineResult|InputBotInlineResultPhoto|InputBotInlineResultDocument|InputBotInlineResultGame $result
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param list<InlineQueryPeerType>|null $peerTypes
     * @return Future<BotPreparedInlineMessage|null>
     * @see https://core.telegram.org/method/messages.savePreparedInlineMessage
     * @api
     */
    public function savePreparedInlineMessageAsync(AbstractInputBotInlineResult $result, AbstractInputUser|string|int $userId, ?array $peerTypes = null): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new SavePreparedInlineMessageRequest(result: $result, userId: $userId, peerTypes: $peerTypes));
    }

    /**
     * @param InputBotInlineResult|InputBotInlineResultPhoto|InputBotInlineResultDocument|InputBotInlineResultGame $result
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param list<InlineQueryPeerType>|null $peerTypes
     * @return BotPreparedInlineMessage|null
     * @see https://core.telegram.org/method/messages.savePreparedInlineMessage
     * @api
     */
    public function savePreparedInlineMessage(AbstractInputBotInlineResult $result, AbstractInputUser|string|int $userId, ?array $peerTypes = null): ?BotPreparedInlineMessage
    {
        return $this->savePreparedInlineMessageAsync(result: $result, userId: $userId, peerTypes: $peerTypes)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $id
     * @return Future<PreparedInlineMessage|null>
     * @see https://core.telegram.org/method/messages.getPreparedInlineMessage
     * @api
     */
    public function getPreparedInlineMessageAsync(AbstractInputUser|string|int $bot, string $id): Future
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return $this->client->call(new GetPreparedInlineMessageRequest(bot: $bot, id: $id));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param string $id
     * @return PreparedInlineMessage|null
     * @see https://core.telegram.org/method/messages.getPreparedInlineMessage
     * @api
     */
    public function getPreparedInlineMessage(AbstractInputUser|string|int $bot, string $id): ?PreparedInlineMessage
    {
        return $this->getPreparedInlineMessageAsync(bot: $bot, id: $id)->await();
    }

    /**
     * @param string $q
     * @param string $emoticon
     * @param list<string> $langCode
     * @param int $offset
     * @param int $limit
     * @param int $hash
     * @param bool|null $emojis
     * @return Future<FoundStickersNotModified|FoundStickers|null>
     * @see https://core.telegram.org/method/messages.searchStickers
     * @api
     */
    public function searchStickersAsync(string $q, string $emoticon, array $langCode, int $offset, int $limit, int $hash, ?bool $emojis = null): Future
    {
        return $this->client->call(new SearchStickersRequest(q: $q, emoticon: $emoticon, langCode: $langCode, offset: $offset, limit: $limit, hash: $hash, emojis: $emojis));
    }

    /**
     * @param string $q
     * @param string $emoticon
     * @param list<string> $langCode
     * @param int $offset
     * @param int $limit
     * @param int $hash
     * @param bool|null $emojis
     * @return FoundStickersNotModified|FoundStickers|null
     * @see https://core.telegram.org/method/messages.searchStickers
     * @api
     */
    public function searchStickers(string $q, string $emoticon, array $langCode, int $offset, int $limit, int $hash, ?bool $emojis = null): ?AbstractFoundStickers
    {
        return $this->searchStickersAsync(q: $q, emoticon: $emoticon, langCode: $langCode, offset: $offset, limit: $limit, hash: $hash, emojis: $emojis)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @param bool|null $push
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.reportMessagesDelivery
     * @api
     */
    public function reportMessagesDeliveryAsync(AbstractInputPeer|string|int $peer, array $id, ?bool $push = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ReportMessagesDeliveryRequest(peer: $peer, id: $id, push: $push));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $id
     * @param bool|null $push
     * @return bool
     * @see https://core.telegram.org/method/messages.reportMessagesDelivery
     * @api
     */
    public function reportMessagesDelivery(AbstractInputPeer|string|int $peer, array $id, ?bool $push = null): bool
    {
        return (bool) $this->reportMessagesDeliveryAsync(peer: $peer, id: $id, push: $push)->await();
    }

    /**
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $ids
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @return Future<SavedDialogs|SavedDialogsSlice|SavedDialogsNotModified|null>
     * @see https://core.telegram.org/method/messages.getSavedDialogsByID
     * @api
     */
    public function getSavedDialogsByIDAsync(array $ids, AbstractInputPeer|string|int|null $parentPeer = null): Future
    {
        if (is_string($parentPeer) || is_int($parentPeer)) {
            $parentPeer = $this->client->peerManager->resolve($parentPeer);
        }
        return $this->client->call(new GetSavedDialogsByIDRequest(ids: $ids, parentPeer: $parentPeer));
    }

    /**
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $ids
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @return SavedDialogs|SavedDialogsSlice|SavedDialogsNotModified|null
     * @see https://core.telegram.org/method/messages.getSavedDialogsByID
     * @api
     */
    public function getSavedDialogsByID(array $ids, AbstractInputPeer|string|int|null $parentPeer = null): ?AbstractSavedDialogs
    {
        return $this->getSavedDialogsByIDAsync(ids: $ids, parentPeer: $parentPeer)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $parentPeer
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $maxId
     * @return Future<bool>
     * @see https://core.telegram.org/method/messages.readSavedHistory
     * @api
     */
    public function readSavedHistoryAsync(AbstractInputPeer|string|int $parentPeer, AbstractInputPeer|string|int $peer, int $maxId): Future
    {
        if (is_string($parentPeer) || is_int($parentPeer)) {
            $parentPeer = $this->client->peerManager->resolve($parentPeer);
        }
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ReadSavedHistoryRequest(parentPeer: $parentPeer, peer: $peer, maxId: $maxId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $parentPeer
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $maxId
     * @return bool
     * @see https://core.telegram.org/method/messages.readSavedHistory
     * @api
     */
    public function readSavedHistory(AbstractInputPeer|string|int $parentPeer, AbstractInputPeer|string|int $peer, int $maxId): bool
    {
        return (bool) $this->readSavedHistoryAsync(parentPeer: $parentPeer, peer: $peer, maxId: $maxId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param list<int> $completed
     * @param list<int> $incompleted
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.toggleTodoCompleted
     * @api
     */
    public function toggleTodoCompletedAsync(AbstractInputPeer|string|int $peer, int $msgId, array $completed, array $incompleted): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ToggleTodoCompletedRequest(peer: $peer, msgId: $msgId, completed: $completed, incompleted: $incompleted));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param list<int> $completed
     * @param list<int> $incompleted
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.toggleTodoCompleted
     * @api
     */
    public function toggleTodoCompleted(AbstractInputPeer|string|int $peer, int $msgId, array $completed, array $incompleted): ?AbstractUpdates
    {
        return $this->toggleTodoCompletedAsync(peer: $peer, msgId: $msgId, completed: $completed, incompleted: $incompleted)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param list<TodoItem> $list_
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.appendTodoList
     * @api
     */
    public function appendTodoListAsync(AbstractInputPeer|string|int $peer, int $msgId, array $list_): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new AppendTodoListRequest(peer: $peer, msgId: $msgId, list_: $list_));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param list<TodoItem> $list_
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.appendTodoList
     * @api
     */
    public function appendTodoList(AbstractInputPeer|string|int $peer, int $msgId, array $list_): ?AbstractUpdates
    {
        return $this->appendTodoListAsync(peer: $peer, msgId: $msgId, list_: $list_)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param bool|null $reject
     * @param int|null $scheduleDate
     * @param string|null $rejectComment
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.toggleSuggestedPostApproval
     * @api
     */
    public function toggleSuggestedPostApprovalAsync(AbstractInputPeer|string|int $peer, int $msgId, ?bool $reject = null, ?int $scheduleDate = null, ?string $rejectComment = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ToggleSuggestedPostApprovalRequest(peer: $peer, msgId: $msgId, reject: $reject, scheduleDate: $scheduleDate, rejectComment: $rejectComment));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @param bool|null $reject
     * @param int|null $scheduleDate
     * @param string|null $rejectComment
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.toggleSuggestedPostApproval
     * @api
     */
    public function toggleSuggestedPostApproval(AbstractInputPeer|string|int $peer, int $msgId, ?bool $reject = null, ?int $scheduleDate = null, ?string $rejectComment = null): ?AbstractUpdates
    {
        return $this->toggleSuggestedPostApprovalAsync(peer: $peer, msgId: $msgId, reject: $reject, scheduleDate: $scheduleDate, rejectComment: $rejectComment)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $offsetDate
     * @param int $offsetId
     * @param int $offsetTopic
     * @param int $limit
     * @param string|null $q
     * @return Future<ForumTopics|null>
     * @see https://core.telegram.org/method/messages.getForumTopics
     * @api
     */
    public function getForumTopicsAsync(AbstractInputPeer|string|int $peer, int $offsetDate, int $offsetId, int $offsetTopic, int $limit, ?string $q = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetForumTopicsRequest(peer: $peer, offsetDate: $offsetDate, offsetId: $offsetId, offsetTopic: $offsetTopic, limit: $limit, q: $q));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $offsetDate
     * @param int $offsetId
     * @param int $offsetTopic
     * @param int $limit
     * @param string|null $q
     * @return ForumTopics|null
     * @see https://core.telegram.org/method/messages.getForumTopics
     * @api
     */
    public function getForumTopics(AbstractInputPeer|string|int $peer, int $offsetDate, int $offsetId, int $offsetTopic, int $limit, ?string $q = null): ?ForumTopics
    {
        return $this->getForumTopicsAsync(peer: $peer, offsetDate: $offsetDate, offsetId: $offsetId, offsetTopic: $offsetTopic, limit: $limit, q: $q)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $topics
     * @return Future<ForumTopics|null>
     * @see https://core.telegram.org/method/messages.getForumTopicsByID
     * @api
     */
    public function getForumTopicsByIDAsync(AbstractInputPeer|string|int $peer, array $topics): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetForumTopicsByIDRequest(peer: $peer, topics: $topics));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $topics
     * @return ForumTopics|null
     * @see https://core.telegram.org/method/messages.getForumTopicsByID
     * @api
     */
    public function getForumTopicsByID(AbstractInputPeer|string|int $peer, array $topics): ?ForumTopics
    {
        return $this->getForumTopicsByIDAsync(peer: $peer, topics: $topics)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $topicId
     * @param string|null $title
     * @param int|null $iconEmojiId
     * @param bool|null $closed
     * @param bool|null $hidden
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.editForumTopic
     * @api
     */
    public function editForumTopicAsync(AbstractInputPeer|string|int $peer, int $topicId, ?string $title = null, ?int $iconEmojiId = null, ?bool $closed = null, ?bool $hidden = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new EditForumTopicRequest(peer: $peer, topicId: $topicId, title: $title, iconEmojiId: $iconEmojiId, closed: $closed, hidden: $hidden));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $topicId
     * @param string|null $title
     * @param int|null $iconEmojiId
     * @param bool|null $closed
     * @param bool|null $hidden
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.editForumTopic
     * @api
     */
    public function editForumTopic(AbstractInputPeer|string|int $peer, int $topicId, ?string $title = null, ?int $iconEmojiId = null, ?bool $closed = null, ?bool $hidden = null): ?AbstractUpdates
    {
        return $this->editForumTopicAsync(peer: $peer, topicId: $topicId, title: $title, iconEmojiId: $iconEmojiId, closed: $closed, hidden: $hidden)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $topicId
     * @param bool $pinned
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.updatePinnedForumTopic
     * @api
     */
    public function updatePinnedForumTopicAsync(AbstractInputPeer|string|int $peer, int $topicId, bool $pinned): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new UpdatePinnedForumTopicRequest(peer: $peer, topicId: $topicId, pinned: $pinned));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $topicId
     * @param bool $pinned
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.updatePinnedForumTopic
     * @api
     */
    public function updatePinnedForumTopic(AbstractInputPeer|string|int $peer, int $topicId, bool $pinned): ?AbstractUpdates
    {
        return $this->updatePinnedForumTopicAsync(peer: $peer, topicId: $topicId, pinned: $pinned)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $order
     * @param bool|null $force
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.reorderPinnedForumTopics
     * @api
     */
    public function reorderPinnedForumTopicsAsync(AbstractInputPeer|string|int $peer, array $order, ?bool $force = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ReorderPinnedForumTopicsRequest(peer: $peer, order: $order, force: $force));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $order
     * @param bool|null $force
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.reorderPinnedForumTopics
     * @api
     */
    public function reorderPinnedForumTopics(AbstractInputPeer|string|int $peer, array $order, ?bool $force = null): ?AbstractUpdates
    {
        return $this->reorderPinnedForumTopicsAsync(peer: $peer, order: $order, force: $force)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $title
     * @param bool|null $titleMissing
     * @param int|null $iconColor
     * @param int|null $iconEmojiId
     * @param int|null $randomId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/messages.createForumTopic
     * @api
     */
    public function createForumTopicAsync(AbstractInputPeer|string|int $peer, string $title, ?bool $titleMissing = null, ?int $iconColor = null, ?int $iconEmojiId = null, ?int $randomId = null, AbstractInputPeer|string|int|null $sendAs = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($sendAs) || is_int($sendAs)) {
            $sendAs = $this->client->peerManager->resolve($sendAs);
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new CreateForumTopicRequest(peer: $peer, title: $title, titleMissing: $titleMissing, iconColor: $iconColor, iconEmojiId: $iconEmojiId, randomId: $randomId, sendAs: $sendAs));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $title
     * @param bool|null $titleMissing
     * @param int|null $iconColor
     * @param int|null $iconEmojiId
     * @param int|null $randomId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.createForumTopic
     * @api
     */
    public function createForumTopic(AbstractInputPeer|string|int $peer, string $title, ?bool $titleMissing = null, ?int $iconColor = null, ?int $iconEmojiId = null, ?int $randomId = null, AbstractInputPeer|string|int|null $sendAs = null): ?AbstractUpdates
    {
        return $this->createForumTopicAsync(peer: $peer, title: $title, titleMissing: $titleMissing, iconColor: $iconColor, iconEmojiId: $iconEmojiId, randomId: $randomId, sendAs: $sendAs)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $topMsgId
     * @return Future<AffectedHistory|null>
     * @see https://core.telegram.org/method/messages.deleteTopicHistory
     * @api
     */
    public function deleteTopicHistoryAsync(AbstractInputPeer|string|int $peer, int $topMsgId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new DeleteTopicHistoryRequest(peer: $peer, topMsgId: $topMsgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $topMsgId
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/messages.deleteTopicHistory
     * @api
     */
    public function deleteTopicHistory(AbstractInputPeer|string|int $peer, int $topMsgId): ?AffectedHistory
    {
        return $this->deleteTopicHistoryAsync(peer: $peer, topMsgId: $topMsgId)->await();
    }
}