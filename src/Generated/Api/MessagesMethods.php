<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\AcceptEncryptionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\AcceptUrlAuthRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\AddChatUserRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\CheckChatInviteRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\CheckHistoryImportPeerRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\CheckHistoryImportRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\CheckQuickReplyShortcutRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ClearAllDraftsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ClearRecentReactionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ClearRecentStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ClickSponsoredMessageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\CreateChatRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\DeleteChatRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\DeleteChatUserRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\DeleteExportedChatInviteRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\DeleteFactCheckRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\DeleteHistoryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\DeleteMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\DeletePhoneCallHistoryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\DeleteQuickReplyMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\DeleteQuickReplyShortcutRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\DeleteRevokedExportedChatInvitesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\DeleteSavedHistoryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\DeleteScheduledMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\DiscardEncryptionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\EditChatAboutRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\EditChatAdminRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\EditChatDefaultBannedRightsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\EditChatPhotoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\EditChatTitleRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\EditExportedChatInviteRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\EditFactCheckRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\EditInlineBotMessageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\EditMessageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\EditQuickReplyShortcutRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ExportChatInviteRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\FaveStickerRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ForwardMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetAdminsWithInvitesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetAllDraftsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetAllStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetArchivedStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetAttachMenuBotRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetAttachMenuBotsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetAttachedStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetAvailableEffectsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetAvailableReactionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetBotAppRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetBotCallbackAnswerRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetChatInviteImportersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetChatsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetCommonChatsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetCustomEmojiDocumentsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetDefaultHistoryTTLRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetDefaultTagReactionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetDhConfigRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetDialogFiltersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetDialogUnreadMarksRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetDialogsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetDiscussionMessageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetDocumentByHashRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetEmojiGroupsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetEmojiKeywordsDifferenceRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetEmojiKeywordsLanguagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetEmojiKeywordsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetEmojiProfilePhotoGroupsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetEmojiStatusGroupsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetEmojiStickerGroupsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetEmojiStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetEmojiURLRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetExportedChatInviteRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetExportedChatInvitesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetExtendedMediaRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetFactCheckRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetFavedStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetFeaturedEmojiStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetFeaturedStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetFullChatRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetGameHighScoresRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetHistoryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetInlineBotResultsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetInlineGameHighScoresRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetMaskStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetMessageEditDataRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetMessageReactionsListRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetMessageReadParticipantsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetMessagesReactionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetMessagesViewsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetMyStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetOldFeaturedStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetOnlinesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetOutboxReadDateRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetPaidReactionPrivacyRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetPeerDialogsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetPeerSettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetPinnedDialogsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetPinnedSavedDialogsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetPollResultsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetPollVotesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetPreparedInlineMessageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetQuickRepliesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetQuickReplyMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetRecentLocationsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetRecentReactionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetRecentStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetRepliesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetSavedDialogsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetSavedGifsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetSavedHistoryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetSavedReactionTagsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetScheduledHistoryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetScheduledMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetSearchCountersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetSearchResultsCalendarRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetSearchResultsPositionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetSplitRangesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetSponsoredMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetStickerSetRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetSuggestedDialogFiltersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetTopReactionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetUnreadMentionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetUnreadReactionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetWebPagePreviewRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\GetWebPageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\HideAllChatJoinRequestsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\HideChatJoinRequestRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\HidePeerSettingsBarRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ImportChatInviteRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\InitHistoryImportRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\InstallStickerSetRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\MarkDialogUnreadRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\MigrateChatRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ProlongWebViewRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\RateTranscribedAudioRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReadDiscussionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReadEncryptedHistoryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReadFeaturedStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReadHistoryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReadMentionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReadMessageContentsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReadReactionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReceivedMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReceivedQueueRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReorderPinnedDialogsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReorderPinnedSavedDialogsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReorderQuickRepliesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReorderStickerSetsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReportEncryptedSpamRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReportReactionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReportRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReportSpamRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ReportSponsoredMessageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\RequestAppWebViewRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\RequestEncryptionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\RequestMainWebViewRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\RequestSimpleWebViewRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\RequestUrlAuthRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\RequestWebViewRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SaveDefaultSendAsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SaveDraftRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SaveGifRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SavePreparedInlineMessageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SaveRecentStickerRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SearchCustomEmojiRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SearchEmojiStickerSetsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SearchGlobalRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SearchRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SearchSentMediaRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SearchStickerSetsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SearchStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendBotRequestedPeerRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendEncryptedFileRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendEncryptedRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendEncryptedServiceRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendInlineBotResultRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendMediaRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendMessageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendMultiMediaRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendPaidReactionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendQuickReplyMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendReactionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendScheduledMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendScreenshotNotificationRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendVoteRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendWebViewDataRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SendWebViewResultMessageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SetBotCallbackAnswerRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SetBotPrecheckoutResultsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SetBotShippingResultsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SetChatAvailableReactionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SetChatThemeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SetChatWallPaperRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SetDefaultHistoryTTLRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SetDefaultReactionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SetEncryptedTypingRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SetGameScoreRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SetHistoryTTLRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SetInlineBotResultsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SetInlineGameScoreRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\SetTypingRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\StartBotRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\StartHistoryImportRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ToggleBotInAttachMenuRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ToggleDialogFilterTagsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ToggleDialogPinRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ToggleNoForwardsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\TogglePaidReactionPrivacyRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\TogglePeerTranslationsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ToggleSavedDialogPinRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ToggleStickerSetsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\TranscribeAudioRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\TranslateTextRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\UninstallStickerSetRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\UnpinAllMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\UpdateDialogFilterRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\UpdateDialogFiltersOrderRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\UpdatePinnedMessageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\UpdateSavedReactionTagRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\UploadEncryptedFileRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\UploadImportedMediaRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\UploadMediaRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Messages\ViewSponsoredMessageRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractAttachMenuBots;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChatInvite;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChatReactions;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDialogFilter;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDialogPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmojiList;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEncryptedChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEncryptedFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractExportedChatInvite;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputBotApp;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputBotInlineMessageID;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputBotInlineResult;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChatPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputDialogPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputEncryptedFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGeoPoint;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputQuickReplyShortcut;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputReplyTo;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStickerSet;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStickeredMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputWallPaper;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessagesFilter;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReaction;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReplyMarkup;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReportResult;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSendMessageAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStickerSetCovered;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUrlAuthResult;
use DigitalStars\MtprotoClient\Generated\Types\Base\AttachMenuBots;
use DigitalStars\MtprotoClient\Generated\Types\Base\AttachMenuBotsBot;
use DigitalStars\MtprotoClient\Generated\Types\Base\AttachMenuBotsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatBannedRights;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatInvite;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatInviteAlready;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatInviteExported;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatInvitePeek;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatInvitePublicJoinRequests;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatOnlines;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatReactionsAll;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatReactionsNone;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatReactionsSome;
use DigitalStars\MtprotoClient\Generated\Types\Base\DefaultHistoryTTL;
use DigitalStars\MtprotoClient\Generated\Types\Base\DialogFilter;
use DigitalStars\MtprotoClient\Generated\Types\Base\DialogFilterChatlist;
use DigitalStars\MtprotoClient\Generated\Types\Base\DialogFilterDefault;
use DigitalStars\MtprotoClient\Generated\Types\Base\DialogFilterSuggested;
use DigitalStars\MtprotoClient\Generated\Types\Base\DialogPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\DialogPeerFolder;
use DigitalStars\MtprotoClient\Generated\Types\Base\Document;
use DigitalStars\MtprotoClient\Generated\Types\Base\DocumentEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiKeywordsDifference;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiLanguage;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiList;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiListNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiURL;
use DigitalStars\MtprotoClient\Generated\Types\Base\EncryptedChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\EncryptedChatDiscarded;
use DigitalStars\MtprotoClient\Generated\Types\Base\EncryptedChatEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\EncryptedChatRequested;
use DigitalStars\MtprotoClient\Generated\Types\Base\EncryptedChatWaiting;
use DigitalStars\MtprotoClient\Generated\Types\Base\EncryptedFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\EncryptedFileEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\FactCheck;
use DigitalStars\MtprotoClient\Generated\Types\Base\InlineBotSwitchPM;
use DigitalStars\MtprotoClient\Generated\Types\Base\InlineBotWebView;
use DigitalStars\MtprotoClient\Generated\Types\Base\InlineQueryPeerType;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputBotAppID;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputBotAppShortName;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputBotInlineMessageID;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputBotInlineMessageID64;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputBotInlineResult;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputBotInlineResultDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputBotInlineResultGame;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputBotInlineResultPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChatPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChatPhotoEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChatUploadedPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCheckPasswordEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputDialogPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputDialogPeerFolder;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputDocumentEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputEncryptedChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputEncryptedFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputEncryptedFileBigUploaded;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputEncryptedFileEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputEncryptedFileUploaded;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputFileBig;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputFileStoryDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGeoPoint;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGeoPointEmpty;
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
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaUploadedDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaUploadedPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaVenue;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaWebPage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessageCallbackQuery;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessageEntityMentionName;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessageID;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagePinned;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessageReplyTo;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterChatPhotos;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterContacts;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterGeo;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterGif;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterMusic;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterMyMentions;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterPhoneCalls;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterPhotoVideo;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterPhotos;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterPinned;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterRoundVideo;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterRoundVoice;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterUrl;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterVideo;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagesFilterVoice;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputQuickReplyShortcut;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputQuickReplyShortcutId;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputReplyToMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputReplyToStory;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputSingleMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetAnimatedEmoji;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetAnimatedEmojiAnimations;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetDice;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetEmojiChannelDefaultStatuses;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetEmojiDefaultStatuses;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetEmojiDefaultTopicIcons;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetEmojiGenericAnimations;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetID;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetPremiumGifts;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetShortName;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickeredMediaDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickeredMediaPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputWallPaper;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputWallPaperNoFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputWallPaperSlug;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityBankCard;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityBlockquote;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityBold;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityBotCommand;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityCashtag;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityCode;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityCustomEmoji;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityEmail;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityHashtag;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityItalic;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityMention;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityMentionName;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityPhone;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityPre;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntitySpoiler;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityStrike;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityTextUrl;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityUnderline;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityUnknown;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityUrl;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaContact;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaDice;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaGame;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaGeo;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaGeoLive;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaGiveaway;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaGiveawayResults;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaInvoice;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaPaidMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaPoll;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaStory;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaUnsupported;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaVenue;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageMediaWebPage;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageRange;
use DigitalStars\MtprotoClient\Generated\Types\Base\OutboxReadDate;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReactionCustomEmoji;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReactionEmoji;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReactionEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReactionPaid;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReadParticipantDate;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReceivedNotifyMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReplyInlineMarkup;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReplyKeyboardForceReply;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReplyKeyboardHide;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReplyKeyboardMarkup;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReportResultAddComment;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReportResultChooseOption;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReportResultReported;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageCancelAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageChooseContactAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageChooseStickerAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageEmojiInteraction;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageEmojiInteractionSeen;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageGamePlayAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageGeoLocationAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageHistoryImportAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageRecordAudioAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageRecordRoundAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageRecordVideoAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageTypingAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageUploadAudioAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageUploadDocumentAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageUploadPhotoAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageUploadRoundAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\SendMessageUploadVideoAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\ShippingOption;
use DigitalStars\MtprotoClient\Generated\Types\Base\SpeakingInGroupCallAction;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarsSubscriptionPricing;
use DigitalStars\MtprotoClient\Generated\Types\Base\StickerSetCovered;
use DigitalStars\MtprotoClient\Generated\Types\Base\StickerSetFullCovered;
use DigitalStars\MtprotoClient\Generated\Types\Base\StickerSetMultiCovered;
use DigitalStars\MtprotoClient\Generated\Types\Base\StickerSetNoCovered;
use DigitalStars\MtprotoClient\Generated\Types\Base\TextWithEntities;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShort;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortChatMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortSentMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\Updates;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesCombined;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesTooLong;
use DigitalStars\MtprotoClient\Generated\Types\Base\UrlAuthResultAccepted;
use DigitalStars\MtprotoClient\Generated\Types\Base\UrlAuthResultDefault;
use DigitalStars\MtprotoClient\Generated\Types\Base\UrlAuthResultRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\WallPaperSettings;
use DigitalStars\MtprotoClient\Generated\Types\Base\WebViewMessageSent;
use DigitalStars\MtprotoClient\Generated\Types\Base\WebViewResult;
use DigitalStars\MtprotoClient\Generated\Types\Channels\AbstractSponsoredMessageReportResult;
use DigitalStars\MtprotoClient\Generated\Types\Channels\SponsoredMessageReportResultAdsHidden;
use DigitalStars\MtprotoClient\Generated\Types\Channels\SponsoredMessageReportResultChooseOption;
use DigitalStars\MtprotoClient\Generated\Types\Channels\SponsoredMessageReportResultReported;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractAllStickers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractAvailableEffects;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractAvailableReactions;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractChats;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractDhConfig;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractDialogs;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractEmojiGroups;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractExportedChatInvite as MessagesAbstractExportedChatInvite;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractFavedStickers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractFeaturedStickers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractFoundStickerSets;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractFoundStickers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractMessages;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractQuickReplies;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractReactions;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractRecentStickers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractSavedDialogs;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractSavedGifs;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractSavedReactionTags;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractSentEncryptedMessage;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractSponsoredMessages;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractStickerSet;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractStickerSetInstallResult;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractStickers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AffectedFoundMessages;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AffectedHistory;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AffectedMessages;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AllStickers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AllStickersNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ArchivedStickers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AvailableEffects;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AvailableEffectsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AvailableReactions;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AvailableReactionsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\BotApp;
use DigitalStars\MtprotoClient\Generated\Types\Messages\BotCallbackAnswer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\BotPreparedInlineMessage;
use DigitalStars\MtprotoClient\Generated\Types\Messages\BotResults;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ChannelMessages;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ChatAdminsWithInvites;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ChatFull;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ChatInviteImporters;
use DigitalStars\MtprotoClient\Generated\Types\Messages\Chats;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ChatsSlice;
use DigitalStars\MtprotoClient\Generated\Types\Messages\CheckedHistoryImportPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\DhConfig;
use DigitalStars\MtprotoClient\Generated\Types\Messages\DhConfigNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\DialogFilters;
use DigitalStars\MtprotoClient\Generated\Types\Messages\Dialogs;
use DigitalStars\MtprotoClient\Generated\Types\Messages\DialogsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\DialogsSlice;
use DigitalStars\MtprotoClient\Generated\Types\Messages\DiscussionMessage;
use DigitalStars\MtprotoClient\Generated\Types\Messages\EmojiGroups;
use DigitalStars\MtprotoClient\Generated\Types\Messages\EmojiGroupsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ExportedChatInvite;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ExportedChatInviteReplaced;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ExportedChatInvites;
use DigitalStars\MtprotoClient\Generated\Types\Messages\FavedStickers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\FavedStickersNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\FeaturedStickers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\FeaturedStickersNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\FoundStickerSets;
use DigitalStars\MtprotoClient\Generated\Types\Messages\FoundStickerSetsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\FoundStickers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\FoundStickersNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\HighScores;
use DigitalStars\MtprotoClient\Generated\Types\Messages\HistoryImport;
use DigitalStars\MtprotoClient\Generated\Types\Messages\HistoryImportParsed;
use DigitalStars\MtprotoClient\Generated\Types\Messages\InvitedUsers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\MessageEditData;
use DigitalStars\MtprotoClient\Generated\Types\Messages\MessageReactionsList;
use DigitalStars\MtprotoClient\Generated\Types\Messages\MessageViews;
use DigitalStars\MtprotoClient\Generated\Types\Messages\Messages;
use DigitalStars\MtprotoClient\Generated\Types\Messages\MessagesNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\MessagesSlice;
use DigitalStars\MtprotoClient\Generated\Types\Messages\MyStickers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\PeerDialogs;
use DigitalStars\MtprotoClient\Generated\Types\Messages\PeerSettings;
use DigitalStars\MtprotoClient\Generated\Types\Messages\PreparedInlineMessage;
use DigitalStars\MtprotoClient\Generated\Types\Messages\QuickReplies;
use DigitalStars\MtprotoClient\Generated\Types\Messages\QuickRepliesNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\Reactions;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ReactionsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\RecentStickers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\RecentStickersNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SavedDialogs;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SavedDialogsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SavedDialogsSlice;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SavedGifs;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SavedGifsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SavedReactionTags;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SavedReactionTagsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SearchCounter;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SearchResultsCalendar;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SearchResultsPositions;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SentEncryptedFile;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SentEncryptedMessage;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SponsoredMessages;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SponsoredMessagesEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Messages\StickerSet;
use DigitalStars\MtprotoClient\Generated\Types\Messages\StickerSetInstallResultArchive;
use DigitalStars\MtprotoClient\Generated\Types\Messages\StickerSetInstallResultSuccess;
use DigitalStars\MtprotoClient\Generated\Types\Messages\StickerSetNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\Stickers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\StickersNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\TranscribedAudio;
use DigitalStars\MtprotoClient\Generated\Types\Messages\TranslatedText;
use DigitalStars\MtprotoClient\Generated\Types\Messages\VotesList;
use DigitalStars\MtprotoClient\Generated\Types\Messages\WebPage;


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
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getMessages
     * @api
     */
    public function getMessages(array $id): ?AbstractMessages
    {
        return $this->client->callSync(new GetMessagesRequest($id));
    }

    /**
     * @param int $offsetDate
     * @param int $offsetId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $offsetPeer
     * @param int $limit
     * @param int $hash
     * @param bool|null $excludePinned
     * @param int|null $folderId
     * @return Dialogs|DialogsSlice|DialogsNotModified|null
     * @see https://core.telegram.org/method/messages.getDialogs
     * @api
     */
    public function getDialogs(int $offsetDate, int $offsetId, AbstractInputPeer $offsetPeer, int $limit, int $hash, ?bool $excludePinned = null, ?int $folderId = null): ?AbstractDialogs
    {
        return $this->client->callSync(new GetDialogsRequest($offsetDate, $offsetId, $offsetPeer, $limit, $hash, $excludePinned, $folderId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
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
    public function getHistory(AbstractInputPeer $peer, int $offsetId, int $offsetDate, int $addOffset, int $limit, int $maxId, int $minId, int $hash): ?AbstractMessages
    {
        return $this->client->callSync(new GetHistoryRequest($peer, $offsetId, $offsetDate, $addOffset, $limit, $maxId, $minId, $hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
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
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $fromId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $savedPeerId
     * @param list<ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid>|null $savedReaction
     * @param int|null $topMsgId
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.search
     * @api
     */
    public function search(AbstractInputPeer $peer, string $q, AbstractMessagesFilter $filter, int $minDate, int $maxDate, int $offsetId, int $addOffset, int $limit, int $maxId, int $minId, int $hash, ?AbstractInputPeer $fromId = null, ?AbstractInputPeer $savedPeerId = null, ?array $savedReaction = null, ?int $topMsgId = null): ?AbstractMessages
    {
        return $this->client->callSync(new SearchRequest($peer, $q, $filter, $minDate, $maxDate, $offsetId, $addOffset, $limit, $maxId, $minId, $hash, $fromId, $savedPeerId, $savedReaction, $topMsgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $maxId
     * @return AffectedMessages|null
     * @see https://core.telegram.org/method/messages.readHistory
     * @api
     */
    public function readHistory(AbstractInputPeer $peer, int $maxId): ?AffectedMessages
    {
        return $this->client->callSync(new ReadHistoryRequest($peer, $maxId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $maxId
     * @param bool|null $justClear
     * @param bool|null $revoke
     * @param int|null $minDate
     * @param int|null $maxDate
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/messages.deleteHistory
     * @api
     */
    public function deleteHistory(AbstractInputPeer $peer, int $maxId, ?bool $justClear = null, ?bool $revoke = null, ?int $minDate = null, ?int $maxDate = null): ?AffectedHistory
    {
        return $this->client->callSync(new DeleteHistoryRequest($peer, $maxId, $justClear, $revoke, $minDate, $maxDate));
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
        return $this->client->callSync(new DeleteMessagesRequest($id, $revoke));
    }

    /**
     * @param int $maxId
     * @return list<ReceivedNotifyMessage>
     * @see https://core.telegram.org/method/messages.receivedMessages
     * @api
     */
    public function receivedMessages(int $maxId): array
    {
        return $this->client->callSync(new ReceivedMessagesRequest($maxId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param SendMessageTypingAction|SendMessageCancelAction|SendMessageRecordVideoAction|SendMessageUploadVideoAction|SendMessageRecordAudioAction|SendMessageUploadAudioAction|SendMessageUploadPhotoAction|SendMessageUploadDocumentAction|SendMessageGeoLocationAction|SendMessageChooseContactAction|SendMessageGamePlayAction|SendMessageRecordRoundAction|SendMessageUploadRoundAction|SpeakingInGroupCallAction|SendMessageHistoryImportAction|SendMessageChooseStickerAction|SendMessageEmojiInteraction|SendMessageEmojiInteractionSeen $action
     * @param int|null $topMsgId
     * @return bool
     * @see https://core.telegram.org/method/messages.setTyping
     * @api
     */
    public function setTyping(AbstractInputPeer $peer, AbstractSendMessageAction $action, ?int $topMsgId = null): bool
    {
        return (bool) $this->client->callSync(new SetTypingRequest($peer, $action, $topMsgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $message
     * @param int $randomId
     * @param bool|null $noWebpage
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $clearDraft
     * @param bool|null $noforwards
     * @param bool|null $updateStickersetsOrder
     * @param bool|null $invertMedia
     * @param bool|null $allowPaidFloodskip
     * @param InputReplyToMessage|InputReplyToStory|null $replyTo
     * @param ReplyKeyboardHide|ReplyKeyboardForceReply|ReplyKeyboardMarkup|ReplyInlineMarkup|null $replyMarkup
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param int|null $scheduleDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $effect
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendMessage
     * @api
     */
    public function sendMessage(AbstractInputPeer $peer, string $message, int $randomId, ?bool $noWebpage = null, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $noforwards = null, ?bool $updateStickersetsOrder = null, ?bool $invertMedia = null, ?bool $allowPaidFloodskip = null, ?AbstractInputReplyTo $replyTo = null, ?AbstractReplyMarkup $replyMarkup = null, ?array $entities = null, ?int $scheduleDate = null, ?AbstractInputPeer $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $effect = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SendMessageRequest($peer, $message, $randomId, $noWebpage, $silent, $background, $clearDraft, $noforwards, $updateStickersetsOrder, $invertMedia, $allowPaidFloodskip, $replyTo, $replyMarkup, $entities, $scheduleDate, $sendAs, $quickReplyShortcut, $effect));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia $media
     * @param string $message
     * @param int $randomId
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $clearDraft
     * @param bool|null $noforwards
     * @param bool|null $updateStickersetsOrder
     * @param bool|null $invertMedia
     * @param bool|null $allowPaidFloodskip
     * @param InputReplyToMessage|InputReplyToStory|null $replyTo
     * @param ReplyKeyboardHide|ReplyKeyboardForceReply|ReplyKeyboardMarkup|ReplyInlineMarkup|null $replyMarkup
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param int|null $scheduleDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $effect
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendMedia
     * @api
     */
    public function sendMedia(AbstractInputPeer $peer, AbstractInputMedia $media, string $message, int $randomId, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $noforwards = null, ?bool $updateStickersetsOrder = null, ?bool $invertMedia = null, ?bool $allowPaidFloodskip = null, ?AbstractInputReplyTo $replyTo = null, ?AbstractReplyMarkup $replyMarkup = null, ?array $entities = null, ?int $scheduleDate = null, ?AbstractInputPeer $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $effect = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SendMediaRequest($peer, $media, $message, $randomId, $silent, $background, $clearDraft, $noforwards, $updateStickersetsOrder, $invertMedia, $allowPaidFloodskip, $replyTo, $replyMarkup, $entities, $scheduleDate, $sendAs, $quickReplyShortcut, $effect));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $fromPeer
     * @param list<int> $id
     * @param list<int> $randomId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $toPeer
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $withMyScore
     * @param bool|null $dropAuthor
     * @param bool|null $dropMediaCaptions
     * @param bool|null $noforwards
     * @param bool|null $allowPaidFloodskip
     * @param int|null $topMsgId
     * @param int|null $scheduleDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.forwardMessages
     * @api
     */
    public function forwardMessages(AbstractInputPeer $fromPeer, array $id, array $randomId, AbstractInputPeer $toPeer, ?bool $silent = null, ?bool $background = null, ?bool $withMyScore = null, ?bool $dropAuthor = null, ?bool $dropMediaCaptions = null, ?bool $noforwards = null, ?bool $allowPaidFloodskip = null, ?int $topMsgId = null, ?int $scheduleDate = null, ?AbstractInputPeer $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null): ?AbstractUpdates
    {
        return $this->client->callSync(new ForwardMessagesRequest($fromPeer, $id, $randomId, $toPeer, $silent, $background, $withMyScore, $dropAuthor, $dropMediaCaptions, $noforwards, $allowPaidFloodskip, $topMsgId, $scheduleDate, $sendAs, $quickReplyShortcut));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return bool
     * @see https://core.telegram.org/method/messages.reportSpam
     * @api
     */
    public function reportSpam(AbstractInputPeer $peer): bool
    {
        return (bool) $this->client->callSync(new ReportSpamRequest($peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return PeerSettings|null
     * @see https://core.telegram.org/method/messages.getPeerSettings
     * @api
     */
    public function getPeerSettings(AbstractInputPeer $peer): ?PeerSettings
    {
        return $this->client->callSync(new GetPeerSettingsRequest($peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $id
     * @param string $option
     * @param string $message
     * @return ReportResultChooseOption|ReportResultAddComment|ReportResultReported|null
     * @see https://core.telegram.org/method/messages.report
     * @api
     */
    public function report(AbstractInputPeer $peer, array $id, string $option, string $message): ?AbstractReportResult
    {
        return $this->client->callSync(new ReportRequest($peer, $id, $option, $message));
    }

    /**
     * @param list<int> $id
     * @return Chats|ChatsSlice|null
     * @see https://core.telegram.org/method/messages.getChats
     * @api
     */
    public function getChats(array $id): ?AbstractChats
    {
        return $this->client->callSync(new GetChatsRequest($id));
    }

    /**
     * @param int $chatId
     * @return ChatFull|null
     * @see https://core.telegram.org/method/messages.getFullChat
     * @api
     */
    public function getFullChat(int $chatId): ?ChatFull
    {
        return $this->client->callSync(new GetFullChatRequest($chatId));
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
        return $this->client->callSync(new EditChatTitleRequest($chatId, $title));
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
        return $this->client->callSync(new EditChatPhotoRequest($chatId, $photo));
    }

    /**
     * @param int $chatId
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param int $fwdLimit
     * @return InvitedUsers|null
     * @see https://core.telegram.org/method/messages.addChatUser
     * @api
     */
    public function addChatUser(int $chatId, AbstractInputUser $userId, int $fwdLimit): ?InvitedUsers
    {
        return $this->client->callSync(new AddChatUserRequest($chatId, $userId, $fwdLimit));
    }

    /**
     * @param int $chatId
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param bool|null $revokeHistory
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.deleteChatUser
     * @api
     */
    public function deleteChatUser(int $chatId, AbstractInputUser $userId, ?bool $revokeHistory = null): ?AbstractUpdates
    {
        return $this->client->callSync(new DeleteChatUserRequest($chatId, $userId, $revokeHistory));
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
        return $this->client->callSync(new CreateChatRequest($users, $title, $ttlPeriod));
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
        return $this->client->callSync(new GetDhConfigRequest($version, $randomLength));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param int $randomId
     * @param string $gA
     * @return EncryptedChatEmpty|EncryptedChatWaiting|EncryptedChatRequested|EncryptedChat|EncryptedChatDiscarded|null
     * @see https://core.telegram.org/method/messages.requestEncryption
     * @api
     */
    public function requestEncryption(AbstractInputUser $userId, int $randomId, string $gA): ?AbstractEncryptedChat
    {
        return $this->client->callSync(new RequestEncryptionRequest($userId, $randomId, $gA));
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
        return $this->client->callSync(new AcceptEncryptionRequest($peer, $gB, $keyFingerprint));
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
        return (bool) $this->client->callSync(new DiscardEncryptionRequest($chatId, $deleteHistory));
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
        return (bool) $this->client->callSync(new SetEncryptedTypingRequest($peer, $typing));
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
        return (bool) $this->client->callSync(new ReadEncryptedHistoryRequest($peer, $maxDate));
    }

    /**
     * @param InputEncryptedChat $peer
     * @param int $randomId
     * @param string $data
     * @param bool|null $silent
     * @return SentEncryptedMessage|SentEncryptedFile|null
     * @see https://core.telegram.org/method/messages.sendEncrypted
     * @api
     */
    public function sendEncrypted(InputEncryptedChat $peer, int $randomId, string $data, ?bool $silent = null): ?AbstractSentEncryptedMessage
    {
        return $this->client->callSync(new SendEncryptedRequest($peer, $randomId, $data, $silent));
    }

    /**
     * @param InputEncryptedChat $peer
     * @param int $randomId
     * @param string $data
     * @param InputEncryptedFileEmpty|InputEncryptedFileUploaded|InputEncryptedFile|InputEncryptedFileBigUploaded $file
     * @param bool|null $silent
     * @return SentEncryptedMessage|SentEncryptedFile|null
     * @see https://core.telegram.org/method/messages.sendEncryptedFile
     * @api
     */
    public function sendEncryptedFile(InputEncryptedChat $peer, int $randomId, string $data, AbstractInputEncryptedFile $file, ?bool $silent = null): ?AbstractSentEncryptedMessage
    {
        return $this->client->callSync(new SendEncryptedFileRequest($peer, $randomId, $data, $file, $silent));
    }

    /**
     * @param InputEncryptedChat $peer
     * @param int $randomId
     * @param string $data
     * @return SentEncryptedMessage|SentEncryptedFile|null
     * @see https://core.telegram.org/method/messages.sendEncryptedService
     * @api
     */
    public function sendEncryptedService(InputEncryptedChat $peer, int $randomId, string $data): ?AbstractSentEncryptedMessage
    {
        return $this->client->callSync(new SendEncryptedServiceRequest($peer, $randomId, $data));
    }

    /**
     * @param int $maxQts
     * @return list<int>
     * @see https://core.telegram.org/method/messages.receivedQueue
     * @api
     */
    public function receivedQueue(int $maxQts): array
    {
        return $this->client->callSync(new ReceivedQueueRequest($maxQts));
    }

    /**
     * @param InputEncryptedChat $peer
     * @return bool
     * @see https://core.telegram.org/method/messages.reportEncryptedSpam
     * @api
     */
    public function reportEncryptedSpam(InputEncryptedChat $peer): bool
    {
        return (bool) $this->client->callSync(new ReportEncryptedSpamRequest($peer));
    }

    /**
     * @param list<int> $id
     * @return AffectedMessages|null
     * @see https://core.telegram.org/method/messages.readMessageContents
     * @api
     */
    public function readMessageContents(array $id): ?AffectedMessages
    {
        return $this->client->callSync(new ReadMessageContentsRequest($id));
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
        return $this->client->callSync(new GetStickersRequest($emoticon, $hash));
    }

    /**
     * @param int $hash
     * @return AllStickersNotModified|AllStickers|null
     * @see https://core.telegram.org/method/messages.getAllStickers
     * @api
     */
    public function getAllStickers(int $hash): ?AbstractAllStickers
    {
        return $this->client->callSync(new GetAllStickersRequest($hash));
    }

    /**
     * @param string $message
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @return MessageMediaEmpty|MessageMediaPhoto|MessageMediaGeo|MessageMediaContact|MessageMediaUnsupported|MessageMediaDocument|MessageMediaWebPage|MessageMediaVenue|MessageMediaGame|MessageMediaInvoice|MessageMediaGeoLive|MessageMediaPoll|MessageMediaDice|MessageMediaStory|MessageMediaGiveaway|MessageMediaGiveawayResults|MessageMediaPaidMedia|null
     * @see https://core.telegram.org/method/messages.getWebPagePreview
     * @api
     */
    public function getWebPagePreview(string $message, ?array $entities = null): ?AbstractMessageMedia
    {
        return $this->client->callSync(new GetWebPagePreviewRequest($message, $entities));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
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
    public function exportChatInvite(AbstractInputPeer $peer, ?bool $legacyRevokePermanent = null, ?bool $requestNeeded = null, ?int $expireDate = null, ?int $usageLimit = null, ?string $title = null, ?StarsSubscriptionPricing $subscriptionPricing = null): ?AbstractExportedChatInvite
    {
        return $this->client->callSync(new ExportChatInviteRequest($peer, $legacyRevokePermanent, $requestNeeded, $expireDate, $usageLimit, $title, $subscriptionPricing));
    }

    /**
     * @param string $hash
     * @return ChatInviteAlready|ChatInvite|ChatInvitePeek|null
     * @see https://core.telegram.org/method/messages.checkChatInvite
     * @api
     */
    public function checkChatInvite(string $hash): ?AbstractChatInvite
    {
        return $this->client->callSync(new CheckChatInviteRequest($hash));
    }

    /**
     * @param string $hash
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.importChatInvite
     * @api
     */
    public function importChatInvite(string $hash): ?AbstractUpdates
    {
        return $this->client->callSync(new ImportChatInviteRequest($hash));
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses $stickerset
     * @param int $hash
     * @return StickerSet|StickerSetNotModified|null
     * @see https://core.telegram.org/method/messages.getStickerSet
     * @api
     */
    public function getStickerSet(AbstractInputStickerSet $stickerset, int $hash): ?AbstractStickerSet
    {
        return $this->client->callSync(new GetStickerSetRequest($stickerset, $hash));
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses $stickerset
     * @param bool $archived
     * @return StickerSetInstallResultSuccess|StickerSetInstallResultArchive|null
     * @see https://core.telegram.org/method/messages.installStickerSet
     * @api
     */
    public function installStickerSet(AbstractInputStickerSet $stickerset, bool $archived): ?AbstractStickerSetInstallResult
    {
        return $this->client->callSync(new InstallStickerSetRequest($stickerset, $archived));
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses $stickerset
     * @return bool
     * @see https://core.telegram.org/method/messages.uninstallStickerSet
     * @api
     */
    public function uninstallStickerSet(AbstractInputStickerSet $stickerset): bool
    {
        return (bool) $this->client->callSync(new UninstallStickerSetRequest($stickerset));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $randomId
     * @param string $startParam
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.startBot
     * @api
     */
    public function startBot(AbstractInputUser $bot, AbstractInputPeer $peer, int $randomId, string $startParam): ?AbstractUpdates
    {
        return $this->client->callSync(new StartBotRequest($bot, $peer, $randomId, $startParam));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $id
     * @param bool $increment
     * @return MessageViews|null
     * @see https://core.telegram.org/method/messages.getMessagesViews
     * @api
     */
    public function getMessagesViews(AbstractInputPeer $peer, array $id, bool $increment): ?MessageViews
    {
        return $this->client->callSync(new GetMessagesViewsRequest($peer, $id, $increment));
    }

    /**
     * @param int $chatId
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param bool $isAdmin
     * @return bool
     * @see https://core.telegram.org/method/messages.editChatAdmin
     * @api
     */
    public function editChatAdmin(int $chatId, AbstractInputUser $userId, bool $isAdmin): bool
    {
        return (bool) $this->client->callSync(new EditChatAdminRequest($chatId, $userId, $isAdmin));
    }

    /**
     * @param int $chatId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.migrateChat
     * @api
     */
    public function migrateChat(int $chatId): ?AbstractUpdates
    {
        return $this->client->callSync(new MigrateChatRequest($chatId));
    }

    /**
     * @param string $q
     * @param InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned $filter
     * @param int $minDate
     * @param int $maxDate
     * @param int $offsetRate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $offsetPeer
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
    public function searchGlobal(string $q, AbstractMessagesFilter $filter, int $minDate, int $maxDate, int $offsetRate, AbstractInputPeer $offsetPeer, int $offsetId, int $limit, ?bool $broadcastsOnly = null, ?bool $groupsOnly = null, ?bool $usersOnly = null, ?int $folderId = null): ?AbstractMessages
    {
        return $this->client->callSync(new SearchGlobalRequest($q, $filter, $minDate, $maxDate, $offsetRate, $offsetPeer, $offsetId, $limit, $broadcastsOnly, $groupsOnly, $usersOnly, $folderId));
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
        return (bool) $this->client->callSync(new ReorderStickerSetsRequest($order, $masks, $emojis));
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
        return $this->client->callSync(new GetDocumentByHashRequest($sha256, $size, $mimeType));
    }

    /**
     * @param int $hash
     * @return SavedGifsNotModified|SavedGifs|null
     * @see https://core.telegram.org/method/messages.getSavedGifs
     * @api
     */
    public function getSavedGifs(int $hash): ?AbstractSavedGifs
    {
        return $this->client->callSync(new GetSavedGifsRequest($hash));
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
        return (bool) $this->client->callSync(new SaveGifRequest($id, $unsave));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $query
     * @param string $offset
     * @param InputGeoPointEmpty|InputGeoPoint|null $geoPoint
     * @return BotResults|null
     * @see https://core.telegram.org/method/messages.getInlineBotResults
     * @api
     */
    public function getInlineBotResults(AbstractInputUser $bot, AbstractInputPeer $peer, string $query, string $offset, ?AbstractInputGeoPoint $geoPoint = null): ?BotResults
    {
        return $this->client->callSync(new GetInlineBotResultsRequest($bot, $peer, $query, $offset, $geoPoint));
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
        return (bool) $this->client->callSync(new SetInlineBotResultsRequest($queryId, $results, $cacheTime, $gallery, $private, $nextOffset, $switchPm, $switchWebview));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $randomId
     * @param int $queryId
     * @param string $id
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $clearDraft
     * @param bool|null $hideVia
     * @param InputReplyToMessage|InputReplyToStory|null $replyTo
     * @param int|null $scheduleDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendInlineBotResult
     * @api
     */
    public function sendInlineBotResult(AbstractInputPeer $peer, int $randomId, int $queryId, string $id, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $hideVia = null, ?AbstractInputReplyTo $replyTo = null, ?int $scheduleDate = null, ?AbstractInputPeer $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SendInlineBotResultRequest($peer, $randomId, $queryId, $id, $silent, $background, $clearDraft, $hideVia, $replyTo, $scheduleDate, $sendAs, $quickReplyShortcut));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $id
     * @return MessageEditData|null
     * @see https://core.telegram.org/method/messages.getMessageEditData
     * @api
     */
    public function getMessageEditData(AbstractInputPeer $peer, int $id): ?MessageEditData
    {
        return $this->client->callSync(new GetMessageEditDataRequest($peer, $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $id
     * @param bool|null $noWebpage
     * @param bool|null $invertMedia
     * @param string|null $message
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|null $media
     * @param ReplyKeyboardHide|ReplyKeyboardForceReply|ReplyKeyboardMarkup|ReplyInlineMarkup|null $replyMarkup
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param int|null $scheduleDate
     * @param int|null $quickReplyShortcutId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.editMessage
     * @api
     */
    public function editMessage(AbstractInputPeer $peer, int $id, ?bool $noWebpage = null, ?bool $invertMedia = null, ?string $message = null, ?AbstractInputMedia $media = null, ?AbstractReplyMarkup $replyMarkup = null, ?array $entities = null, ?int $scheduleDate = null, ?int $quickReplyShortcutId = null): ?AbstractUpdates
    {
        return $this->client->callSync(new EditMessageRequest($peer, $id, $noWebpage, $invertMedia, $message, $media, $replyMarkup, $entities, $scheduleDate, $quickReplyShortcutId));
    }

    /**
     * @param InputBotInlineMessageID|InputBotInlineMessageID64 $id
     * @param bool|null $noWebpage
     * @param bool|null $invertMedia
     * @param string|null $message
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|null $media
     * @param ReplyKeyboardHide|ReplyKeyboardForceReply|ReplyKeyboardMarkup|ReplyInlineMarkup|null $replyMarkup
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @return bool
     * @see https://core.telegram.org/method/messages.editInlineBotMessage
     * @api
     */
    public function editInlineBotMessage(AbstractInputBotInlineMessageID $id, ?bool $noWebpage = null, ?bool $invertMedia = null, ?string $message = null, ?AbstractInputMedia $media = null, ?AbstractReplyMarkup $replyMarkup = null, ?array $entities = null): bool
    {
        return (bool) $this->client->callSync(new EditInlineBotMessageRequest($id, $noWebpage, $invertMedia, $message, $media, $replyMarkup, $entities));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @param bool|null $game
     * @param string|null $data
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP|null $password
     * @return BotCallbackAnswer|null
     * @see https://core.telegram.org/method/messages.getBotCallbackAnswer
     * @api
     */
    public function getBotCallbackAnswer(AbstractInputPeer $peer, int $msgId, ?bool $game = null, ?string $data = null, ?AbstractInputCheckPasswordSRP $password = null): ?BotCallbackAnswer
    {
        return $this->client->callSync(new GetBotCallbackAnswerRequest($peer, $msgId, $game, $data, $password));
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
        return (bool) $this->client->callSync(new SetBotCallbackAnswerRequest($queryId, $cacheTime, $alert, $message, $url));
    }

    /**
     * @param list<InputDialogPeer|InputDialogPeerFolder> $peers
     * @return PeerDialogs|null
     * @see https://core.telegram.org/method/messages.getPeerDialogs
     * @api
     */
    public function getPeerDialogs(array $peers): ?PeerDialogs
    {
        return $this->client->callSync(new GetPeerDialogsRequest($peers));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $message
     * @param bool|null $noWebpage
     * @param bool|null $invertMedia
     * @param InputReplyToMessage|InputReplyToStory|null $replyTo
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|null $media
     * @param int|null $effect
     * @return bool
     * @see https://core.telegram.org/method/messages.saveDraft
     * @api
     */
    public function saveDraft(AbstractInputPeer $peer, string $message, ?bool $noWebpage = null, ?bool $invertMedia = null, ?AbstractInputReplyTo $replyTo = null, ?array $entities = null, ?AbstractInputMedia $media = null, ?int $effect = null): bool
    {
        return (bool) $this->client->callSync(new SaveDraftRequest($peer, $message, $noWebpage, $invertMedia, $replyTo, $entities, $media, $effect));
    }

    /**
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.getAllDrafts
     * @api
     */
    public function getAllDrafts(): ?AbstractUpdates
    {
        return $this->client->callSync(new GetAllDraftsRequest());
    }

    /**
     * @param int $hash
     * @return FeaturedStickersNotModified|FeaturedStickers|null
     * @see https://core.telegram.org/method/messages.getFeaturedStickers
     * @api
     */
    public function getFeaturedStickers(int $hash): ?AbstractFeaturedStickers
    {
        return $this->client->callSync(new GetFeaturedStickersRequest($hash));
    }

    /**
     * @param list<int> $id
     * @return bool
     * @see https://core.telegram.org/method/messages.readFeaturedStickers
     * @api
     */
    public function readFeaturedStickers(array $id): bool
    {
        return (bool) $this->client->callSync(new ReadFeaturedStickersRequest($id));
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
        return $this->client->callSync(new GetRecentStickersRequest($hash, $attached));
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
        return (bool) $this->client->callSync(new SaveRecentStickerRequest($id, $unsave, $attached));
    }

    /**
     * @param bool|null $attached
     * @return bool
     * @see https://core.telegram.org/method/messages.clearRecentStickers
     * @api
     */
    public function clearRecentStickers(?bool $attached = null): bool
    {
        return (bool) $this->client->callSync(new ClearRecentStickersRequest($attached));
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
        return $this->client->callSync(new GetArchivedStickersRequest($offsetId, $limit, $masks, $emojis));
    }

    /**
     * @param int $hash
     * @return AllStickersNotModified|AllStickers|null
     * @see https://core.telegram.org/method/messages.getMaskStickers
     * @api
     */
    public function getMaskStickers(int $hash): ?AbstractAllStickers
    {
        return $this->client->callSync(new GetMaskStickersRequest($hash));
    }

    /**
     * @param InputStickeredMediaPhoto|InputStickeredMediaDocument $media
     * @return list<StickerSetCovered|StickerSetMultiCovered|StickerSetFullCovered|StickerSetNoCovered>
     * @see https://core.telegram.org/method/messages.getAttachedStickers
     * @api
     */
    public function getAttachedStickers(AbstractInputStickeredMedia $media): array
    {
        return $this->client->callSync(new GetAttachedStickersRequest($media));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $id
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param int $score
     * @param bool|null $editMessage
     * @param bool|null $force
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.setGameScore
     * @api
     */
    public function setGameScore(AbstractInputPeer $peer, int $id, AbstractInputUser $userId, int $score, ?bool $editMessage = null, ?bool $force = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SetGameScoreRequest($peer, $id, $userId, $score, $editMessage, $force));
    }

    /**
     * @param InputBotInlineMessageID|InputBotInlineMessageID64 $id
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param int $score
     * @param bool|null $editMessage
     * @param bool|null $force
     * @return bool
     * @see https://core.telegram.org/method/messages.setInlineGameScore
     * @api
     */
    public function setInlineGameScore(AbstractInputBotInlineMessageID $id, AbstractInputUser $userId, int $score, ?bool $editMessage = null, ?bool $force = null): bool
    {
        return (bool) $this->client->callSync(new SetInlineGameScoreRequest($id, $userId, $score, $editMessage, $force));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $id
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @return HighScores|null
     * @see https://core.telegram.org/method/messages.getGameHighScores
     * @api
     */
    public function getGameHighScores(AbstractInputPeer $peer, int $id, AbstractInputUser $userId): ?HighScores
    {
        return $this->client->callSync(new GetGameHighScoresRequest($peer, $id, $userId));
    }

    /**
     * @param InputBotInlineMessageID|InputBotInlineMessageID64 $id
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @return HighScores|null
     * @see https://core.telegram.org/method/messages.getInlineGameHighScores
     * @api
     */
    public function getInlineGameHighScores(AbstractInputBotInlineMessageID $id, AbstractInputUser $userId): ?HighScores
    {
        return $this->client->callSync(new GetInlineGameHighScoresRequest($id, $userId));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param int $maxId
     * @param int $limit
     * @return Chats|ChatsSlice|null
     * @see https://core.telegram.org/method/messages.getCommonChats
     * @api
     */
    public function getCommonChats(AbstractInputUser $userId, int $maxId, int $limit): ?AbstractChats
    {
        return $this->client->callSync(new GetCommonChatsRequest($userId, $maxId, $limit));
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
        return $this->client->callSync(new GetWebPageRequest($url, $hash));
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
        return (bool) $this->client->callSync(new ToggleDialogPinRequest($peer, $pinned));
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
        return (bool) $this->client->callSync(new ReorderPinnedDialogsRequest($folderId, $order, $force));
    }

    /**
     * @param int $folderId
     * @return PeerDialogs|null
     * @see https://core.telegram.org/method/messages.getPinnedDialogs
     * @api
     */
    public function getPinnedDialogs(int $folderId): ?PeerDialogs
    {
        return $this->client->callSync(new GetPinnedDialogsRequest($folderId));
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
        return (bool) $this->client->callSync(new SetBotShippingResultsRequest($queryId, $error, $shippingOptions));
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
        return (bool) $this->client->callSync(new SetBotPrecheckoutResultsRequest($queryId, $success, $error));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia $media
     * @param string|null $businessConnectionId
     * @return MessageMediaEmpty|MessageMediaPhoto|MessageMediaGeo|MessageMediaContact|MessageMediaUnsupported|MessageMediaDocument|MessageMediaWebPage|MessageMediaVenue|MessageMediaGame|MessageMediaInvoice|MessageMediaGeoLive|MessageMediaPoll|MessageMediaDice|MessageMediaStory|MessageMediaGiveaway|MessageMediaGiveawayResults|MessageMediaPaidMedia|null
     * @see https://core.telegram.org/method/messages.uploadMedia
     * @api
     */
    public function uploadMedia(AbstractInputPeer $peer, AbstractInputMedia $media, ?string $businessConnectionId = null): ?AbstractMessageMedia
    {
        return $this->client->callSync(new UploadMediaRequest($peer, $media, $businessConnectionId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputReplyToMessage|InputReplyToStory $replyTo
     * @param int $randomId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendScreenshotNotification
     * @api
     */
    public function sendScreenshotNotification(AbstractInputPeer $peer, AbstractInputReplyTo $replyTo, int $randomId): ?AbstractUpdates
    {
        return $this->client->callSync(new SendScreenshotNotificationRequest($peer, $replyTo, $randomId));
    }

    /**
     * @param int $hash
     * @return FavedStickersNotModified|FavedStickers|null
     * @see https://core.telegram.org/method/messages.getFavedStickers
     * @api
     */
    public function getFavedStickers(int $hash): ?AbstractFavedStickers
    {
        return $this->client->callSync(new GetFavedStickersRequest($hash));
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
        return (bool) $this->client->callSync(new FaveStickerRequest($id, $unfave));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
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
    public function getUnreadMentions(AbstractInputPeer $peer, int $offsetId, int $addOffset, int $limit, int $maxId, int $minId, ?int $topMsgId = null): ?AbstractMessages
    {
        return $this->client->callSync(new GetUnreadMentionsRequest($peer, $offsetId, $addOffset, $limit, $maxId, $minId, $topMsgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int|null $topMsgId
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/messages.readMentions
     * @api
     */
    public function readMentions(AbstractInputPeer $peer, ?int $topMsgId = null): ?AffectedHistory
    {
        return $this->client->callSync(new ReadMentionsRequest($peer, $topMsgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $limit
     * @param int $hash
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getRecentLocations
     * @api
     */
    public function getRecentLocations(AbstractInputPeer $peer, int $limit, int $hash): ?AbstractMessages
    {
        return $this->client->callSync(new GetRecentLocationsRequest($peer, $limit, $hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<InputSingleMedia> $multiMedia
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $clearDraft
     * @param bool|null $noforwards
     * @param bool|null $updateStickersetsOrder
     * @param bool|null $invertMedia
     * @param bool|null $allowPaidFloodskip
     * @param InputReplyToMessage|InputReplyToStory|null $replyTo
     * @param int|null $scheduleDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $effect
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendMultiMedia
     * @api
     */
    public function sendMultiMedia(AbstractInputPeer $peer, array $multiMedia, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $noforwards = null, ?bool $updateStickersetsOrder = null, ?bool $invertMedia = null, ?bool $allowPaidFloodskip = null, ?AbstractInputReplyTo $replyTo = null, ?int $scheduleDate = null, ?AbstractInputPeer $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $effect = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SendMultiMediaRequest($peer, $multiMedia, $silent, $background, $clearDraft, $noforwards, $updateStickersetsOrder, $invertMedia, $allowPaidFloodskip, $replyTo, $scheduleDate, $sendAs, $quickReplyShortcut, $effect));
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
        return $this->client->callSync(new UploadEncryptedFileRequest($peer, $file));
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
        return $this->client->callSync(new SearchStickerSetsRequest($q, $hash, $excludeFeatured));
    }

    /**
     * @return list<MessageRange>
     * @see https://core.telegram.org/method/messages.getSplitRanges
     * @api
     */
    public function getSplitRanges(): array
    {
        return $this->client->callSync(new GetSplitRangesRequest());
    }

    /**
     * @param InputDialogPeer|InputDialogPeerFolder $peer
     * @param bool|null $unread
     * @return bool
     * @see https://core.telegram.org/method/messages.markDialogUnread
     * @api
     */
    public function markDialogUnread(AbstractInputDialogPeer $peer, ?bool $unread = null): bool
    {
        return (bool) $this->client->callSync(new MarkDialogUnreadRequest($peer, $unread));
    }

    /**
     * @return list<DialogPeer|DialogPeerFolder>
     * @see https://core.telegram.org/method/messages.getDialogUnreadMarks
     * @api
     */
    public function getDialogUnreadMarks(): array
    {
        return $this->client->callSync(new GetDialogUnreadMarksRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/messages.clearAllDrafts
     * @api
     */
    public function clearAllDrafts(): bool
    {
        return (bool) $this->client->callSync(new ClearAllDraftsRequest());
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $id
     * @param bool|null $silent
     * @param bool|null $unpin
     * @param bool|null $pmOneside
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.updatePinnedMessage
     * @api
     */
    public function updatePinnedMessage(AbstractInputPeer $peer, int $id, ?bool $silent = null, ?bool $unpin = null, ?bool $pmOneside = null): ?AbstractUpdates
    {
        return $this->client->callSync(new UpdatePinnedMessageRequest($peer, $id, $silent, $unpin, $pmOneside));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @param list<string> $options
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendVote
     * @api
     */
    public function sendVote(AbstractInputPeer $peer, int $msgId, array $options): ?AbstractUpdates
    {
        return $this->client->callSync(new SendVoteRequest($peer, $msgId, $options));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.getPollResults
     * @api
     */
    public function getPollResults(AbstractInputPeer $peer, int $msgId): ?AbstractUpdates
    {
        return $this->client->callSync(new GetPollResultsRequest($peer, $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return ChatOnlines|null
     * @see https://core.telegram.org/method/messages.getOnlines
     * @api
     */
    public function getOnlines(AbstractInputPeer $peer): ?ChatOnlines
    {
        return $this->client->callSync(new GetOnlinesRequest($peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $about
     * @return bool
     * @see https://core.telegram.org/method/messages.editChatAbout
     * @api
     */
    public function editChatAbout(AbstractInputPeer $peer, string $about): bool
    {
        return (bool) $this->client->callSync(new EditChatAboutRequest($peer, $about));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param ChatBannedRights $bannedRights
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.editChatDefaultBannedRights
     * @api
     */
    public function editChatDefaultBannedRights(AbstractInputPeer $peer, ChatBannedRights $bannedRights): ?AbstractUpdates
    {
        return $this->client->callSync(new EditChatDefaultBannedRightsRequest($peer, $bannedRights));
    }

    /**
     * @param string $langCode
     * @return EmojiKeywordsDifference|null
     * @see https://core.telegram.org/method/messages.getEmojiKeywords
     * @api
     */
    public function getEmojiKeywords(string $langCode): ?EmojiKeywordsDifference
    {
        return $this->client->callSync(new GetEmojiKeywordsRequest($langCode));
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
        return $this->client->callSync(new GetEmojiKeywordsDifferenceRequest($langCode, $fromVersion));
    }

    /**
     * @param list<string> $langCodes
     * @return list<EmojiLanguage>
     * @see https://core.telegram.org/method/messages.getEmojiKeywordsLanguages
     * @api
     */
    public function getEmojiKeywordsLanguages(array $langCodes): array
    {
        return $this->client->callSync(new GetEmojiKeywordsLanguagesRequest($langCodes));
    }

    /**
     * @param string $langCode
     * @return EmojiURL|null
     * @see https://core.telegram.org/method/messages.getEmojiURL
     * @api
     */
    public function getEmojiURL(string $langCode): ?EmojiURL
    {
        return $this->client->callSync(new GetEmojiURLRequest($langCode));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned> $filters
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $savedPeerId
     * @param int|null $topMsgId
     * @return list<SearchCounter>
     * @see https://core.telegram.org/method/messages.getSearchCounters
     * @api
     */
    public function getSearchCounters(AbstractInputPeer $peer, array $filters, ?AbstractInputPeer $savedPeerId = null, ?int $topMsgId = null): array
    {
        return $this->client->callSync(new GetSearchCountersRequest($peer, $filters, $savedPeerId, $topMsgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $peer
     * @param int|null $msgId
     * @param int|null $buttonId
     * @param string|null $url
     * @return UrlAuthResultRequest|UrlAuthResultAccepted|UrlAuthResultDefault|null
     * @see https://core.telegram.org/method/messages.requestUrlAuth
     * @api
     */
    public function requestUrlAuth(?AbstractInputPeer $peer = null, ?int $msgId = null, ?int $buttonId = null, ?string $url = null): ?AbstractUrlAuthResult
    {
        return $this->client->callSync(new RequestUrlAuthRequest($peer, $msgId, $buttonId, $url));
    }

    /**
     * @param bool|null $writeAllowed
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $peer
     * @param int|null $msgId
     * @param int|null $buttonId
     * @param string|null $url
     * @return UrlAuthResultRequest|UrlAuthResultAccepted|UrlAuthResultDefault|null
     * @see https://core.telegram.org/method/messages.acceptUrlAuth
     * @api
     */
    public function acceptUrlAuth(?bool $writeAllowed = null, ?AbstractInputPeer $peer = null, ?int $msgId = null, ?int $buttonId = null, ?string $url = null): ?AbstractUrlAuthResult
    {
        return $this->client->callSync(new AcceptUrlAuthRequest($writeAllowed, $peer, $msgId, $buttonId, $url));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return bool
     * @see https://core.telegram.org/method/messages.hidePeerSettingsBar
     * @api
     */
    public function hidePeerSettingsBar(AbstractInputPeer $peer): bool
    {
        return (bool) $this->client->callSync(new HidePeerSettingsBarRequest($peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $hash
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getScheduledHistory
     * @api
     */
    public function getScheduledHistory(AbstractInputPeer $peer, int $hash): ?AbstractMessages
    {
        return $this->client->callSync(new GetScheduledHistoryRequest($peer, $hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $id
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getScheduledMessages
     * @api
     */
    public function getScheduledMessages(AbstractInputPeer $peer, array $id): ?AbstractMessages
    {
        return $this->client->callSync(new GetScheduledMessagesRequest($peer, $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $id
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendScheduledMessages
     * @api
     */
    public function sendScheduledMessages(AbstractInputPeer $peer, array $id): ?AbstractUpdates
    {
        return $this->client->callSync(new SendScheduledMessagesRequest($peer, $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $id
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.deleteScheduledMessages
     * @api
     */
    public function deleteScheduledMessages(AbstractInputPeer $peer, array $id): ?AbstractUpdates
    {
        return $this->client->callSync(new DeleteScheduledMessagesRequest($peer, $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $id
     * @param int $limit
     * @param string|null $option
     * @param string|null $offset
     * @return VotesList|null
     * @see https://core.telegram.org/method/messages.getPollVotes
     * @api
     */
    public function getPollVotes(AbstractInputPeer $peer, int $id, int $limit, ?string $option = null, ?string $offset = null): ?VotesList
    {
        return $this->client->callSync(new GetPollVotesRequest($peer, $id, $limit, $option, $offset));
    }

    /**
     * @param list<InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses> $stickersets
     * @param bool|null $uninstall
     * @param bool|null $archive
     * @param bool|null $unarchive
     * @return bool
     * @see https://core.telegram.org/method/messages.toggleStickerSets
     * @api
     */
    public function toggleStickerSets(array $stickersets, ?bool $uninstall = null, ?bool $archive = null, ?bool $unarchive = null): bool
    {
        return (bool) $this->client->callSync(new ToggleStickerSetsRequest($stickersets, $uninstall, $archive, $unarchive));
    }

    /**
     * @return DialogFilters|null
     * @see https://core.telegram.org/method/messages.getDialogFilters
     * @api
     */
    public function getDialogFilters(): ?DialogFilters
    {
        return $this->client->callSync(new GetDialogFiltersRequest());
    }

    /**
     * @return list<DialogFilterSuggested>
     * @see https://core.telegram.org/method/messages.getSuggestedDialogFilters
     * @api
     */
    public function getSuggestedDialogFilters(): array
    {
        return $this->client->callSync(new GetSuggestedDialogFiltersRequest());
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
        return (bool) $this->client->callSync(new UpdateDialogFilterRequest($id, $filter));
    }

    /**
     * @param list<int> $order
     * @return bool
     * @see https://core.telegram.org/method/messages.updateDialogFiltersOrder
     * @api
     */
    public function updateDialogFiltersOrder(array $order): bool
    {
        return (bool) $this->client->callSync(new UpdateDialogFiltersOrderRequest($order));
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
        return $this->client->callSync(new GetOldFeaturedStickersRequest($offset, $limit, $hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
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
    public function getReplies(AbstractInputPeer $peer, int $msgId, int $offsetId, int $offsetDate, int $addOffset, int $limit, int $maxId, int $minId, int $hash): ?AbstractMessages
    {
        return $this->client->callSync(new GetRepliesRequest($peer, $msgId, $offsetId, $offsetDate, $addOffset, $limit, $maxId, $minId, $hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @return DiscussionMessage|null
     * @see https://core.telegram.org/method/messages.getDiscussionMessage
     * @api
     */
    public function getDiscussionMessage(AbstractInputPeer $peer, int $msgId): ?DiscussionMessage
    {
        return $this->client->callSync(new GetDiscussionMessageRequest($peer, $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @param int $readMaxId
     * @return bool
     * @see https://core.telegram.org/method/messages.readDiscussion
     * @api
     */
    public function readDiscussion(AbstractInputPeer $peer, int $msgId, int $readMaxId): bool
    {
        return (bool) $this->client->callSync(new ReadDiscussionRequest($peer, $msgId, $readMaxId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int|null $topMsgId
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/messages.unpinAllMessages
     * @api
     */
    public function unpinAllMessages(AbstractInputPeer $peer, ?int $topMsgId = null): ?AffectedHistory
    {
        return $this->client->callSync(new UnpinAllMessagesRequest($peer, $topMsgId));
    }

    /**
     * @param int $chatId
     * @return bool
     * @see https://core.telegram.org/method/messages.deleteChat
     * @api
     */
    public function deleteChat(int $chatId): bool
    {
        return (bool) $this->client->callSync(new DeleteChatRequest($chatId));
    }

    /**
     * @param bool|null $revoke
     * @return AffectedFoundMessages|null
     * @see https://core.telegram.org/method/messages.deletePhoneCallHistory
     * @api
     */
    public function deletePhoneCallHistory(?bool $revoke = null): ?AffectedFoundMessages
    {
        return $this->client->callSync(new DeletePhoneCallHistoryRequest($revoke));
    }

    /**
     * @param string $importHead
     * @return HistoryImportParsed|null
     * @see https://core.telegram.org/method/messages.checkHistoryImport
     * @api
     */
    public function checkHistoryImport(string $importHead): ?HistoryImportParsed
    {
        return $this->client->callSync(new CheckHistoryImportRequest($importHead));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputFile|InputFileBig|InputFileStoryDocument $file
     * @param int $mediaCount
     * @return HistoryImport|null
     * @see https://core.telegram.org/method/messages.initHistoryImport
     * @api
     */
    public function initHistoryImport(AbstractInputPeer $peer, AbstractInputFile $file, int $mediaCount): ?HistoryImport
    {
        return $this->client->callSync(new InitHistoryImportRequest($peer, $file, $mediaCount));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $importId
     * @param string $fileName
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia $media
     * @return MessageMediaEmpty|MessageMediaPhoto|MessageMediaGeo|MessageMediaContact|MessageMediaUnsupported|MessageMediaDocument|MessageMediaWebPage|MessageMediaVenue|MessageMediaGame|MessageMediaInvoice|MessageMediaGeoLive|MessageMediaPoll|MessageMediaDice|MessageMediaStory|MessageMediaGiveaway|MessageMediaGiveawayResults|MessageMediaPaidMedia|null
     * @see https://core.telegram.org/method/messages.uploadImportedMedia
     * @api
     */
    public function uploadImportedMedia(AbstractInputPeer $peer, int $importId, string $fileName, AbstractInputMedia $media): ?AbstractMessageMedia
    {
        return $this->client->callSync(new UploadImportedMediaRequest($peer, $importId, $fileName, $media));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $importId
     * @return bool
     * @see https://core.telegram.org/method/messages.startHistoryImport
     * @api
     */
    public function startHistoryImport(AbstractInputPeer $peer, int $importId): bool
    {
        return (bool) $this->client->callSync(new StartHistoryImportRequest($peer, $importId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $adminId
     * @param int $limit
     * @param bool|null $revoked
     * @param int|null $offsetDate
     * @param string|null $offsetLink
     * @return ExportedChatInvites|null
     * @see https://core.telegram.org/method/messages.getExportedChatInvites
     * @api
     */
    public function getExportedChatInvites(AbstractInputPeer $peer, AbstractInputUser $adminId, int $limit, ?bool $revoked = null, ?int $offsetDate = null, ?string $offsetLink = null): ?ExportedChatInvites
    {
        return $this->client->callSync(new GetExportedChatInvitesRequest($peer, $adminId, $limit, $revoked, $offsetDate, $offsetLink));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $link
     * @return ExportedChatInvite|ExportedChatInviteReplaced|null
     * @see https://core.telegram.org/method/messages.getExportedChatInvite
     * @api
     */
    public function getExportedChatInvite(AbstractInputPeer $peer, string $link): ?MessagesAbstractExportedChatInvite
    {
        return $this->client->callSync(new GetExportedChatInviteRequest($peer, $link));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
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
    public function editExportedChatInvite(AbstractInputPeer $peer, string $link, ?bool $revoked = null, ?int $expireDate = null, ?int $usageLimit = null, ?bool $requestNeeded = null, ?string $title = null): ?MessagesAbstractExportedChatInvite
    {
        return $this->client->callSync(new EditExportedChatInviteRequest($peer, $link, $revoked, $expireDate, $usageLimit, $requestNeeded, $title));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $adminId
     * @return bool
     * @see https://core.telegram.org/method/messages.deleteRevokedExportedChatInvites
     * @api
     */
    public function deleteRevokedExportedChatInvites(AbstractInputPeer $peer, AbstractInputUser $adminId): bool
    {
        return (bool) $this->client->callSync(new DeleteRevokedExportedChatInvitesRequest($peer, $adminId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $link
     * @return bool
     * @see https://core.telegram.org/method/messages.deleteExportedChatInvite
     * @api
     */
    public function deleteExportedChatInvite(AbstractInputPeer $peer, string $link): bool
    {
        return (bool) $this->client->callSync(new DeleteExportedChatInviteRequest($peer, $link));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return ChatAdminsWithInvites|null
     * @see https://core.telegram.org/method/messages.getAdminsWithInvites
     * @api
     */
    public function getAdminsWithInvites(AbstractInputPeer $peer): ?ChatAdminsWithInvites
    {
        return $this->client->callSync(new GetAdminsWithInvitesRequest($peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $offsetDate
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $offsetUser
     * @param int $limit
     * @param bool|null $requested
     * @param bool|null $subscriptionExpired
     * @param string|null $link
     * @param string|null $q
     * @return ChatInviteImporters|null
     * @see https://core.telegram.org/method/messages.getChatInviteImporters
     * @api
     */
    public function getChatInviteImporters(AbstractInputPeer $peer, int $offsetDate, AbstractInputUser $offsetUser, int $limit, ?bool $requested = null, ?bool $subscriptionExpired = null, ?string $link = null, ?string $q = null): ?ChatInviteImporters
    {
        return $this->client->callSync(new GetChatInviteImportersRequest($peer, $offsetDate, $offsetUser, $limit, $requested, $subscriptionExpired, $link, $q));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $period
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.setHistoryTTL
     * @api
     */
    public function setHistoryTTL(AbstractInputPeer $peer, int $period): ?AbstractUpdates
    {
        return $this->client->callSync(new SetHistoryTTLRequest($peer, $period));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return CheckedHistoryImportPeer|null
     * @see https://core.telegram.org/method/messages.checkHistoryImportPeer
     * @api
     */
    public function checkHistoryImportPeer(AbstractInputPeer $peer): ?CheckedHistoryImportPeer
    {
        return $this->client->callSync(new CheckHistoryImportPeerRequest($peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $emoticon
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.setChatTheme
     * @api
     */
    public function setChatTheme(AbstractInputPeer $peer, string $emoticon): ?AbstractUpdates
    {
        return $this->client->callSync(new SetChatThemeRequest($peer, $emoticon));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @return list<ReadParticipantDate>
     * @see https://core.telegram.org/method/messages.getMessageReadParticipants
     * @api
     */
    public function getMessageReadParticipants(AbstractInputPeer $peer, int $msgId): array
    {
        return $this->client->callSync(new GetMessageReadParticipantsRequest($peer, $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned $filter
     * @param int $offsetId
     * @param int $offsetDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $savedPeerId
     * @return SearchResultsCalendar|null
     * @see https://core.telegram.org/method/messages.getSearchResultsCalendar
     * @api
     */
    public function getSearchResultsCalendar(AbstractInputPeer $peer, AbstractMessagesFilter $filter, int $offsetId, int $offsetDate, ?AbstractInputPeer $savedPeerId = null): ?SearchResultsCalendar
    {
        return $this->client->callSync(new GetSearchResultsCalendarRequest($peer, $filter, $offsetId, $offsetDate, $savedPeerId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputMessagesFilterEmpty|InputMessagesFilterPhotos|InputMessagesFilterVideo|InputMessagesFilterPhotoVideo|InputMessagesFilterDocument|InputMessagesFilterUrl|InputMessagesFilterGif|InputMessagesFilterVoice|InputMessagesFilterMusic|InputMessagesFilterChatPhotos|InputMessagesFilterPhoneCalls|InputMessagesFilterRoundVoice|InputMessagesFilterRoundVideo|InputMessagesFilterMyMentions|InputMessagesFilterGeo|InputMessagesFilterContacts|InputMessagesFilterPinned $filter
     * @param int $offsetId
     * @param int $limit
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $savedPeerId
     * @return SearchResultsPositions|null
     * @see https://core.telegram.org/method/messages.getSearchResultsPositions
     * @api
     */
    public function getSearchResultsPositions(AbstractInputPeer $peer, AbstractMessagesFilter $filter, int $offsetId, int $limit, ?AbstractInputPeer $savedPeerId = null): ?SearchResultsPositions
    {
        return $this->client->callSync(new GetSearchResultsPositionsRequest($peer, $filter, $offsetId, $limit, $savedPeerId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param bool|null $approved
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.hideChatJoinRequest
     * @api
     */
    public function hideChatJoinRequest(AbstractInputPeer $peer, AbstractInputUser $userId, ?bool $approved = null): ?AbstractUpdates
    {
        return $this->client->callSync(new HideChatJoinRequestRequest($peer, $userId, $approved));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param bool|null $approved
     * @param string|null $link
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.hideAllChatJoinRequests
     * @api
     */
    public function hideAllChatJoinRequests(AbstractInputPeer $peer, ?bool $approved = null, ?string $link = null): ?AbstractUpdates
    {
        return $this->client->callSync(new HideAllChatJoinRequestsRequest($peer, $approved, $link));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.toggleNoForwards
     * @api
     */
    public function toggleNoForwards(AbstractInputPeer $peer, bool $enabled): ?AbstractUpdates
    {
        return $this->client->callSync(new ToggleNoForwardsRequest($peer, $enabled));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $sendAs
     * @return bool
     * @see https://core.telegram.org/method/messages.saveDefaultSendAs
     * @api
     */
    public function saveDefaultSendAs(AbstractInputPeer $peer, AbstractInputPeer $sendAs): bool
    {
        return (bool) $this->client->callSync(new SaveDefaultSendAsRequest($peer, $sendAs));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @param bool|null $big
     * @param bool|null $addToRecent
     * @param list<ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid>|null $reaction
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendReaction
     * @api
     */
    public function sendReaction(AbstractInputPeer $peer, int $msgId, ?bool $big = null, ?bool $addToRecent = null, ?array $reaction = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SendReactionRequest($peer, $msgId, $big, $addToRecent, $reaction));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $id
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.getMessagesReactions
     * @api
     */
    public function getMessagesReactions(AbstractInputPeer $peer, array $id): ?AbstractUpdates
    {
        return $this->client->callSync(new GetMessagesReactionsRequest($peer, $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $id
     * @param int $limit
     * @param ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid|null $reaction
     * @param string|null $offset
     * @return MessageReactionsList|null
     * @see https://core.telegram.org/method/messages.getMessageReactionsList
     * @api
     */
    public function getMessageReactionsList(AbstractInputPeer $peer, int $id, int $limit, ?AbstractReaction $reaction = null, ?string $offset = null): ?MessageReactionsList
    {
        return $this->client->callSync(new GetMessageReactionsListRequest($peer, $id, $limit, $reaction, $offset));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param ChatReactionsNone|ChatReactionsAll|ChatReactionsSome $availableReactions
     * @param int|null $reactionsLimit
     * @param bool|null $paidEnabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.setChatAvailableReactions
     * @api
     */
    public function setChatAvailableReactions(AbstractInputPeer $peer, AbstractChatReactions $availableReactions, ?int $reactionsLimit = null, ?bool $paidEnabled = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SetChatAvailableReactionsRequest($peer, $availableReactions, $reactionsLimit, $paidEnabled));
    }

    /**
     * @param int $hash
     * @return AvailableReactionsNotModified|AvailableReactions|null
     * @see https://core.telegram.org/method/messages.getAvailableReactions
     * @api
     */
    public function getAvailableReactions(int $hash): ?AbstractAvailableReactions
    {
        return $this->client->callSync(new GetAvailableReactionsRequest($hash));
    }

    /**
     * @param ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid $reaction
     * @return bool
     * @see https://core.telegram.org/method/messages.setDefaultReaction
     * @api
     */
    public function setDefaultReaction(AbstractReaction $reaction): bool
    {
        return (bool) $this->client->callSync(new SetDefaultReactionRequest($reaction));
    }

    /**
     * @param string $toLang
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $peer
     * @param list<int>|null $id
     * @param list<TextWithEntities>|null $text
     * @return TranslatedText|null
     * @see https://core.telegram.org/method/messages.translateText
     * @api
     */
    public function translateText(string $toLang, ?AbstractInputPeer $peer = null, ?array $id = null, ?array $text = null): ?TranslatedText
    {
        return $this->client->callSync(new TranslateTextRequest($toLang, $peer, $id, $text));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $offsetId
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int|null $topMsgId
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getUnreadReactions
     * @api
     */
    public function getUnreadReactions(AbstractInputPeer $peer, int $offsetId, int $addOffset, int $limit, int $maxId, int $minId, ?int $topMsgId = null): ?AbstractMessages
    {
        return $this->client->callSync(new GetUnreadReactionsRequest($peer, $offsetId, $addOffset, $limit, $maxId, $minId, $topMsgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int|null $topMsgId
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/messages.readReactions
     * @api
     */
    public function readReactions(AbstractInputPeer $peer, ?int $topMsgId = null): ?AffectedHistory
    {
        return $this->client->callSync(new ReadReactionsRequest($peer, $topMsgId));
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
        return $this->client->callSync(new SearchSentMediaRequest($q, $filter, $limit));
    }

    /**
     * @param int $hash
     * @return AttachMenuBotsNotModified|AttachMenuBots|null
     * @see https://core.telegram.org/method/messages.getAttachMenuBots
     * @api
     */
    public function getAttachMenuBots(int $hash): ?AbstractAttachMenuBots
    {
        return $this->client->callSync(new GetAttachMenuBotsRequest($hash));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @return AttachMenuBotsBot|null
     * @see https://core.telegram.org/method/messages.getAttachMenuBot
     * @api
     */
    public function getAttachMenuBot(AbstractInputUser $bot): ?AttachMenuBotsBot
    {
        return $this->client->callSync(new GetAttachMenuBotRequest($bot));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param bool $enabled
     * @param bool|null $writeAllowed
     * @return bool
     * @see https://core.telegram.org/method/messages.toggleBotInAttachMenu
     * @api
     */
    public function toggleBotInAttachMenu(AbstractInputUser $bot, bool $enabled, ?bool $writeAllowed = null): bool
    {
        return (bool) $this->client->callSync(new ToggleBotInAttachMenuRequest($bot, $enabled, $writeAllowed));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param string $platform
     * @param bool|null $fromBotMenu
     * @param bool|null $silent
     * @param bool|null $compact
     * @param bool|null $fullscreen
     * @param string|null $url
     * @param string|null $startParam
     * @param array|null $themeParams
     * @param InputReplyToMessage|InputReplyToStory|null $replyTo
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $sendAs
     * @return WebViewResult|null
     * @see https://core.telegram.org/method/messages.requestWebView
     * @api
     */
    public function requestWebView(AbstractInputPeer $peer, AbstractInputUser $bot, string $platform, ?bool $fromBotMenu = null, ?bool $silent = null, ?bool $compact = null, ?bool $fullscreen = null, ?string $url = null, ?string $startParam = null, ?array $themeParams = null, ?AbstractInputReplyTo $replyTo = null, ?AbstractInputPeer $sendAs = null): ?WebViewResult
    {
        return $this->client->callSync(new RequestWebViewRequest($peer, $bot, $platform, $fromBotMenu, $silent, $compact, $fullscreen, $url, $startParam, $themeParams, $replyTo, $sendAs));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param int $queryId
     * @param bool|null $silent
     * @param InputReplyToMessage|InputReplyToStory|null $replyTo
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $sendAs
     * @return bool
     * @see https://core.telegram.org/method/messages.prolongWebView
     * @api
     */
    public function prolongWebView(AbstractInputPeer $peer, AbstractInputUser $bot, int $queryId, ?bool $silent = null, ?AbstractInputReplyTo $replyTo = null, ?AbstractInputPeer $sendAs = null): bool
    {
        return (bool) $this->client->callSync(new ProlongWebViewRequest($peer, $bot, $queryId, $silent, $replyTo, $sendAs));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
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
    public function requestSimpleWebView(AbstractInputUser $bot, string $platform, ?bool $fromSwitchWebview = null, ?bool $fromSideMenu = null, ?bool $compact = null, ?bool $fullscreen = null, ?string $url = null, ?string $startParam = null, ?array $themeParams = null): ?WebViewResult
    {
        return $this->client->callSync(new RequestSimpleWebViewRequest($bot, $platform, $fromSwitchWebview, $fromSideMenu, $compact, $fullscreen, $url, $startParam, $themeParams));
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
        return $this->client->callSync(new SendWebViewResultMessageRequest($botQueryId, $result));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param int $randomId
     * @param string $buttonText
     * @param string $data
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendWebViewData
     * @api
     */
    public function sendWebViewData(AbstractInputUser $bot, int $randomId, string $buttonText, string $data): ?AbstractUpdates
    {
        return $this->client->callSync(new SendWebViewDataRequest($bot, $randomId, $buttonText, $data));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @return TranscribedAudio|null
     * @see https://core.telegram.org/method/messages.transcribeAudio
     * @api
     */
    public function transcribeAudio(AbstractInputPeer $peer, int $msgId): ?TranscribedAudio
    {
        return $this->client->callSync(new TranscribeAudioRequest($peer, $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @param int $transcriptionId
     * @param bool $good
     * @return bool
     * @see https://core.telegram.org/method/messages.rateTranscribedAudio
     * @api
     */
    public function rateTranscribedAudio(AbstractInputPeer $peer, int $msgId, int $transcriptionId, bool $good): bool
    {
        return (bool) $this->client->callSync(new RateTranscribedAudioRequest($peer, $msgId, $transcriptionId, $good));
    }

    /**
     * @param list<int> $documentId
     * @return list<DocumentEmpty|Document>
     * @see https://core.telegram.org/method/messages.getCustomEmojiDocuments
     * @api
     */
    public function getCustomEmojiDocuments(array $documentId): array
    {
        return $this->client->callSync(new GetCustomEmojiDocumentsRequest($documentId));
    }

    /**
     * @param int $hash
     * @return AllStickersNotModified|AllStickers|null
     * @see https://core.telegram.org/method/messages.getEmojiStickers
     * @api
     */
    public function getEmojiStickers(int $hash): ?AbstractAllStickers
    {
        return $this->client->callSync(new GetEmojiStickersRequest($hash));
    }

    /**
     * @param int $hash
     * @return FeaturedStickersNotModified|FeaturedStickers|null
     * @see https://core.telegram.org/method/messages.getFeaturedEmojiStickers
     * @api
     */
    public function getFeaturedEmojiStickers(int $hash): ?AbstractFeaturedStickers
    {
        return $this->client->callSync(new GetFeaturedEmojiStickersRequest($hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $id
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $reactionPeer
     * @return bool
     * @see https://core.telegram.org/method/messages.reportReaction
     * @api
     */
    public function reportReaction(AbstractInputPeer $peer, int $id, AbstractInputPeer $reactionPeer): bool
    {
        return (bool) $this->client->callSync(new ReportReactionRequest($peer, $id, $reactionPeer));
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
        return $this->client->callSync(new GetTopReactionsRequest($limit, $hash));
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
        return $this->client->callSync(new GetRecentReactionsRequest($limit, $hash));
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/messages.clearRecentReactions
     * @api
     */
    public function clearRecentReactions(): bool
    {
        return (bool) $this->client->callSync(new ClearRecentReactionsRequest());
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $id
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.getExtendedMedia
     * @api
     */
    public function getExtendedMedia(AbstractInputPeer $peer, array $id): ?AbstractUpdates
    {
        return $this->client->callSync(new GetExtendedMediaRequest($peer, $id));
    }

    /**
     * @param int $period
     * @return bool
     * @see https://core.telegram.org/method/messages.setDefaultHistoryTTL
     * @api
     */
    public function setDefaultHistoryTTL(int $period): bool
    {
        return (bool) $this->client->callSync(new SetDefaultHistoryTTLRequest($period));
    }

    /**
     * @return DefaultHistoryTTL|null
     * @see https://core.telegram.org/method/messages.getDefaultHistoryTTL
     * @api
     */
    public function getDefaultHistoryTTL(): ?DefaultHistoryTTL
    {
        return $this->client->callSync(new GetDefaultHistoryTTLRequest());
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @param int $buttonId
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $requestedPeers
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendBotRequestedPeer
     * @api
     */
    public function sendBotRequestedPeer(AbstractInputPeer $peer, int $msgId, int $buttonId, array $requestedPeers): ?AbstractUpdates
    {
        return $this->client->callSync(new SendBotRequestedPeerRequest($peer, $msgId, $buttonId, $requestedPeers));
    }

    /**
     * @param int $hash
     * @return EmojiGroupsNotModified|EmojiGroups|null
     * @see https://core.telegram.org/method/messages.getEmojiGroups
     * @api
     */
    public function getEmojiGroups(int $hash): ?AbstractEmojiGroups
    {
        return $this->client->callSync(new GetEmojiGroupsRequest($hash));
    }

    /**
     * @param int $hash
     * @return EmojiGroupsNotModified|EmojiGroups|null
     * @see https://core.telegram.org/method/messages.getEmojiStatusGroups
     * @api
     */
    public function getEmojiStatusGroups(int $hash): ?AbstractEmojiGroups
    {
        return $this->client->callSync(new GetEmojiStatusGroupsRequest($hash));
    }

    /**
     * @param int $hash
     * @return EmojiGroupsNotModified|EmojiGroups|null
     * @see https://core.telegram.org/method/messages.getEmojiProfilePhotoGroups
     * @api
     */
    public function getEmojiProfilePhotoGroups(int $hash): ?AbstractEmojiGroups
    {
        return $this->client->callSync(new GetEmojiProfilePhotoGroupsRequest($hash));
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
        return $this->client->callSync(new SearchCustomEmojiRequest($emoticon, $hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param bool|null $disabled
     * @return bool
     * @see https://core.telegram.org/method/messages.togglePeerTranslations
     * @api
     */
    public function togglePeerTranslations(AbstractInputPeer $peer, ?bool $disabled = null): bool
    {
        return (bool) $this->client->callSync(new TogglePeerTranslationsRequest($peer, $disabled));
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
        return $this->client->callSync(new GetBotAppRequest($app, $hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
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
    public function requestAppWebView(AbstractInputPeer $peer, AbstractInputBotApp $app, string $platform, ?bool $writeAllowed = null, ?bool $compact = null, ?bool $fullscreen = null, ?string $startParam = null, ?array $themeParams = null): ?WebViewResult
    {
        return $this->client->callSync(new RequestAppWebViewRequest($peer, $app, $platform, $writeAllowed, $compact, $fullscreen, $startParam, $themeParams));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param bool|null $forBoth
     * @param bool|null $revert
     * @param InputWallPaper|InputWallPaperSlug|InputWallPaperNoFile|null $wallpaper
     * @param WallPaperSettings|null $settings
     * @param int|null $id
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.setChatWallPaper
     * @api
     */
    public function setChatWallPaper(AbstractInputPeer $peer, ?bool $forBoth = null, ?bool $revert = null, ?AbstractInputWallPaper $wallpaper = null, ?WallPaperSettings $settings = null, ?int $id = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SetChatWallPaperRequest($peer, $forBoth, $revert, $wallpaper, $settings, $id));
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
        return $this->client->callSync(new SearchEmojiStickerSetsRequest($q, $hash, $excludeFeatured));
    }

    /**
     * @param int $offsetDate
     * @param int $offsetId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $offsetPeer
     * @param int $limit
     * @param int $hash
     * @param bool|null $excludePinned
     * @return SavedDialogs|SavedDialogsSlice|SavedDialogsNotModified|null
     * @see https://core.telegram.org/method/messages.getSavedDialogs
     * @api
     */
    public function getSavedDialogs(int $offsetDate, int $offsetId, AbstractInputPeer $offsetPeer, int $limit, int $hash, ?bool $excludePinned = null): ?AbstractSavedDialogs
    {
        return $this->client->callSync(new GetSavedDialogsRequest($offsetDate, $offsetId, $offsetPeer, $limit, $hash, $excludePinned));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $offsetId
     * @param int $offsetDate
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int $hash
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getSavedHistory
     * @api
     */
    public function getSavedHistory(AbstractInputPeer $peer, int $offsetId, int $offsetDate, int $addOffset, int $limit, int $maxId, int $minId, int $hash): ?AbstractMessages
    {
        return $this->client->callSync(new GetSavedHistoryRequest($peer, $offsetId, $offsetDate, $addOffset, $limit, $maxId, $minId, $hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $maxId
     * @param int|null $minDate
     * @param int|null $maxDate
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/messages.deleteSavedHistory
     * @api
     */
    public function deleteSavedHistory(AbstractInputPeer $peer, int $maxId, ?int $minDate = null, ?int $maxDate = null): ?AffectedHistory
    {
        return $this->client->callSync(new DeleteSavedHistoryRequest($peer, $maxId, $minDate, $maxDate));
    }

    /**
     * @return SavedDialogs|SavedDialogsSlice|SavedDialogsNotModified|null
     * @see https://core.telegram.org/method/messages.getPinnedSavedDialogs
     * @api
     */
    public function getPinnedSavedDialogs(): ?AbstractSavedDialogs
    {
        return $this->client->callSync(new GetPinnedSavedDialogsRequest());
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
        return (bool) $this->client->callSync(new ToggleSavedDialogPinRequest($peer, $pinned));
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
        return (bool) $this->client->callSync(new ReorderPinnedSavedDialogsRequest($order, $force));
    }

    /**
     * @param int $hash
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $peer
     * @return SavedReactionTagsNotModified|SavedReactionTags|null
     * @see https://core.telegram.org/method/messages.getSavedReactionTags
     * @api
     */
    public function getSavedReactionTags(int $hash, ?AbstractInputPeer $peer = null): ?AbstractSavedReactionTags
    {
        return $this->client->callSync(new GetSavedReactionTagsRequest($hash, $peer));
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
        return (bool) $this->client->callSync(new UpdateSavedReactionTagRequest($reaction, $title));
    }

    /**
     * @param int $hash
     * @return ReactionsNotModified|Reactions|null
     * @see https://core.telegram.org/method/messages.getDefaultTagReactions
     * @api
     */
    public function getDefaultTagReactions(int $hash): ?AbstractReactions
    {
        return $this->client->callSync(new GetDefaultTagReactionsRequest($hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @return OutboxReadDate|null
     * @see https://core.telegram.org/method/messages.getOutboxReadDate
     * @api
     */
    public function getOutboxReadDate(AbstractInputPeer $peer, int $msgId): ?OutboxReadDate
    {
        return $this->client->callSync(new GetOutboxReadDateRequest($peer, $msgId));
    }

    /**
     * @param int $hash
     * @return QuickReplies|QuickRepliesNotModified|null
     * @see https://core.telegram.org/method/messages.getQuickReplies
     * @api
     */
    public function getQuickReplies(int $hash): ?AbstractQuickReplies
    {
        return $this->client->callSync(new GetQuickRepliesRequest($hash));
    }

    /**
     * @param list<int> $order
     * @return bool
     * @see https://core.telegram.org/method/messages.reorderQuickReplies
     * @api
     */
    public function reorderQuickReplies(array $order): bool
    {
        return (bool) $this->client->callSync(new ReorderQuickRepliesRequest($order));
    }

    /**
     * @param string $shortcut
     * @return bool
     * @see https://core.telegram.org/method/messages.checkQuickReplyShortcut
     * @api
     */
    public function checkQuickReplyShortcut(string $shortcut): bool
    {
        return (bool) $this->client->callSync(new CheckQuickReplyShortcutRequest($shortcut));
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
        return (bool) $this->client->callSync(new EditQuickReplyShortcutRequest($shortcutId, $shortcut));
    }

    /**
     * @param int $shortcutId
     * @return bool
     * @see https://core.telegram.org/method/messages.deleteQuickReplyShortcut
     * @api
     */
    public function deleteQuickReplyShortcut(int $shortcutId): bool
    {
        return (bool) $this->client->callSync(new DeleteQuickReplyShortcutRequest($shortcutId));
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
        return $this->client->callSync(new GetQuickReplyMessagesRequest($shortcutId, $hash, $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $shortcutId
     * @param list<int> $id
     * @param list<int> $randomId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendQuickReplyMessages
     * @api
     */
    public function sendQuickReplyMessages(AbstractInputPeer $peer, int $shortcutId, array $id, array $randomId): ?AbstractUpdates
    {
        return $this->client->callSync(new SendQuickReplyMessagesRequest($peer, $shortcutId, $id, $randomId));
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
        return $this->client->callSync(new DeleteQuickReplyMessagesRequest($shortcutId, $id));
    }

    /**
     * @param bool $enabled
     * @return bool
     * @see https://core.telegram.org/method/messages.toggleDialogFilterTags
     * @api
     */
    public function toggleDialogFilterTags(bool $enabled): bool
    {
        return (bool) $this->client->callSync(new ToggleDialogFilterTagsRequest($enabled));
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
        return $this->client->callSync(new GetMyStickersRequest($offsetId, $limit));
    }

    /**
     * @param int $hash
     * @return EmojiGroupsNotModified|EmojiGroups|null
     * @see https://core.telegram.org/method/messages.getEmojiStickerGroups
     * @api
     */
    public function getEmojiStickerGroups(int $hash): ?AbstractEmojiGroups
    {
        return $this->client->callSync(new GetEmojiStickerGroupsRequest($hash));
    }

    /**
     * @param int $hash
     * @return AvailableEffectsNotModified|AvailableEffects|null
     * @see https://core.telegram.org/method/messages.getAvailableEffects
     * @api
     */
    public function getAvailableEffects(int $hash): ?AbstractAvailableEffects
    {
        return $this->client->callSync(new GetAvailableEffectsRequest($hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @param TextWithEntities $text
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.editFactCheck
     * @api
     */
    public function editFactCheck(AbstractInputPeer $peer, int $msgId, TextWithEntities $text): ?AbstractUpdates
    {
        return $this->client->callSync(new EditFactCheckRequest($peer, $msgId, $text));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.deleteFactCheck
     * @api
     */
    public function deleteFactCheck(AbstractInputPeer $peer, int $msgId): ?AbstractUpdates
    {
        return $this->client->callSync(new DeleteFactCheckRequest($peer, $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $msgId
     * @return list<FactCheck>
     * @see https://core.telegram.org/method/messages.getFactCheck
     * @api
     */
    public function getFactCheck(AbstractInputPeer $peer, array $msgId): array
    {
        return $this->client->callSync(new GetFactCheckRequest($peer, $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param string $platform
     * @param bool|null $compact
     * @param bool|null $fullscreen
     * @param string|null $startParam
     * @param array|null $themeParams
     * @return WebViewResult|null
     * @see https://core.telegram.org/method/messages.requestMainWebView
     * @api
     */
    public function requestMainWebView(AbstractInputPeer $peer, AbstractInputUser $bot, string $platform, ?bool $compact = null, ?bool $fullscreen = null, ?string $startParam = null, ?array $themeParams = null): ?WebViewResult
    {
        return $this->client->callSync(new RequestMainWebViewRequest($peer, $bot, $platform, $compact, $fullscreen, $startParam, $themeParams));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @param int $count
     * @param int $randomId
     * @param bool|null $private
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendPaidReaction
     * @api
     */
    public function sendPaidReaction(AbstractInputPeer $peer, int $msgId, int $count, int $randomId, ?bool $private = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SendPaidReactionRequest($peer, $msgId, $count, $randomId, $private));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @param bool $private
     * @return bool
     * @see https://core.telegram.org/method/messages.togglePaidReactionPrivacy
     * @api
     */
    public function togglePaidReactionPrivacy(AbstractInputPeer $peer, int $msgId, bool $private): bool
    {
        return (bool) $this->client->callSync(new TogglePaidReactionPrivacyRequest($peer, $msgId, $private));
    }

    /**
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.getPaidReactionPrivacy
     * @api
     */
    public function getPaidReactionPrivacy(): ?AbstractUpdates
    {
        return $this->client->callSync(new GetPaidReactionPrivacyRequest());
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $randomId
     * @return bool
     * @see https://core.telegram.org/method/messages.viewSponsoredMessage
     * @api
     */
    public function viewSponsoredMessage(AbstractInputPeer $peer, string $randomId): bool
    {
        return (bool) $this->client->callSync(new ViewSponsoredMessageRequest($peer, $randomId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $randomId
     * @param bool|null $media
     * @param bool|null $fullscreen
     * @return bool
     * @see https://core.telegram.org/method/messages.clickSponsoredMessage
     * @api
     */
    public function clickSponsoredMessage(AbstractInputPeer $peer, string $randomId, ?bool $media = null, ?bool $fullscreen = null): bool
    {
        return (bool) $this->client->callSync(new ClickSponsoredMessageRequest($peer, $randomId, $media, $fullscreen));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $randomId
     * @param string $option
     * @return SponsoredMessageReportResultChooseOption|SponsoredMessageReportResultAdsHidden|SponsoredMessageReportResultReported|null
     * @see https://core.telegram.org/method/messages.reportSponsoredMessage
     * @api
     */
    public function reportSponsoredMessage(AbstractInputPeer $peer, string $randomId, string $option): ?AbstractSponsoredMessageReportResult
    {
        return $this->client->callSync(new ReportSponsoredMessageRequest($peer, $randomId, $option));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return SponsoredMessages|SponsoredMessagesEmpty|null
     * @see https://core.telegram.org/method/messages.getSponsoredMessages
     * @api
     */
    public function getSponsoredMessages(AbstractInputPeer $peer): ?AbstractSponsoredMessages
    {
        return $this->client->callSync(new GetSponsoredMessagesRequest($peer));
    }

    /**
     * @param InputBotInlineResult|InputBotInlineResultPhoto|InputBotInlineResultDocument|InputBotInlineResultGame $result
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param list<InlineQueryPeerType>|null $peerTypes
     * @return BotPreparedInlineMessage|null
     * @see https://core.telegram.org/method/messages.savePreparedInlineMessage
     * @api
     */
    public function savePreparedInlineMessage(AbstractInputBotInlineResult $result, AbstractInputUser $userId, ?array $peerTypes = null): ?BotPreparedInlineMessage
    {
        return $this->client->callSync(new SavePreparedInlineMessageRequest($result, $userId, $peerTypes));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param string $id
     * @return PreparedInlineMessage|null
     * @see https://core.telegram.org/method/messages.getPreparedInlineMessage
     * @api
     */
    public function getPreparedInlineMessage(AbstractInputUser $bot, string $id): ?PreparedInlineMessage
    {
        return $this->client->callSync(new GetPreparedInlineMessageRequest($bot, $id));
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
        return $this->client->callSync(new SearchStickersRequest($q, $emoticon, $langCode, $offset, $limit, $hash, $emojis));
    }
}