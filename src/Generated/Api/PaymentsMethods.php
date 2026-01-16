<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Api;

use Amp\Future;
use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\ApplyGiftCodeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\AssignAppStoreTransactionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\AssignPlayMarketTransactionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\BotCancelStarsSubscriptionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\CanPurchaseStoreRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\ChangeStarsSubscriptionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\CheckCanSendGiftRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\CheckGiftCodeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\ClearSavedInfoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\ConnectStarRefBotRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\ConvertStarGiftRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\CreateStarGiftCollectionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\DeleteStarGiftCollectionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\EditConnectedStarRefBotRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\ExportInvoiceRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\FulfillStarsSubscriptionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetBankCardDataRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetConnectedStarRefBotRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetConnectedStarRefBotsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetGiveawayInfoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetPaymentFormRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetPaymentReceiptRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetPremiumGiftCodeOptionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetResaleStarGiftsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetSavedInfoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetSavedStarGiftRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetSavedStarGiftsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarGiftActiveAuctionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarGiftAuctionAcquiredGiftsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarGiftAuctionStateRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarGiftCollectionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarGiftUpgradeAttributesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarGiftUpgradePreviewRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarGiftWithdrawalUrlRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarGiftsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarsGiftOptionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarsGiveawayOptionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarsRevenueAdsAccountUrlRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarsRevenueStatsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarsRevenueWithdrawalUrlRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarsStatusRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarsSubscriptionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarsTopupOptionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarsTransactionsByIDRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetStarsTransactionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetSuggestedStarRefBotsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetUniqueStarGiftRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\GetUniqueStarGiftValueInfoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\LaunchPrepaidGiveawayRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\RefundStarsChargeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\ReorderStarGiftCollectionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\ResolveStarGiftOfferRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\SaveStarGiftRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\SendPaymentFormRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\SendStarGiftOfferRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\SendStarsFormRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\ToggleChatStarGiftNotificationsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\ToggleStarGiftsPinnedToTopRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\TransferStarGiftRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\UpdateStarGiftCollectionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\UpdateStarGiftPriceRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\UpgradeStarGiftRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Payments\ValidateRequestedInfoRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputInvoice;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPaymentCredentials;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStarGiftAuction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStorePaymentPurpose;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStarGiftAttributeId;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStarsAmount;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputCheckPasswordEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputInvoiceBusinessBotTransferStars;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputInvoiceChatInviteSubscription;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputInvoiceMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputInvoicePremiumAuthCode;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputInvoicePremiumGiftCode;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputInvoicePremiumGiftStars;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputInvoiceSlug;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputInvoiceStarGift;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputInvoiceStarGiftAuctionBid;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputInvoiceStarGiftDropOriginalDetails;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputInvoiceStarGiftPrepaidUpgrade;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputInvoiceStarGiftResale;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputInvoiceStarGiftTransfer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputInvoiceStarGiftUpgrade;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputInvoiceStars;
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
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPaymentCredentials;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPaymentCredentialsApplePay;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPaymentCredentialsGooglePay;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPaymentCredentialsSaved;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputSavedStarGiftChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputSavedStarGiftSlug;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputSavedStarGiftUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStarGiftAuction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStarGiftAuctionSlug;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStarsTransaction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStorePaymentAuthCode;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStorePaymentGiftPremium;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStorePaymentPremiumGiftCode;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStorePaymentPremiumGiveaway;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStorePaymentPremiumSubscription;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStorePaymentStarsGift;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStorePaymentStarsGiveaway;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStorePaymentStarsTopup;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PaymentRequestedInfo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PremiumGiftCodeOption;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarGiftAttributeIdBackdrop;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarGiftAttributeIdModel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarGiftAttributeIdPattern;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarGiftCollection;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarsAmount;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarsGiftOption;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarsGiveawayOption;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarsTonAmount;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarsTopupOption;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShort;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortChatMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortSentMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Updates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesCombined;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesTooLong;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractCheckCanSendGiftResult;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractGiveawayInfo;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractPaymentForm;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractPaymentReceipt;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractPaymentResult;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractStarGiftActiveAuctions;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractStarGiftCollections;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractStarGifts;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\BankCardData;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\CheckCanSendGiftResultFail;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\CheckCanSendGiftResultOk;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\CheckedGiftCode;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\ConnectedStarRefBots;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\ExportedInvoice;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\GiveawayInfo;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\GiveawayInfoResults;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\PaymentForm;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\PaymentFormStarGift;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\PaymentFormStars;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\PaymentReceipt;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\PaymentReceiptStars;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\PaymentResult;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\PaymentVerificationNeeded;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\ResaleStarGifts;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\SavedInfo;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\SavedStarGifts;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGiftActiveAuctions;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGiftActiveAuctionsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGiftAuctionAcquiredGifts;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGiftAuctionState;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGiftCollections;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGiftCollectionsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGiftUpgradeAttributes;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGiftUpgradePreview;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGiftWithdrawalUrl;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGifts;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGiftsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarsRevenueAdsAccountUrl;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarsRevenueStats;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarsRevenueWithdrawalUrl;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarsStatus;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\SuggestedStarRefBots;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\UniqueStarGift;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\UniqueStarGiftValueInfo;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\ValidatedRequestedInfo;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "payments" group.
 */
final readonly class PaymentsMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift|InputInvoiceStarGiftUpgrade|InputInvoiceStarGiftTransfer|InputInvoicePremiumGiftStars|InputInvoiceBusinessBotTransferStars|InputInvoiceStarGiftResale|InputInvoiceStarGiftPrepaidUpgrade|InputInvoicePremiumAuthCode|InputInvoiceStarGiftDropOriginalDetails|InputInvoiceStarGiftAuctionBid $invoice
     * @param array|null $themeParams
     * @return Future<PaymentForm|PaymentFormStars|PaymentFormStarGift|null>
     * @see https://core.telegram.org/method/payments.getPaymentForm
     * @api
     */
    public function getPaymentFormAsync(AbstractInputInvoice $invoice, ?array $themeParams = null): Future
    {
        return $this->client->call(new GetPaymentFormRequest(invoice: $invoice, themeParams: $themeParams));
    }

    /**
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift|InputInvoiceStarGiftUpgrade|InputInvoiceStarGiftTransfer|InputInvoicePremiumGiftStars|InputInvoiceBusinessBotTransferStars|InputInvoiceStarGiftResale|InputInvoiceStarGiftPrepaidUpgrade|InputInvoicePremiumAuthCode|InputInvoiceStarGiftDropOriginalDetails|InputInvoiceStarGiftAuctionBid $invoice
     * @param array|null $themeParams
     * @return PaymentForm|PaymentFormStars|PaymentFormStarGift|null
     * @see https://core.telegram.org/method/payments.getPaymentForm
     * @api
     */
    public function getPaymentForm(AbstractInputInvoice $invoice, ?array $themeParams = null): ?AbstractPaymentForm
    {
        return $this->getPaymentFormAsync(invoice: $invoice, themeParams: $themeParams)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return Future<PaymentReceipt|PaymentReceiptStars|null>
     * @see https://core.telegram.org/method/payments.getPaymentReceipt
     * @api
     */
    public function getPaymentReceiptAsync(AbstractInputPeer|string|int $peer, int $msgId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetPaymentReceiptRequest(peer: $peer, msgId: $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return PaymentReceipt|PaymentReceiptStars|null
     * @see https://core.telegram.org/method/payments.getPaymentReceipt
     * @api
     */
    public function getPaymentReceipt(AbstractInputPeer|string|int $peer, int $msgId): ?AbstractPaymentReceipt
    {
        return $this->getPaymentReceiptAsync(peer: $peer, msgId: $msgId)->await();
    }

    /**
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift|InputInvoiceStarGiftUpgrade|InputInvoiceStarGiftTransfer|InputInvoicePremiumGiftStars|InputInvoiceBusinessBotTransferStars|InputInvoiceStarGiftResale|InputInvoiceStarGiftPrepaidUpgrade|InputInvoicePremiumAuthCode|InputInvoiceStarGiftDropOriginalDetails|InputInvoiceStarGiftAuctionBid $invoice
     * @param PaymentRequestedInfo $info
     * @param bool|null $save
     * @return Future<ValidatedRequestedInfo|null>
     * @see https://core.telegram.org/method/payments.validateRequestedInfo
     * @api
     */
    public function validateRequestedInfoAsync(AbstractInputInvoice $invoice, PaymentRequestedInfo $info, ?bool $save = null): Future
    {
        return $this->client->call(new ValidateRequestedInfoRequest(invoice: $invoice, info: $info, save: $save));
    }

    /**
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift|InputInvoiceStarGiftUpgrade|InputInvoiceStarGiftTransfer|InputInvoicePremiumGiftStars|InputInvoiceBusinessBotTransferStars|InputInvoiceStarGiftResale|InputInvoiceStarGiftPrepaidUpgrade|InputInvoicePremiumAuthCode|InputInvoiceStarGiftDropOriginalDetails|InputInvoiceStarGiftAuctionBid $invoice
     * @param PaymentRequestedInfo $info
     * @param bool|null $save
     * @return ValidatedRequestedInfo|null
     * @see https://core.telegram.org/method/payments.validateRequestedInfo
     * @api
     */
    public function validateRequestedInfo(AbstractInputInvoice $invoice, PaymentRequestedInfo $info, ?bool $save = null): ?ValidatedRequestedInfo
    {
        return $this->validateRequestedInfoAsync(invoice: $invoice, info: $info, save: $save)->await();
    }

    /**
     * @param int $formId
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift|InputInvoiceStarGiftUpgrade|InputInvoiceStarGiftTransfer|InputInvoicePremiumGiftStars|InputInvoiceBusinessBotTransferStars|InputInvoiceStarGiftResale|InputInvoiceStarGiftPrepaidUpgrade|InputInvoicePremiumAuthCode|InputInvoiceStarGiftDropOriginalDetails|InputInvoiceStarGiftAuctionBid $invoice
     * @param InputPaymentCredentialsSaved|InputPaymentCredentials|InputPaymentCredentialsApplePay|InputPaymentCredentialsGooglePay $credentials
     * @param string|null $requestedInfoId
     * @param string|null $shippingOptionId
     * @param int|null $tipAmount
     * @return Future<PaymentResult|PaymentVerificationNeeded|null>
     * @see https://core.telegram.org/method/payments.sendPaymentForm
     * @api
     */
    public function sendPaymentFormAsync(int $formId, AbstractInputInvoice $invoice, AbstractInputPaymentCredentials $credentials, ?string $requestedInfoId = null, ?string $shippingOptionId = null, ?int $tipAmount = null): Future
    {
        return $this->client->call(new SendPaymentFormRequest(formId: $formId, invoice: $invoice, credentials: $credentials, requestedInfoId: $requestedInfoId, shippingOptionId: $shippingOptionId, tipAmount: $tipAmount));
    }

    /**
     * @param int $formId
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift|InputInvoiceStarGiftUpgrade|InputInvoiceStarGiftTransfer|InputInvoicePremiumGiftStars|InputInvoiceBusinessBotTransferStars|InputInvoiceStarGiftResale|InputInvoiceStarGiftPrepaidUpgrade|InputInvoicePremiumAuthCode|InputInvoiceStarGiftDropOriginalDetails|InputInvoiceStarGiftAuctionBid $invoice
     * @param InputPaymentCredentialsSaved|InputPaymentCredentials|InputPaymentCredentialsApplePay|InputPaymentCredentialsGooglePay $credentials
     * @param string|null $requestedInfoId
     * @param string|null $shippingOptionId
     * @param int|null $tipAmount
     * @return PaymentResult|PaymentVerificationNeeded|null
     * @see https://core.telegram.org/method/payments.sendPaymentForm
     * @api
     */
    public function sendPaymentForm(int $formId, AbstractInputInvoice $invoice, AbstractInputPaymentCredentials $credentials, ?string $requestedInfoId = null, ?string $shippingOptionId = null, ?int $tipAmount = null): ?AbstractPaymentResult
    {
        return $this->sendPaymentFormAsync(formId: $formId, invoice: $invoice, credentials: $credentials, requestedInfoId: $requestedInfoId, shippingOptionId: $shippingOptionId, tipAmount: $tipAmount)->await();
    }

    /**
     * @return Future<SavedInfo|null>
     * @see https://core.telegram.org/method/payments.getSavedInfo
     * @api
     */
    public function getSavedInfoAsync(): Future
    {
        return $this->client->call(new GetSavedInfoRequest());
    }

    /**
     * @return SavedInfo|null
     * @see https://core.telegram.org/method/payments.getSavedInfo
     * @api
     */
    public function getSavedInfo(): ?SavedInfo
    {
        return $this->getSavedInfoAsync()->await();
    }

    /**
     * @param bool|null $credentials
     * @param bool|null $info
     * @return Future<bool>
     * @see https://core.telegram.org/method/payments.clearSavedInfo
     * @api
     */
    public function clearSavedInfoAsync(?bool $credentials = null, ?bool $info = null): Future
    {
        return $this->client->call(new ClearSavedInfoRequest(credentials: $credentials, info: $info));
    }

    /**
     * @param bool|null $credentials
     * @param bool|null $info
     * @return bool
     * @see https://core.telegram.org/method/payments.clearSavedInfo
     * @api
     */
    public function clearSavedInfo(?bool $credentials = null, ?bool $info = null): bool
    {
        return (bool) $this->clearSavedInfoAsync(credentials: $credentials, info: $info)->await();
    }

    /**
     * @param string $number
     * @return Future<BankCardData|null>
     * @see https://core.telegram.org/method/payments.getBankCardData
     * @api
     */
    public function getBankCardDataAsync(string $number): Future
    {
        return $this->client->call(new GetBankCardDataRequest(number: $number));
    }

    /**
     * @param string $number
     * @return BankCardData|null
     * @see https://core.telegram.org/method/payments.getBankCardData
     * @api
     */
    public function getBankCardData(string $number): ?BankCardData
    {
        return $this->getBankCardDataAsync(number: $number)->await();
    }

    /**
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $invoiceMedia
     * @return Future<ExportedInvoice|null>
     * @see https://core.telegram.org/method/payments.exportInvoice
     * @api
     */
    public function exportInvoiceAsync(AbstractInputMedia $invoiceMedia): Future
    {
        return $this->client->call(new ExportInvoiceRequest(invoiceMedia: $invoiceMedia));
    }

    /**
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $invoiceMedia
     * @return ExportedInvoice|null
     * @see https://core.telegram.org/method/payments.exportInvoice
     * @api
     */
    public function exportInvoice(AbstractInputMedia $invoiceMedia): ?ExportedInvoice
    {
        return $this->exportInvoiceAsync(invoiceMedia: $invoiceMedia)->await();
    }

    /**
     * @param string $receipt
     * @param InputStorePaymentPremiumSubscription|InputStorePaymentGiftPremium|InputStorePaymentPremiumGiftCode|InputStorePaymentPremiumGiveaway|InputStorePaymentStarsTopup|InputStorePaymentStarsGift|InputStorePaymentStarsGiveaway|InputStorePaymentAuthCode $purpose
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/payments.assignAppStoreTransaction
     * @api
     */
    public function assignAppStoreTransactionAsync(string $receipt, AbstractInputStorePaymentPurpose $purpose): Future
    {
        return $this->client->call(new AssignAppStoreTransactionRequest(receipt: $receipt, purpose: $purpose));
    }

    /**
     * @param string $receipt
     * @param InputStorePaymentPremiumSubscription|InputStorePaymentGiftPremium|InputStorePaymentPremiumGiftCode|InputStorePaymentPremiumGiveaway|InputStorePaymentStarsTopup|InputStorePaymentStarsGift|InputStorePaymentStarsGiveaway|InputStorePaymentAuthCode $purpose
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.assignAppStoreTransaction
     * @api
     */
    public function assignAppStoreTransaction(string $receipt, AbstractInputStorePaymentPurpose $purpose): ?AbstractUpdates
    {
        return $this->assignAppStoreTransactionAsync(receipt: $receipt, purpose: $purpose)->await();
    }

    /**
     * @param array $receipt
     * @param InputStorePaymentPremiumSubscription|InputStorePaymentGiftPremium|InputStorePaymentPremiumGiftCode|InputStorePaymentPremiumGiveaway|InputStorePaymentStarsTopup|InputStorePaymentStarsGift|InputStorePaymentStarsGiveaway|InputStorePaymentAuthCode $purpose
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/payments.assignPlayMarketTransaction
     * @api
     */
    public function assignPlayMarketTransactionAsync(array $receipt, AbstractInputStorePaymentPurpose $purpose): Future
    {
        return $this->client->call(new AssignPlayMarketTransactionRequest(receipt: $receipt, purpose: $purpose));
    }

    /**
     * @param array $receipt
     * @param InputStorePaymentPremiumSubscription|InputStorePaymentGiftPremium|InputStorePaymentPremiumGiftCode|InputStorePaymentPremiumGiveaway|InputStorePaymentStarsTopup|InputStorePaymentStarsGift|InputStorePaymentStarsGiveaway|InputStorePaymentAuthCode $purpose
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.assignPlayMarketTransaction
     * @api
     */
    public function assignPlayMarketTransaction(array $receipt, AbstractInputStorePaymentPurpose $purpose): ?AbstractUpdates
    {
        return $this->assignPlayMarketTransactionAsync(receipt: $receipt, purpose: $purpose)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $boostPeer
     * @return Future<list<PremiumGiftCodeOption>>
     * @see https://core.telegram.org/method/payments.getPremiumGiftCodeOptions
     * @api
     */
    public function getPremiumGiftCodeOptionsAsync(AbstractInputPeer|string|int|null $boostPeer = null): Future
    {
        if (is_string($boostPeer) || is_int($boostPeer)) {
            $boostPeer = $this->client->peerManager->resolve($boostPeer);
        }
        return $this->client->call(new GetPremiumGiftCodeOptionsRequest(boostPeer: $boostPeer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $boostPeer
     * @return list<PremiumGiftCodeOption>
     * @see https://core.telegram.org/method/payments.getPremiumGiftCodeOptions
     * @api
     */
    public function getPremiumGiftCodeOptions(AbstractInputPeer|string|int|null $boostPeer = null): array
    {
        return $this->getPremiumGiftCodeOptionsAsync(boostPeer: $boostPeer)->await();
    }

    /**
     * @param string $slug
     * @return Future<CheckedGiftCode|null>
     * @see https://core.telegram.org/method/payments.checkGiftCode
     * @api
     */
    public function checkGiftCodeAsync(string $slug): Future
    {
        return $this->client->call(new CheckGiftCodeRequest(slug: $slug));
    }

    /**
     * @param string $slug
     * @return CheckedGiftCode|null
     * @see https://core.telegram.org/method/payments.checkGiftCode
     * @api
     */
    public function checkGiftCode(string $slug): ?CheckedGiftCode
    {
        return $this->checkGiftCodeAsync(slug: $slug)->await();
    }

    /**
     * @param string $slug
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/payments.applyGiftCode
     * @api
     */
    public function applyGiftCodeAsync(string $slug): Future
    {
        return $this->client->call(new ApplyGiftCodeRequest(slug: $slug));
    }

    /**
     * @param string $slug
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.applyGiftCode
     * @api
     */
    public function applyGiftCode(string $slug): ?AbstractUpdates
    {
        return $this->applyGiftCodeAsync(slug: $slug)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return Future<GiveawayInfo|GiveawayInfoResults|null>
     * @see https://core.telegram.org/method/payments.getGiveawayInfo
     * @api
     */
    public function getGiveawayInfoAsync(AbstractInputPeer|string|int $peer, int $msgId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetGiveawayInfoRequest(peer: $peer, msgId: $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $msgId
     * @return GiveawayInfo|GiveawayInfoResults|null
     * @see https://core.telegram.org/method/payments.getGiveawayInfo
     * @api
     */
    public function getGiveawayInfo(AbstractInputPeer|string|int $peer, int $msgId): ?AbstractGiveawayInfo
    {
        return $this->getGiveawayInfoAsync(peer: $peer, msgId: $msgId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $giveawayId
     * @param InputStorePaymentPremiumSubscription|InputStorePaymentGiftPremium|InputStorePaymentPremiumGiftCode|InputStorePaymentPremiumGiveaway|InputStorePaymentStarsTopup|InputStorePaymentStarsGift|InputStorePaymentStarsGiveaway|InputStorePaymentAuthCode $purpose
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/payments.launchPrepaidGiveaway
     * @api
     */
    public function launchPrepaidGiveawayAsync(AbstractInputPeer|string|int $peer, int $giveawayId, AbstractInputStorePaymentPurpose $purpose): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new LaunchPrepaidGiveawayRequest(peer: $peer, giveawayId: $giveawayId, purpose: $purpose));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $giveawayId
     * @param InputStorePaymentPremiumSubscription|InputStorePaymentGiftPremium|InputStorePaymentPremiumGiftCode|InputStorePaymentPremiumGiveaway|InputStorePaymentStarsTopup|InputStorePaymentStarsGift|InputStorePaymentStarsGiveaway|InputStorePaymentAuthCode $purpose
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.launchPrepaidGiveaway
     * @api
     */
    public function launchPrepaidGiveaway(AbstractInputPeer|string|int $peer, int $giveawayId, AbstractInputStorePaymentPurpose $purpose): ?AbstractUpdates
    {
        return $this->launchPrepaidGiveawayAsync(peer: $peer, giveawayId: $giveawayId, purpose: $purpose)->await();
    }

    /**
     * @return Future<list<StarsTopupOption>>
     * @see https://core.telegram.org/method/payments.getStarsTopupOptions
     * @api
     */
    public function getStarsTopupOptionsAsync(): Future
    {
        return $this->client->call(new GetStarsTopupOptionsRequest());
    }

    /**
     * @return list<StarsTopupOption>
     * @see https://core.telegram.org/method/payments.getStarsTopupOptions
     * @api
     */
    public function getStarsTopupOptions(): array
    {
        return $this->getStarsTopupOptionsAsync()->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $ton
     * @return Future<StarsStatus|null>
     * @see https://core.telegram.org/method/payments.getStarsStatus
     * @api
     */
    public function getStarsStatusAsync(AbstractInputPeer|string|int $peer, ?bool $ton = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetStarsStatusRequest(peer: $peer, ton: $ton));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $ton
     * @return StarsStatus|null
     * @see https://core.telegram.org/method/payments.getStarsStatus
     * @api
     */
    public function getStarsStatus(AbstractInputPeer|string|int $peer, ?bool $ton = null): ?StarsStatus
    {
        return $this->getStarsStatusAsync(peer: $peer, ton: $ton)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $offset
     * @param int $limit
     * @param bool|null $inbound
     * @param bool|null $outbound
     * @param bool|null $ascending
     * @param bool|null $ton
     * @param string|null $subscriptionId
     * @return Future<StarsStatus|null>
     * @see https://core.telegram.org/method/payments.getStarsTransactions
     * @api
     */
    public function getStarsTransactionsAsync(AbstractInputPeer|string|int $peer, string $offset, int $limit, ?bool $inbound = null, ?bool $outbound = null, ?bool $ascending = null, ?bool $ton = null, ?string $subscriptionId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetStarsTransactionsRequest(peer: $peer, offset: $offset, limit: $limit, inbound: $inbound, outbound: $outbound, ascending: $ascending, ton: $ton, subscriptionId: $subscriptionId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $offset
     * @param int $limit
     * @param bool|null $inbound
     * @param bool|null $outbound
     * @param bool|null $ascending
     * @param bool|null $ton
     * @param string|null $subscriptionId
     * @return StarsStatus|null
     * @see https://core.telegram.org/method/payments.getStarsTransactions
     * @api
     */
    public function getStarsTransactions(AbstractInputPeer|string|int $peer, string $offset, int $limit, ?bool $inbound = null, ?bool $outbound = null, ?bool $ascending = null, ?bool $ton = null, ?string $subscriptionId = null): ?StarsStatus
    {
        return $this->getStarsTransactionsAsync(peer: $peer, offset: $offset, limit: $limit, inbound: $inbound, outbound: $outbound, ascending: $ascending, ton: $ton, subscriptionId: $subscriptionId)->await();
    }

    /**
     * @param int $formId
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift|InputInvoiceStarGiftUpgrade|InputInvoiceStarGiftTransfer|InputInvoicePremiumGiftStars|InputInvoiceBusinessBotTransferStars|InputInvoiceStarGiftResale|InputInvoiceStarGiftPrepaidUpgrade|InputInvoicePremiumAuthCode|InputInvoiceStarGiftDropOriginalDetails|InputInvoiceStarGiftAuctionBid $invoice
     * @return Future<PaymentResult|PaymentVerificationNeeded|null>
     * @see https://core.telegram.org/method/payments.sendStarsForm
     * @api
     */
    public function sendStarsFormAsync(int $formId, AbstractInputInvoice $invoice): Future
    {
        return $this->client->call(new SendStarsFormRequest(formId: $formId, invoice: $invoice));
    }

    /**
     * @param int $formId
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift|InputInvoiceStarGiftUpgrade|InputInvoiceStarGiftTransfer|InputInvoicePremiumGiftStars|InputInvoiceBusinessBotTransferStars|InputInvoiceStarGiftResale|InputInvoiceStarGiftPrepaidUpgrade|InputInvoicePremiumAuthCode|InputInvoiceStarGiftDropOriginalDetails|InputInvoiceStarGiftAuctionBid $invoice
     * @return PaymentResult|PaymentVerificationNeeded|null
     * @see https://core.telegram.org/method/payments.sendStarsForm
     * @api
     */
    public function sendStarsForm(int $formId, AbstractInputInvoice $invoice): ?AbstractPaymentResult
    {
        return $this->sendStarsFormAsync(formId: $formId, invoice: $invoice)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param string $chargeId
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/payments.refundStarsCharge
     * @api
     */
    public function refundStarsChargeAsync(AbstractInputUser|string|int $userId, string $chargeId): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new RefundStarsChargeRequest(userId: $userId, chargeId: $chargeId));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param string $chargeId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.refundStarsCharge
     * @api
     */
    public function refundStarsCharge(AbstractInputUser|string|int $userId, string $chargeId): ?AbstractUpdates
    {
        return $this->refundStarsChargeAsync(userId: $userId, chargeId: $chargeId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $dark
     * @param bool|null $ton
     * @return Future<StarsRevenueStats|null>
     * @see https://core.telegram.org/method/payments.getStarsRevenueStats
     * @api
     */
    public function getStarsRevenueStatsAsync(AbstractInputPeer|string|int $peer, ?bool $dark = null, ?bool $ton = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetStarsRevenueStatsRequest(peer: $peer, dark: $dark, ton: $ton));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $dark
     * @param bool|null $ton
     * @return StarsRevenueStats|null
     * @see https://core.telegram.org/method/payments.getStarsRevenueStats
     * @api
     */
    public function getStarsRevenueStats(AbstractInputPeer|string|int $peer, ?bool $dark = null, ?bool $ton = null): ?StarsRevenueStats
    {
        return $this->getStarsRevenueStatsAsync(peer: $peer, dark: $dark, ton: $ton)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @param bool|null $ton
     * @param int|null $amount
     * @return Future<StarsRevenueWithdrawalUrl|null>
     * @see https://core.telegram.org/method/payments.getStarsRevenueWithdrawalUrl
     * @api
     */
    public function getStarsRevenueWithdrawalUrlAsync(AbstractInputPeer|string|int $peer, AbstractInputCheckPasswordSRP $password, ?bool $ton = null, ?int $amount = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetStarsRevenueWithdrawalUrlRequest(peer: $peer, password: $password, ton: $ton, amount: $amount));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @param bool|null $ton
     * @param int|null $amount
     * @return StarsRevenueWithdrawalUrl|null
     * @see https://core.telegram.org/method/payments.getStarsRevenueWithdrawalUrl
     * @api
     */
    public function getStarsRevenueWithdrawalUrl(AbstractInputPeer|string|int $peer, AbstractInputCheckPasswordSRP $password, ?bool $ton = null, ?int $amount = null): ?StarsRevenueWithdrawalUrl
    {
        return $this->getStarsRevenueWithdrawalUrlAsync(peer: $peer, password: $password, ton: $ton, amount: $amount)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return Future<StarsRevenueAdsAccountUrl|null>
     * @see https://core.telegram.org/method/payments.getStarsRevenueAdsAccountUrl
     * @api
     */
    public function getStarsRevenueAdsAccountUrlAsync(AbstractInputPeer|string|int $peer): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetStarsRevenueAdsAccountUrlRequest(peer: $peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return StarsRevenueAdsAccountUrl|null
     * @see https://core.telegram.org/method/payments.getStarsRevenueAdsAccountUrl
     * @api
     */
    public function getStarsRevenueAdsAccountUrl(AbstractInputPeer|string|int $peer): ?StarsRevenueAdsAccountUrl
    {
        return $this->getStarsRevenueAdsAccountUrlAsync(peer: $peer)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<InputStarsTransaction> $id
     * @param bool|null $ton
     * @return Future<StarsStatus|null>
     * @see https://core.telegram.org/method/payments.getStarsTransactionsByID
     * @api
     */
    public function getStarsTransactionsByIDAsync(AbstractInputPeer|string|int $peer, array $id, ?bool $ton = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetStarsTransactionsByIDRequest(peer: $peer, id: $id, ton: $ton));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<InputStarsTransaction> $id
     * @param bool|null $ton
     * @return StarsStatus|null
     * @see https://core.telegram.org/method/payments.getStarsTransactionsByID
     * @api
     */
    public function getStarsTransactionsByID(AbstractInputPeer|string|int $peer, array $id, ?bool $ton = null): ?StarsStatus
    {
        return $this->getStarsTransactionsByIDAsync(peer: $peer, id: $id, ton: $ton)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int|null $userId
     * @return Future<list<StarsGiftOption>>
     * @see https://core.telegram.org/method/payments.getStarsGiftOptions
     * @api
     */
    public function getStarsGiftOptionsAsync(AbstractInputUser|string|int|null $userId = null): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new GetStarsGiftOptionsRequest(userId: $userId));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int|null $userId
     * @return list<StarsGiftOption>
     * @see https://core.telegram.org/method/payments.getStarsGiftOptions
     * @api
     */
    public function getStarsGiftOptions(AbstractInputUser|string|int|null $userId = null): array
    {
        return $this->getStarsGiftOptionsAsync(userId: $userId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $offset
     * @param bool|null $missingBalance
     * @return Future<StarsStatus|null>
     * @see https://core.telegram.org/method/payments.getStarsSubscriptions
     * @api
     */
    public function getStarsSubscriptionsAsync(AbstractInputPeer|string|int $peer, string $offset, ?bool $missingBalance = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetStarsSubscriptionsRequest(peer: $peer, offset: $offset, missingBalance: $missingBalance));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $offset
     * @param bool|null $missingBalance
     * @return StarsStatus|null
     * @see https://core.telegram.org/method/payments.getStarsSubscriptions
     * @api
     */
    public function getStarsSubscriptions(AbstractInputPeer|string|int $peer, string $offset, ?bool $missingBalance = null): ?StarsStatus
    {
        return $this->getStarsSubscriptionsAsync(peer: $peer, offset: $offset, missingBalance: $missingBalance)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $subscriptionId
     * @param bool|null $canceled
     * @return Future<bool>
     * @see https://core.telegram.org/method/payments.changeStarsSubscription
     * @api
     */
    public function changeStarsSubscriptionAsync(AbstractInputPeer|string|int $peer, string $subscriptionId, ?bool $canceled = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ChangeStarsSubscriptionRequest(peer: $peer, subscriptionId: $subscriptionId, canceled: $canceled));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $subscriptionId
     * @param bool|null $canceled
     * @return bool
     * @see https://core.telegram.org/method/payments.changeStarsSubscription
     * @api
     */
    public function changeStarsSubscription(AbstractInputPeer|string|int $peer, string $subscriptionId, ?bool $canceled = null): bool
    {
        return (bool) $this->changeStarsSubscriptionAsync(peer: $peer, subscriptionId: $subscriptionId, canceled: $canceled)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $subscriptionId
     * @return Future<bool>
     * @see https://core.telegram.org/method/payments.fulfillStarsSubscription
     * @api
     */
    public function fulfillStarsSubscriptionAsync(AbstractInputPeer|string|int $peer, string $subscriptionId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new FulfillStarsSubscriptionRequest(peer: $peer, subscriptionId: $subscriptionId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $subscriptionId
     * @return bool
     * @see https://core.telegram.org/method/payments.fulfillStarsSubscription
     * @api
     */
    public function fulfillStarsSubscription(AbstractInputPeer|string|int $peer, string $subscriptionId): bool
    {
        return (bool) $this->fulfillStarsSubscriptionAsync(peer: $peer, subscriptionId: $subscriptionId)->await();
    }

    /**
     * @return Future<list<StarsGiveawayOption>>
     * @see https://core.telegram.org/method/payments.getStarsGiveawayOptions
     * @api
     */
    public function getStarsGiveawayOptionsAsync(): Future
    {
        return $this->client->call(new GetStarsGiveawayOptionsRequest());
    }

    /**
     * @return list<StarsGiveawayOption>
     * @see https://core.telegram.org/method/payments.getStarsGiveawayOptions
     * @api
     */
    public function getStarsGiveawayOptions(): array
    {
        return $this->getStarsGiveawayOptionsAsync()->await();
    }

    /**
     * @param int $hash
     * @return Future<StarGiftsNotModified|StarGifts|null>
     * @see https://core.telegram.org/method/payments.getStarGifts
     * @api
     */
    public function getStarGiftsAsync(int $hash): Future
    {
        return $this->client->call(new GetStarGiftsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return StarGiftsNotModified|StarGifts|null
     * @see https://core.telegram.org/method/payments.getStarGifts
     * @api
     */
    public function getStarGifts(int $hash): ?AbstractStarGifts
    {
        return $this->getStarGiftsAsync(hash: $hash)->await();
    }

    /**
     * @param InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug $stargift
     * @param bool|null $unsave
     * @return Future<bool>
     * @see https://core.telegram.org/method/payments.saveStarGift
     * @api
     */
    public function saveStarGiftAsync(AbstractInputSavedStarGift $stargift, ?bool $unsave = null): Future
    {
        return $this->client->call(new SaveStarGiftRequest(stargift: $stargift, unsave: $unsave));
    }

    /**
     * @param InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug $stargift
     * @param bool|null $unsave
     * @return bool
     * @see https://core.telegram.org/method/payments.saveStarGift
     * @api
     */
    public function saveStarGift(AbstractInputSavedStarGift $stargift, ?bool $unsave = null): bool
    {
        return (bool) $this->saveStarGiftAsync(stargift: $stargift, unsave: $unsave)->await();
    }

    /**
     * @param InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug $stargift
     * @return Future<bool>
     * @see https://core.telegram.org/method/payments.convertStarGift
     * @api
     */
    public function convertStarGiftAsync(AbstractInputSavedStarGift $stargift): Future
    {
        return $this->client->call(new ConvertStarGiftRequest(stargift: $stargift));
    }

    /**
     * @param InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug $stargift
     * @return bool
     * @see https://core.telegram.org/method/payments.convertStarGift
     * @api
     */
    public function convertStarGift(AbstractInputSavedStarGift $stargift): bool
    {
        return (bool) $this->convertStarGiftAsync(stargift: $stargift)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param string $chargeId
     * @param bool|null $restore
     * @return Future<bool>
     * @see https://core.telegram.org/method/payments.botCancelStarsSubscription
     * @api
     */
    public function botCancelStarsSubscriptionAsync(AbstractInputUser|string|int $userId, string $chargeId, ?bool $restore = null): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new BotCancelStarsSubscriptionRequest(userId: $userId, chargeId: $chargeId, restore: $restore));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param string $chargeId
     * @param bool|null $restore
     * @return bool
     * @see https://core.telegram.org/method/payments.botCancelStarsSubscription
     * @api
     */
    public function botCancelStarsSubscription(AbstractInputUser|string|int $userId, string $chargeId, ?bool $restore = null): bool
    {
        return (bool) $this->botCancelStarsSubscriptionAsync(userId: $userId, chargeId: $chargeId, restore: $restore)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $limit
     * @param int|null $offsetDate
     * @param string|null $offsetLink
     * @return Future<ConnectedStarRefBots|null>
     * @see https://core.telegram.org/method/payments.getConnectedStarRefBots
     * @api
     */
    public function getConnectedStarRefBotsAsync(AbstractInputPeer|string|int $peer, int $limit, ?int $offsetDate = null, ?string $offsetLink = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetConnectedStarRefBotsRequest(peer: $peer, limit: $limit, offsetDate: $offsetDate, offsetLink: $offsetLink));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $limit
     * @param int|null $offsetDate
     * @param string|null $offsetLink
     * @return ConnectedStarRefBots|null
     * @see https://core.telegram.org/method/payments.getConnectedStarRefBots
     * @api
     */
    public function getConnectedStarRefBots(AbstractInputPeer|string|int $peer, int $limit, ?int $offsetDate = null, ?string $offsetLink = null): ?ConnectedStarRefBots
    {
        return $this->getConnectedStarRefBotsAsync(peer: $peer, limit: $limit, offsetDate: $offsetDate, offsetLink: $offsetLink)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @return Future<ConnectedStarRefBots|null>
     * @see https://core.telegram.org/method/payments.getConnectedStarRefBot
     * @api
     */
    public function getConnectedStarRefBotAsync(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $bot): Future
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
        return $this->client->call(new GetConnectedStarRefBotRequest(peer: $peer, bot: $bot));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @return ConnectedStarRefBots|null
     * @see https://core.telegram.org/method/payments.getConnectedStarRefBot
     * @api
     */
    public function getConnectedStarRefBot(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $bot): ?ConnectedStarRefBots
    {
        return $this->getConnectedStarRefBotAsync(peer: $peer, bot: $bot)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $offset
     * @param int $limit
     * @param bool|null $orderByRevenue
     * @param bool|null $orderByDate
     * @return Future<SuggestedStarRefBots|null>
     * @see https://core.telegram.org/method/payments.getSuggestedStarRefBots
     * @api
     */
    public function getSuggestedStarRefBotsAsync(AbstractInputPeer|string|int $peer, string $offset, int $limit, ?bool $orderByRevenue = null, ?bool $orderByDate = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetSuggestedStarRefBotsRequest(peer: $peer, offset: $offset, limit: $limit, orderByRevenue: $orderByRevenue, orderByDate: $orderByDate));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $offset
     * @param int $limit
     * @param bool|null $orderByRevenue
     * @param bool|null $orderByDate
     * @return SuggestedStarRefBots|null
     * @see https://core.telegram.org/method/payments.getSuggestedStarRefBots
     * @api
     */
    public function getSuggestedStarRefBots(AbstractInputPeer|string|int $peer, string $offset, int $limit, ?bool $orderByRevenue = null, ?bool $orderByDate = null): ?SuggestedStarRefBots
    {
        return $this->getSuggestedStarRefBotsAsync(peer: $peer, offset: $offset, limit: $limit, orderByRevenue: $orderByRevenue, orderByDate: $orderByDate)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @return Future<ConnectedStarRefBots|null>
     * @see https://core.telegram.org/method/payments.connectStarRefBot
     * @api
     */
    public function connectStarRefBotAsync(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $bot): Future
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
        return $this->client->call(new ConnectStarRefBotRequest(peer: $peer, bot: $bot));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @return ConnectedStarRefBots|null
     * @see https://core.telegram.org/method/payments.connectStarRefBot
     * @api
     */
    public function connectStarRefBot(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $bot): ?ConnectedStarRefBots
    {
        return $this->connectStarRefBotAsync(peer: $peer, bot: $bot)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $link
     * @param bool|null $revoked
     * @return Future<ConnectedStarRefBots|null>
     * @see https://core.telegram.org/method/payments.editConnectedStarRefBot
     * @api
     */
    public function editConnectedStarRefBotAsync(AbstractInputPeer|string|int $peer, string $link, ?bool $revoked = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new EditConnectedStarRefBotRequest(peer: $peer, link: $link, revoked: $revoked));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $link
     * @param bool|null $revoked
     * @return ConnectedStarRefBots|null
     * @see https://core.telegram.org/method/payments.editConnectedStarRefBot
     * @api
     */
    public function editConnectedStarRefBot(AbstractInputPeer|string|int $peer, string $link, ?bool $revoked = null): ?ConnectedStarRefBots
    {
        return $this->editConnectedStarRefBotAsync(peer: $peer, link: $link, revoked: $revoked)->await();
    }

    /**
     * @param int $giftId
     * @return Future<StarGiftUpgradePreview|null>
     * @see https://core.telegram.org/method/payments.getStarGiftUpgradePreview
     * @api
     */
    public function getStarGiftUpgradePreviewAsync(int $giftId): Future
    {
        return $this->client->call(new GetStarGiftUpgradePreviewRequest(giftId: $giftId));
    }

    /**
     * @param int $giftId
     * @return StarGiftUpgradePreview|null
     * @see https://core.telegram.org/method/payments.getStarGiftUpgradePreview
     * @api
     */
    public function getStarGiftUpgradePreview(int $giftId): ?StarGiftUpgradePreview
    {
        return $this->getStarGiftUpgradePreviewAsync(giftId: $giftId)->await();
    }

    /**
     * @param InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug $stargift
     * @param bool|null $keepOriginalDetails
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/payments.upgradeStarGift
     * @api
     */
    public function upgradeStarGiftAsync(AbstractInputSavedStarGift $stargift, ?bool $keepOriginalDetails = null): Future
    {
        return $this->client->call(new UpgradeStarGiftRequest(stargift: $stargift, keepOriginalDetails: $keepOriginalDetails));
    }

    /**
     * @param InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug $stargift
     * @param bool|null $keepOriginalDetails
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.upgradeStarGift
     * @api
     */
    public function upgradeStarGift(AbstractInputSavedStarGift $stargift, ?bool $keepOriginalDetails = null): ?AbstractUpdates
    {
        return $this->upgradeStarGiftAsync(stargift: $stargift, keepOriginalDetails: $keepOriginalDetails)->await();
    }

    /**
     * @param InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug $stargift
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $toId
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/payments.transferStarGift
     * @api
     */
    public function transferStarGiftAsync(AbstractInputSavedStarGift $stargift, AbstractInputPeer|string|int $toId): Future
    {
        if (is_string($toId) || is_int($toId)) {
            $toId = $this->client->peerManager->resolve($toId);
        }
        return $this->client->call(new TransferStarGiftRequest(stargift: $stargift, toId: $toId));
    }

    /**
     * @param InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug $stargift
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $toId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.transferStarGift
     * @api
     */
    public function transferStarGift(AbstractInputSavedStarGift $stargift, AbstractInputPeer|string|int $toId): ?AbstractUpdates
    {
        return $this->transferStarGiftAsync(stargift: $stargift, toId: $toId)->await();
    }

    /**
     * @param string $slug
     * @return Future<UniqueStarGift|null>
     * @see https://core.telegram.org/method/payments.getUniqueStarGift
     * @api
     */
    public function getUniqueStarGiftAsync(string $slug): Future
    {
        return $this->client->call(new GetUniqueStarGiftRequest(slug: $slug));
    }

    /**
     * @param string $slug
     * @return UniqueStarGift|null
     * @see https://core.telegram.org/method/payments.getUniqueStarGift
     * @api
     */
    public function getUniqueStarGift(string $slug): ?UniqueStarGift
    {
        return $this->getUniqueStarGiftAsync(slug: $slug)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $offset
     * @param int $limit
     * @param bool|null $excludeUnsaved
     * @param bool|null $excludeSaved
     * @param bool|null $excludeUnlimited
     * @param bool|null $excludeUnique
     * @param bool|null $sortByValue
     * @param bool|null $excludeUpgradable
     * @param bool|null $excludeUnupgradable
     * @param bool|null $peerColorAvailable
     * @param bool|null $excludeHosted
     * @param int|null $collectionId
     * @return Future<SavedStarGifts|null>
     * @see https://core.telegram.org/method/payments.getSavedStarGifts
     * @api
     */
    public function getSavedStarGiftsAsync(AbstractInputPeer|string|int $peer, string $offset, int $limit, ?bool $excludeUnsaved = null, ?bool $excludeSaved = null, ?bool $excludeUnlimited = null, ?bool $excludeUnique = null, ?bool $sortByValue = null, ?bool $excludeUpgradable = null, ?bool $excludeUnupgradable = null, ?bool $peerColorAvailable = null, ?bool $excludeHosted = null, ?int $collectionId = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetSavedStarGiftsRequest(peer: $peer, offset: $offset, limit: $limit, excludeUnsaved: $excludeUnsaved, excludeSaved: $excludeSaved, excludeUnlimited: $excludeUnlimited, excludeUnique: $excludeUnique, sortByValue: $sortByValue, excludeUpgradable: $excludeUpgradable, excludeUnupgradable: $excludeUnupgradable, peerColorAvailable: $peerColorAvailable, excludeHosted: $excludeHosted, collectionId: $collectionId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $offset
     * @param int $limit
     * @param bool|null $excludeUnsaved
     * @param bool|null $excludeSaved
     * @param bool|null $excludeUnlimited
     * @param bool|null $excludeUnique
     * @param bool|null $sortByValue
     * @param bool|null $excludeUpgradable
     * @param bool|null $excludeUnupgradable
     * @param bool|null $peerColorAvailable
     * @param bool|null $excludeHosted
     * @param int|null $collectionId
     * @return SavedStarGifts|null
     * @see https://core.telegram.org/method/payments.getSavedStarGifts
     * @api
     */
    public function getSavedStarGifts(AbstractInputPeer|string|int $peer, string $offset, int $limit, ?bool $excludeUnsaved = null, ?bool $excludeSaved = null, ?bool $excludeUnlimited = null, ?bool $excludeUnique = null, ?bool $sortByValue = null, ?bool $excludeUpgradable = null, ?bool $excludeUnupgradable = null, ?bool $peerColorAvailable = null, ?bool $excludeHosted = null, ?int $collectionId = null): ?SavedStarGifts
    {
        return $this->getSavedStarGiftsAsync(peer: $peer, offset: $offset, limit: $limit, excludeUnsaved: $excludeUnsaved, excludeSaved: $excludeSaved, excludeUnlimited: $excludeUnlimited, excludeUnique: $excludeUnique, sortByValue: $sortByValue, excludeUpgradable: $excludeUpgradable, excludeUnupgradable: $excludeUnupgradable, peerColorAvailable: $peerColorAvailable, excludeHosted: $excludeHosted, collectionId: $collectionId)->await();
    }

    /**
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug> $stargift
     * @return Future<SavedStarGifts|null>
     * @see https://core.telegram.org/method/payments.getSavedStarGift
     * @api
     */
    public function getSavedStarGiftAsync(array $stargift): Future
    {
        return $this->client->call(new GetSavedStarGiftRequest(stargift: $stargift));
    }

    /**
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug> $stargift
     * @return SavedStarGifts|null
     * @see https://core.telegram.org/method/payments.getSavedStarGift
     * @api
     */
    public function getSavedStarGift(array $stargift): ?SavedStarGifts
    {
        return $this->getSavedStarGiftAsync(stargift: $stargift)->await();
    }

    /**
     * @param InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug $stargift
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @return Future<StarGiftWithdrawalUrl|null>
     * @see https://core.telegram.org/method/payments.getStarGiftWithdrawalUrl
     * @api
     */
    public function getStarGiftWithdrawalUrlAsync(AbstractInputSavedStarGift $stargift, AbstractInputCheckPasswordSRP $password): Future
    {
        return $this->client->call(new GetStarGiftWithdrawalUrlRequest(stargift: $stargift, password: $password));
    }

    /**
     * @param InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug $stargift
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @return StarGiftWithdrawalUrl|null
     * @see https://core.telegram.org/method/payments.getStarGiftWithdrawalUrl
     * @api
     */
    public function getStarGiftWithdrawalUrl(AbstractInputSavedStarGift $stargift, AbstractInputCheckPasswordSRP $password): ?StarGiftWithdrawalUrl
    {
        return $this->getStarGiftWithdrawalUrlAsync(stargift: $stargift, password: $password)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $enabled
     * @return Future<bool>
     * @see https://core.telegram.org/method/payments.toggleChatStarGiftNotifications
     * @api
     */
    public function toggleChatStarGiftNotificationsAsync(AbstractInputPeer|string|int $peer, ?bool $enabled = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ToggleChatStarGiftNotificationsRequest(peer: $peer, enabled: $enabled));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $enabled
     * @return bool
     * @see https://core.telegram.org/method/payments.toggleChatStarGiftNotifications
     * @api
     */
    public function toggleChatStarGiftNotifications(AbstractInputPeer|string|int $peer, ?bool $enabled = null): bool
    {
        return (bool) $this->toggleChatStarGiftNotificationsAsync(peer: $peer, enabled: $enabled)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug> $stargift
     * @return Future<bool>
     * @see https://core.telegram.org/method/payments.toggleStarGiftsPinnedToTop
     * @api
     */
    public function toggleStarGiftsPinnedToTopAsync(AbstractInputPeer|string|int $peer, array $stargift): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ToggleStarGiftsPinnedToTopRequest(peer: $peer, stargift: $stargift));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug> $stargift
     * @return bool
     * @see https://core.telegram.org/method/payments.toggleStarGiftsPinnedToTop
     * @api
     */
    public function toggleStarGiftsPinnedToTop(AbstractInputPeer|string|int $peer, array $stargift): bool
    {
        return (bool) $this->toggleStarGiftsPinnedToTopAsync(peer: $peer, stargift: $stargift)->await();
    }

    /**
     * @param InputStorePaymentPremiumSubscription|InputStorePaymentGiftPremium|InputStorePaymentPremiumGiftCode|InputStorePaymentPremiumGiveaway|InputStorePaymentStarsTopup|InputStorePaymentStarsGift|InputStorePaymentStarsGiveaway|InputStorePaymentAuthCode $purpose
     * @return Future<bool>
     * @see https://core.telegram.org/method/payments.canPurchaseStore
     * @api
     */
    public function canPurchaseStoreAsync(AbstractInputStorePaymentPurpose $purpose): Future
    {
        return $this->client->call(new CanPurchaseStoreRequest(purpose: $purpose));
    }

    /**
     * @param InputStorePaymentPremiumSubscription|InputStorePaymentGiftPremium|InputStorePaymentPremiumGiftCode|InputStorePaymentPremiumGiveaway|InputStorePaymentStarsTopup|InputStorePaymentStarsGift|InputStorePaymentStarsGiveaway|InputStorePaymentAuthCode $purpose
     * @return bool
     * @see https://core.telegram.org/method/payments.canPurchaseStore
     * @api
     */
    public function canPurchaseStore(AbstractInputStorePaymentPurpose $purpose): bool
    {
        return (bool) $this->canPurchaseStoreAsync(purpose: $purpose)->await();
    }

    /**
     * @param int $giftId
     * @param string $offset
     * @param int $limit
     * @param bool|null $sortByPrice
     * @param bool|null $sortByNum
     * @param int|null $attributesHash
     * @param list<StarGiftAttributeIdModel|StarGiftAttributeIdPattern|StarGiftAttributeIdBackdrop>|null $attributes
     * @return Future<ResaleStarGifts|null>
     * @see https://core.telegram.org/method/payments.getResaleStarGifts
     * @api
     */
    public function getResaleStarGiftsAsync(int $giftId, string $offset, int $limit, ?bool $sortByPrice = null, ?bool $sortByNum = null, ?int $attributesHash = null, ?array $attributes = null): Future
    {
        return $this->client->call(new GetResaleStarGiftsRequest(giftId: $giftId, offset: $offset, limit: $limit, sortByPrice: $sortByPrice, sortByNum: $sortByNum, attributesHash: $attributesHash, attributes: $attributes));
    }

    /**
     * @param int $giftId
     * @param string $offset
     * @param int $limit
     * @param bool|null $sortByPrice
     * @param bool|null $sortByNum
     * @param int|null $attributesHash
     * @param list<StarGiftAttributeIdModel|StarGiftAttributeIdPattern|StarGiftAttributeIdBackdrop>|null $attributes
     * @return ResaleStarGifts|null
     * @see https://core.telegram.org/method/payments.getResaleStarGifts
     * @api
     */
    public function getResaleStarGifts(int $giftId, string $offset, int $limit, ?bool $sortByPrice = null, ?bool $sortByNum = null, ?int $attributesHash = null, ?array $attributes = null): ?ResaleStarGifts
    {
        return $this->getResaleStarGiftsAsync(giftId: $giftId, offset: $offset, limit: $limit, sortByPrice: $sortByPrice, sortByNum: $sortByNum, attributesHash: $attributesHash, attributes: $attributes)->await();
    }

    /**
     * @param InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug $stargift
     * @param StarsAmount|StarsTonAmount $resellAmount
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/payments.updateStarGiftPrice
     * @api
     */
    public function updateStarGiftPriceAsync(AbstractInputSavedStarGift $stargift, AbstractStarsAmount $resellAmount): Future
    {
        return $this->client->call(new UpdateStarGiftPriceRequest(stargift: $stargift, resellAmount: $resellAmount));
    }

    /**
     * @param InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug $stargift
     * @param StarsAmount|StarsTonAmount $resellAmount
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.updateStarGiftPrice
     * @api
     */
    public function updateStarGiftPrice(AbstractInputSavedStarGift $stargift, AbstractStarsAmount $resellAmount): ?AbstractUpdates
    {
        return $this->updateStarGiftPriceAsync(stargift: $stargift, resellAmount: $resellAmount)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $title
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug> $stargift
     * @return Future<StarGiftCollection|null>
     * @see https://core.telegram.org/method/payments.createStarGiftCollection
     * @api
     */
    public function createStarGiftCollectionAsync(AbstractInputPeer|string|int $peer, string $title, array $stargift): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new CreateStarGiftCollectionRequest(peer: $peer, title: $title, stargift: $stargift));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $title
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug> $stargift
     * @return StarGiftCollection|null
     * @see https://core.telegram.org/method/payments.createStarGiftCollection
     * @api
     */
    public function createStarGiftCollection(AbstractInputPeer|string|int $peer, string $title, array $stargift): ?StarGiftCollection
    {
        return $this->createStarGiftCollectionAsync(peer: $peer, title: $title, stargift: $stargift)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $collectionId
     * @param string|null $title
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug>|null $deleteStargift
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug>|null $addStargift
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug>|null $order
     * @return Future<StarGiftCollection|null>
     * @see https://core.telegram.org/method/payments.updateStarGiftCollection
     * @api
     */
    public function updateStarGiftCollectionAsync(AbstractInputPeer|string|int $peer, int $collectionId, ?string $title = null, ?array $deleteStargift = null, ?array $addStargift = null, ?array $order = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new UpdateStarGiftCollectionRequest(peer: $peer, collectionId: $collectionId, title: $title, deleteStargift: $deleteStargift, addStargift: $addStargift, order: $order));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $collectionId
     * @param string|null $title
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug>|null $deleteStargift
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug>|null $addStargift
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug>|null $order
     * @return StarGiftCollection|null
     * @see https://core.telegram.org/method/payments.updateStarGiftCollection
     * @api
     */
    public function updateStarGiftCollection(AbstractInputPeer|string|int $peer, int $collectionId, ?string $title = null, ?array $deleteStargift = null, ?array $addStargift = null, ?array $order = null): ?StarGiftCollection
    {
        return $this->updateStarGiftCollectionAsync(peer: $peer, collectionId: $collectionId, title: $title, deleteStargift: $deleteStargift, addStargift: $addStargift, order: $order)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $order
     * @return Future<bool>
     * @see https://core.telegram.org/method/payments.reorderStarGiftCollections
     * @api
     */
    public function reorderStarGiftCollectionsAsync(AbstractInputPeer|string|int $peer, array $order): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ReorderStarGiftCollectionsRequest(peer: $peer, order: $order));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int> $order
     * @return bool
     * @see https://core.telegram.org/method/payments.reorderStarGiftCollections
     * @api
     */
    public function reorderStarGiftCollections(AbstractInputPeer|string|int $peer, array $order): bool
    {
        return (bool) $this->reorderStarGiftCollectionsAsync(peer: $peer, order: $order)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $collectionId
     * @return Future<bool>
     * @see https://core.telegram.org/method/payments.deleteStarGiftCollection
     * @api
     */
    public function deleteStarGiftCollectionAsync(AbstractInputPeer|string|int $peer, int $collectionId): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new DeleteStarGiftCollectionRequest(peer: $peer, collectionId: $collectionId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $collectionId
     * @return bool
     * @see https://core.telegram.org/method/payments.deleteStarGiftCollection
     * @api
     */
    public function deleteStarGiftCollection(AbstractInputPeer|string|int $peer, int $collectionId): bool
    {
        return (bool) $this->deleteStarGiftCollectionAsync(peer: $peer, collectionId: $collectionId)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $hash
     * @return Future<StarGiftCollectionsNotModified|StarGiftCollections|null>
     * @see https://core.telegram.org/method/payments.getStarGiftCollections
     * @api
     */
    public function getStarGiftCollectionsAsync(AbstractInputPeer|string|int $peer, int $hash): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetStarGiftCollectionsRequest(peer: $peer, hash: $hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $hash
     * @return StarGiftCollectionsNotModified|StarGiftCollections|null
     * @see https://core.telegram.org/method/payments.getStarGiftCollections
     * @api
     */
    public function getStarGiftCollections(AbstractInputPeer|string|int $peer, int $hash): ?AbstractStarGiftCollections
    {
        return $this->getStarGiftCollectionsAsync(peer: $peer, hash: $hash)->await();
    }

    /**
     * @param string $slug
     * @return Future<UniqueStarGiftValueInfo|null>
     * @see https://core.telegram.org/method/payments.getUniqueStarGiftValueInfo
     * @api
     */
    public function getUniqueStarGiftValueInfoAsync(string $slug): Future
    {
        return $this->client->call(new GetUniqueStarGiftValueInfoRequest(slug: $slug));
    }

    /**
     * @param string $slug
     * @return UniqueStarGiftValueInfo|null
     * @see https://core.telegram.org/method/payments.getUniqueStarGiftValueInfo
     * @api
     */
    public function getUniqueStarGiftValueInfo(string $slug): ?UniqueStarGiftValueInfo
    {
        return $this->getUniqueStarGiftValueInfoAsync(slug: $slug)->await();
    }

    /**
     * @param int $giftId
     * @return Future<CheckCanSendGiftResultOk|CheckCanSendGiftResultFail|null>
     * @see https://core.telegram.org/method/payments.checkCanSendGift
     * @api
     */
    public function checkCanSendGiftAsync(int $giftId): Future
    {
        return $this->client->call(new CheckCanSendGiftRequest(giftId: $giftId));
    }

    /**
     * @param int $giftId
     * @return CheckCanSendGiftResultOk|CheckCanSendGiftResultFail|null
     * @see https://core.telegram.org/method/payments.checkCanSendGift
     * @api
     */
    public function checkCanSendGift(int $giftId): ?AbstractCheckCanSendGiftResult
    {
        return $this->checkCanSendGiftAsync(giftId: $giftId)->await();
    }

    /**
     * @param InputStarGiftAuction|InputStarGiftAuctionSlug $auction
     * @param int $version
     * @return Future<StarGiftAuctionState|null>
     * @see https://core.telegram.org/method/payments.getStarGiftAuctionState
     * @api
     */
    public function getStarGiftAuctionStateAsync(AbstractInputStarGiftAuction $auction, int $version): Future
    {
        return $this->client->call(new GetStarGiftAuctionStateRequest(auction: $auction, version: $version));
    }

    /**
     * @param InputStarGiftAuction|InputStarGiftAuctionSlug $auction
     * @param int $version
     * @return StarGiftAuctionState|null
     * @see https://core.telegram.org/method/payments.getStarGiftAuctionState
     * @api
     */
    public function getStarGiftAuctionState(AbstractInputStarGiftAuction $auction, int $version): ?StarGiftAuctionState
    {
        return $this->getStarGiftAuctionStateAsync(auction: $auction, version: $version)->await();
    }

    /**
     * @param int $giftId
     * @return Future<StarGiftAuctionAcquiredGifts|null>
     * @see https://core.telegram.org/method/payments.getStarGiftAuctionAcquiredGifts
     * @api
     */
    public function getStarGiftAuctionAcquiredGiftsAsync(int $giftId): Future
    {
        return $this->client->call(new GetStarGiftAuctionAcquiredGiftsRequest(giftId: $giftId));
    }

    /**
     * @param int $giftId
     * @return StarGiftAuctionAcquiredGifts|null
     * @see https://core.telegram.org/method/payments.getStarGiftAuctionAcquiredGifts
     * @api
     */
    public function getStarGiftAuctionAcquiredGifts(int $giftId): ?StarGiftAuctionAcquiredGifts
    {
        return $this->getStarGiftAuctionAcquiredGiftsAsync(giftId: $giftId)->await();
    }

    /**
     * @param int $hash
     * @return Future<StarGiftActiveAuctionsNotModified|StarGiftActiveAuctions|null>
     * @see https://core.telegram.org/method/payments.getStarGiftActiveAuctions
     * @api
     */
    public function getStarGiftActiveAuctionsAsync(int $hash): Future
    {
        return $this->client->call(new GetStarGiftActiveAuctionsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return StarGiftActiveAuctionsNotModified|StarGiftActiveAuctions|null
     * @see https://core.telegram.org/method/payments.getStarGiftActiveAuctions
     * @api
     */
    public function getStarGiftActiveAuctions(int $hash): ?AbstractStarGiftActiveAuctions
    {
        return $this->getStarGiftActiveAuctionsAsync(hash: $hash)->await();
    }

    /**
     * @param int $offerMsgId
     * @param bool|null $decline
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/payments.resolveStarGiftOffer
     * @api
     */
    public function resolveStarGiftOfferAsync(int $offerMsgId, ?bool $decline = null): Future
    {
        return $this->client->call(new ResolveStarGiftOfferRequest(offerMsgId: $offerMsgId, decline: $decline));
    }

    /**
     * @param int $offerMsgId
     * @param bool|null $decline
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.resolveStarGiftOffer
     * @api
     */
    public function resolveStarGiftOffer(int $offerMsgId, ?bool $decline = null): ?AbstractUpdates
    {
        return $this->resolveStarGiftOfferAsync(offerMsgId: $offerMsgId, decline: $decline)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $slug
     * @param StarsAmount|StarsTonAmount $price
     * @param int $duration
     * @param int|null $randomId
     * @param int|null $allowPaidStars
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/payments.sendStarGiftOffer
     * @api
     */
    public function sendStarGiftOfferAsync(AbstractInputPeer|string|int $peer, string $slug, AbstractStarsAmount $price, int $duration, ?int $randomId = null, ?int $allowPaidStars = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new SendStarGiftOfferRequest(peer: $peer, slug: $slug, price: $price, duration: $duration, randomId: $randomId, allowPaidStars: $allowPaidStars));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $slug
     * @param StarsAmount|StarsTonAmount $price
     * @param int $duration
     * @param int|null $randomId
     * @param int|null $allowPaidStars
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.sendStarGiftOffer
     * @api
     */
    public function sendStarGiftOffer(AbstractInputPeer|string|int $peer, string $slug, AbstractStarsAmount $price, int $duration, ?int $randomId = null, ?int $allowPaidStars = null): ?AbstractUpdates
    {
        return $this->sendStarGiftOfferAsync(peer: $peer, slug: $slug, price: $price, duration: $duration, randomId: $randomId, allowPaidStars: $allowPaidStars)->await();
    }

    /**
     * @param int $giftId
     * @return Future<StarGiftUpgradeAttributes|null>
     * @see https://core.telegram.org/method/payments.getStarGiftUpgradeAttributes
     * @api
     */
    public function getStarGiftUpgradeAttributesAsync(int $giftId): Future
    {
        return $this->client->call(new GetStarGiftUpgradeAttributesRequest(giftId: $giftId));
    }

    /**
     * @param int $giftId
     * @return StarGiftUpgradeAttributes|null
     * @see https://core.telegram.org/method/payments.getStarGiftUpgradeAttributes
     * @api
     */
    public function getStarGiftUpgradeAttributes(int $giftId): ?StarGiftUpgradeAttributes
    {
        return $this->getStarGiftUpgradeAttributesAsync(giftId: $giftId)->await();
    }
}