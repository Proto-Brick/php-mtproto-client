<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

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
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\DiscardEncryptionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditChatAboutRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditChatAdminRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditChatDefaultBannedRightsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditChatPhotoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditChatTitleRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditExportedChatInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Messages\EditFactCheckRequest;
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
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param ReplyKeyboardHide|ReplyKeyboardForceReply|ReplyKeyboardMarkup|ReplyInlineMarkup|null $replyMarkup
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param int|null $scheduleDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $effect
     * @param int|null $allowPaidStars
     * @param SuggestedPost|null $suggestedPost
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendMessage
     * @api
     */
    public function sendMessage(AbstractInputPeer $peer, string $message, int $randomId, ?bool $noWebpage = null, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $noforwards = null, ?bool $updateStickersetsOrder = null, ?bool $invertMedia = null, ?bool $allowPaidFloodskip = null, ?AbstractInputReplyTo $replyTo = null, ?AbstractReplyMarkup $replyMarkup = null, ?array $entities = null, ?int $scheduleDate = null, ?AbstractInputPeer $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $effect = null, ?int $allowPaidStars = null, ?SuggestedPost $suggestedPost = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SendMessageRequest($peer, $message, $randomId, $noWebpage, $silent, $background, $clearDraft, $noforwards, $updateStickersetsOrder, $invertMedia, $allowPaidFloodskip, $replyTo, $replyMarkup, $entities, $scheduleDate, $sendAs, $quickReplyShortcut, $effect, $allowPaidStars, $suggestedPost));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $media
     * @param string $message
     * @param int $randomId
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $clearDraft
     * @param bool|null $noforwards
     * @param bool|null $updateStickersetsOrder
     * @param bool|null $invertMedia
     * @param bool|null $allowPaidFloodskip
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param ReplyKeyboardHide|ReplyKeyboardForceReply|ReplyKeyboardMarkup|ReplyInlineMarkup|null $replyMarkup
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param int|null $scheduleDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $effect
     * @param int|null $allowPaidStars
     * @param SuggestedPost|null $suggestedPost
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendMedia
     * @api
     */
    public function sendMedia(AbstractInputPeer $peer, AbstractInputMedia $media, string $message, int $randomId, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $noforwards = null, ?bool $updateStickersetsOrder = null, ?bool $invertMedia = null, ?bool $allowPaidFloodskip = null, ?AbstractInputReplyTo $replyTo = null, ?AbstractReplyMarkup $replyMarkup = null, ?array $entities = null, ?int $scheduleDate = null, ?AbstractInputPeer $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $effect = null, ?int $allowPaidStars = null, ?SuggestedPost $suggestedPost = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SendMediaRequest($peer, $media, $message, $randomId, $silent, $background, $clearDraft, $noforwards, $updateStickersetsOrder, $invertMedia, $allowPaidFloodskip, $replyTo, $replyMarkup, $entities, $scheduleDate, $sendAs, $quickReplyShortcut, $effect, $allowPaidStars, $suggestedPost));
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
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param int|null $scheduleDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $videoTimestamp
     * @param int|null $allowPaidStars
     * @param SuggestedPost|null $suggestedPost
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.forwardMessages
     * @api
     */
    public function forwardMessages(AbstractInputPeer $fromPeer, array $id, array $randomId, AbstractInputPeer $toPeer, ?bool $silent = null, ?bool $background = null, ?bool $withMyScore = null, ?bool $dropAuthor = null, ?bool $dropMediaCaptions = null, ?bool $noforwards = null, ?bool $allowPaidFloodskip = null, ?int $topMsgId = null, ?AbstractInputReplyTo $replyTo = null, ?int $scheduleDate = null, ?AbstractInputPeer $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $videoTimestamp = null, ?int $allowPaidStars = null, ?SuggestedPost $suggestedPost = null): ?AbstractUpdates
    {
        return $this->client->callSync(new ForwardMessagesRequest($fromPeer, $id, $randomId, $toPeer, $silent, $background, $withMyScore, $dropAuthor, $dropMediaCaptions, $noforwards, $allowPaidFloodskip, $topMsgId, $replyTo, $scheduleDate, $sendAs, $quickReplyShortcut, $videoTimestamp, $allowPaidStars, $suggestedPost));
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
     * @return WebPagePreview|null
     * @see https://core.telegram.org/method/messages.getWebPagePreview
     * @api
     */
    public function getWebPagePreview(string $message, ?array $entities = null): ?WebPagePreview
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
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
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
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
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
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
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
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param int|null $scheduleDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $allowPaidStars
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendInlineBotResult
     * @api
     */
    public function sendInlineBotResult(AbstractInputPeer $peer, int $randomId, int $queryId, string $id, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $hideVia = null, ?AbstractInputReplyTo $replyTo = null, ?int $scheduleDate = null, ?AbstractInputPeer $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $allowPaidStars = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SendInlineBotResultRequest($peer, $randomId, $queryId, $id, $silent, $background, $clearDraft, $hideVia, $replyTo, $scheduleDate, $sendAs, $quickReplyShortcut, $allowPaidStars));
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
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo|null $media
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
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo|null $media
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
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo|null $media
     * @param int|null $effect
     * @param SuggestedPost|null $suggestedPost
     * @return bool
     * @see https://core.telegram.org/method/messages.saveDraft
     * @api
     */
    public function saveDraft(AbstractInputPeer $peer, string $message, ?bool $noWebpage = null, ?bool $invertMedia = null, ?AbstractInputReplyTo $replyTo = null, ?array $entities = null, ?AbstractInputMedia $media = null, ?int $effect = null, ?SuggestedPost $suggestedPost = null): bool
    {
        return (bool) $this->client->callSync(new SaveDraftRequest($peer, $message, $noWebpage, $invertMedia, $replyTo, $entities, $media, $effect, $suggestedPost));
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
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $media
     * @param string|null $businessConnectionId
     * @return MessageMediaEmpty|MessageMediaPhoto|MessageMediaGeo|MessageMediaContact|MessageMediaUnsupported|MessageMediaDocument|MessageMediaWebPage|MessageMediaVenue|MessageMediaGame|MessageMediaInvoice|MessageMediaGeoLive|MessageMediaPoll|MessageMediaDice|MessageMediaStory|MessageMediaGiveaway|MessageMediaGiveawayResults|MessageMediaPaidMedia|MessageMediaToDo|null
     * @see https://core.telegram.org/method/messages.uploadMedia
     * @api
     */
    public function uploadMedia(AbstractInputPeer $peer, AbstractInputMedia $media, ?string $businessConnectionId = null): ?AbstractMessageMedia
    {
        return $this->client->callSync(new UploadMediaRequest($peer, $media, $businessConnectionId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum $replyTo
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
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
     * @param int|null $scheduleDate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $sendAs
     * @param InputQuickReplyShortcut|InputQuickReplyShortcutId|null $quickReplyShortcut
     * @param int|null $effect
     * @param int|null $allowPaidStars
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendMultiMedia
     * @api
     */
    public function sendMultiMedia(AbstractInputPeer $peer, array $multiMedia, ?bool $silent = null, ?bool $background = null, ?bool $clearDraft = null, ?bool $noforwards = null, ?bool $updateStickersetsOrder = null, ?bool $invertMedia = null, ?bool $allowPaidFloodskip = null, ?AbstractInputReplyTo $replyTo = null, ?int $scheduleDate = null, ?AbstractInputPeer $sendAs = null, ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null, ?int $effect = null, ?int $allowPaidStars = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SendMultiMediaRequest($peer, $multiMedia, $silent, $background, $clearDraft, $noforwards, $updateStickersetsOrder, $invertMedia, $allowPaidFloodskip, $replyTo, $scheduleDate, $sendAs, $quickReplyShortcut, $effect, $allowPaidStars));
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
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $parentPeer
     * @return bool
     * @see https://core.telegram.org/method/messages.markDialogUnread
     * @api
     */
    public function markDialogUnread(AbstractInputDialogPeer $peer, ?bool $unread = null, ?AbstractInputPeer $parentPeer = null): bool
    {
        return (bool) $this->client->callSync(new MarkDialogUnreadRequest($peer, $unread, $parentPeer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $parentPeer
     * @return list<DialogPeer|DialogPeerFolder>
     * @see https://core.telegram.org/method/messages.getDialogUnreadMarks
     * @api
     */
    public function getDialogUnreadMarks(?AbstractInputPeer $parentPeer = null): array
    {
        return $this->client->callSync(new GetDialogUnreadMarksRequest($parentPeer));
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
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $savedPeerId
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/messages.unpinAllMessages
     * @api
     */
    public function unpinAllMessages(AbstractInputPeer $peer, ?int $topMsgId = null, ?AbstractInputPeer $savedPeerId = null): ?AffectedHistory
    {
        return $this->client->callSync(new UnpinAllMessagesRequest($peer, $topMsgId, $savedPeerId));
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
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $media
     * @return MessageMediaEmpty|MessageMediaPhoto|MessageMediaGeo|MessageMediaContact|MessageMediaUnsupported|MessageMediaDocument|MessageMediaWebPage|MessageMediaVenue|MessageMediaGame|MessageMediaInvoice|MessageMediaGeoLive|MessageMediaPoll|MessageMediaDice|MessageMediaStory|MessageMediaGiveaway|MessageMediaGiveawayResults|MessageMediaPaidMedia|MessageMediaToDo|null
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
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $savedPeerId
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getUnreadReactions
     * @api
     */
    public function getUnreadReactions(AbstractInputPeer $peer, int $offsetId, int $addOffset, int $limit, int $maxId, int $minId, ?int $topMsgId = null, ?AbstractInputPeer $savedPeerId = null): ?AbstractMessages
    {
        return $this->client->callSync(new GetUnreadReactionsRequest($peer, $offsetId, $addOffset, $limit, $maxId, $minId, $topMsgId, $savedPeerId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int|null $topMsgId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $savedPeerId
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/messages.readReactions
     * @api
     */
    public function readReactions(AbstractInputPeer $peer, ?int $topMsgId = null, ?AbstractInputPeer $savedPeerId = null): ?AffectedHistory
    {
        return $this->client->callSync(new ReadReactionsRequest($peer, $topMsgId, $savedPeerId));
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
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
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
     * @param InputReplyToMessage|InputReplyToStory|InputReplyToMonoForum|null $replyTo
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
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $parentPeer
     * @return SavedDialogs|SavedDialogsSlice|SavedDialogsNotModified|null
     * @see https://core.telegram.org/method/messages.getSavedDialogs
     * @api
     */
    public function getSavedDialogs(int $offsetDate, int $offsetId, AbstractInputPeer $offsetPeer, int $limit, int $hash, ?bool $excludePinned = null, ?AbstractInputPeer $parentPeer = null): ?AbstractSavedDialogs
    {
        return $this->client->callSync(new GetSavedDialogsRequest($offsetDate, $offsetId, $offsetPeer, $limit, $hash, $excludePinned, $parentPeer));
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
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $parentPeer
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/messages.getSavedHistory
     * @api
     */
    public function getSavedHistory(AbstractInputPeer $peer, int $offsetId, int $offsetDate, int $addOffset, int $limit, int $maxId, int $minId, int $hash, ?AbstractInputPeer $parentPeer = null): ?AbstractMessages
    {
        return $this->client->callSync(new GetSavedHistoryRequest($peer, $offsetId, $offsetDate, $addOffset, $limit, $maxId, $minId, $hash, $parentPeer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $maxId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $parentPeer
     * @param int|null $minDate
     * @param int|null $maxDate
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/messages.deleteSavedHistory
     * @api
     */
    public function deleteSavedHistory(AbstractInputPeer $peer, int $maxId, ?AbstractInputPeer $parentPeer = null, ?int $minDate = null, ?int $maxDate = null): ?AffectedHistory
    {
        return $this->client->callSync(new DeleteSavedHistoryRequest($peer, $maxId, $parentPeer, $minDate, $maxDate));
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
     * @param PaidReactionPrivacyDefault|PaidReactionPrivacyAnonymous|PaidReactionPrivacyPeer|null $private
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.sendPaidReaction
     * @api
     */
    public function sendPaidReaction(AbstractInputPeer $peer, int $msgId, int $count, int $randomId, ?AbstractPaidReactionPrivacy $private = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SendPaidReactionRequest($peer, $msgId, $count, $randomId, $private));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @param PaidReactionPrivacyDefault|PaidReactionPrivacyAnonymous|PaidReactionPrivacyPeer $private
     * @return bool
     * @see https://core.telegram.org/method/messages.togglePaidReactionPrivacy
     * @api
     */
    public function togglePaidReactionPrivacy(AbstractInputPeer $peer, int $msgId, AbstractPaidReactionPrivacy $private): bool
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
     * @param string $randomId
     * @return bool
     * @see https://core.telegram.org/method/messages.viewSponsoredMessage
     * @api
     */
    public function viewSponsoredMessage(string $randomId): bool
    {
        return (bool) $this->client->callSync(new ViewSponsoredMessageRequest($randomId));
    }

    /**
     * @param string $randomId
     * @param bool|null $media
     * @param bool|null $fullscreen
     * @return bool
     * @see https://core.telegram.org/method/messages.clickSponsoredMessage
     * @api
     */
    public function clickSponsoredMessage(string $randomId, ?bool $media = null, ?bool $fullscreen = null): bool
    {
        return (bool) $this->client->callSync(new ClickSponsoredMessageRequest($randomId, $media, $fullscreen));
    }

    /**
     * @param string $randomId
     * @param string $option
     * @return SponsoredMessageReportResultChooseOption|SponsoredMessageReportResultAdsHidden|SponsoredMessageReportResultReported|null
     * @see https://core.telegram.org/method/messages.reportSponsoredMessage
     * @api
     */
    public function reportSponsoredMessage(string $randomId, string $option): ?AbstractSponsoredMessageReportResult
    {
        return $this->client->callSync(new ReportSponsoredMessageRequest($randomId, $option));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int|null $msgId
     * @return SponsoredMessages|SponsoredMessagesEmpty|null
     * @see https://core.telegram.org/method/messages.getSponsoredMessages
     * @api
     */
    public function getSponsoredMessages(AbstractInputPeer $peer, ?int $msgId = null): ?AbstractSponsoredMessages
    {
        return $this->client->callSync(new GetSponsoredMessagesRequest($peer, $msgId));
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

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $id
     * @param bool|null $push
     * @return bool
     * @see https://core.telegram.org/method/messages.reportMessagesDelivery
     * @api
     */
    public function reportMessagesDelivery(AbstractInputPeer $peer, array $id, ?bool $push = null): bool
    {
        return (bool) $this->client->callSync(new ReportMessagesDeliveryRequest($peer, $id, $push));
    }

    /**
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $ids
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $parentPeer
     * @return SavedDialogs|SavedDialogsSlice|SavedDialogsNotModified|null
     * @see https://core.telegram.org/method/messages.getSavedDialogsByID
     * @api
     */
    public function getSavedDialogsByID(array $ids, ?AbstractInputPeer $parentPeer = null): ?AbstractSavedDialogs
    {
        return $this->client->callSync(new GetSavedDialogsByIDRequest($ids, $parentPeer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $parentPeer
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $maxId
     * @return bool
     * @see https://core.telegram.org/method/messages.readSavedHistory
     * @api
     */
    public function readSavedHistory(AbstractInputPeer $parentPeer, AbstractInputPeer $peer, int $maxId): bool
    {
        return (bool) $this->client->callSync(new ReadSavedHistoryRequest($parentPeer, $peer, $maxId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @param list<int> $completed
     * @param list<int> $incompleted
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.toggleTodoCompleted
     * @api
     */
    public function toggleTodoCompleted(AbstractInputPeer $peer, int $msgId, array $completed, array $incompleted): ?AbstractUpdates
    {
        return $this->client->callSync(new ToggleTodoCompletedRequest($peer, $msgId, $completed, $incompleted));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @param list<TodoItem> $list_
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.appendTodoList
     * @api
     */
    public function appendTodoList(AbstractInputPeer $peer, int $msgId, array $list_): ?AbstractUpdates
    {
        return $this->client->callSync(new AppendTodoListRequest($peer, $msgId, $list_));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @param bool|null $reject
     * @param int|null $scheduleDate
     * @param string|null $rejectComment
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/messages.toggleSuggestedPostApproval
     * @api
     */
    public function toggleSuggestedPostApproval(AbstractInputPeer $peer, int $msgId, ?bool $reject = null, ?int $scheduleDate = null, ?string $rejectComment = null): ?AbstractUpdates
    {
        return $this->client->callSync(new ToggleSuggestedPostApprovalRequest($peer, $msgId, $reject, $scheduleDate, $rejectComment));
    }
}