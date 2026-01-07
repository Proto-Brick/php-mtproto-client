<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

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
     * @return PaymentForm|PaymentFormStars|PaymentFormStarGift|null
     * @see https://core.telegram.org/method/payments.getPaymentForm
     * @api
     */
    public function getPaymentForm(AbstractInputInvoice $invoice, ?array $themeParams = null): ?AbstractPaymentForm
    {
        return $this->client->callSync(new GetPaymentFormRequest(invoice: $invoice, themeParams: $themeParams));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetPaymentReceiptRequest(peer: $peer, msgId: $msgId));
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
        return $this->client->callSync(new ValidateRequestedInfoRequest(invoice: $invoice, info: $info, save: $save));
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
        return $this->client->callSync(new SendPaymentFormRequest(formId: $formId, invoice: $invoice, credentials: $credentials, requestedInfoId: $requestedInfoId, shippingOptionId: $shippingOptionId, tipAmount: $tipAmount));
    }

    /**
     * @return SavedInfo|null
     * @see https://core.telegram.org/method/payments.getSavedInfo
     * @api
     */
    public function getSavedInfo(): ?SavedInfo
    {
        return $this->client->callSync(new GetSavedInfoRequest());
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
        return (bool) $this->client->callSync(new ClearSavedInfoRequest(credentials: $credentials, info: $info));
    }

    /**
     * @param string $number
     * @return BankCardData|null
     * @see https://core.telegram.org/method/payments.getBankCardData
     * @api
     */
    public function getBankCardData(string $number): ?BankCardData
    {
        return $this->client->callSync(new GetBankCardDataRequest(number: $number));
    }

    /**
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $invoiceMedia
     * @return ExportedInvoice|null
     * @see https://core.telegram.org/method/payments.exportInvoice
     * @api
     */
    public function exportInvoice(AbstractInputMedia $invoiceMedia): ?ExportedInvoice
    {
        return $this->client->callSync(new ExportInvoiceRequest(invoiceMedia: $invoiceMedia));
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
        return $this->client->callSync(new AssignAppStoreTransactionRequest(receipt: $receipt, purpose: $purpose));
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
        return $this->client->callSync(new AssignPlayMarketTransactionRequest(receipt: $receipt, purpose: $purpose));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $boostPeer
     * @return list<PremiumGiftCodeOption>
     * @see https://core.telegram.org/method/payments.getPremiumGiftCodeOptions
     * @api
     */
    public function getPremiumGiftCodeOptions(AbstractInputPeer|string|int|null $boostPeer = null): array
    {
        if (is_string($boostPeer) || is_int($boostPeer)) {
            $boostPeer = $this->client->peerManager->resolve($boostPeer);
        }
        return $this->client->callSync(new GetPremiumGiftCodeOptionsRequest(boostPeer: $boostPeer));
    }

    /**
     * @param string $slug
     * @return CheckedGiftCode|null
     * @see https://core.telegram.org/method/payments.checkGiftCode
     * @api
     */
    public function checkGiftCode(string $slug): ?CheckedGiftCode
    {
        return $this->client->callSync(new CheckGiftCodeRequest(slug: $slug));
    }

    /**
     * @param string $slug
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.applyGiftCode
     * @api
     */
    public function applyGiftCode(string $slug): ?AbstractUpdates
    {
        return $this->client->callSync(new ApplyGiftCodeRequest(slug: $slug));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetGiveawayInfoRequest(peer: $peer, msgId: $msgId));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new LaunchPrepaidGiveawayRequest(peer: $peer, giveawayId: $giveawayId, purpose: $purpose));
    }

    /**
     * @return list<StarsTopupOption>
     * @see https://core.telegram.org/method/payments.getStarsTopupOptions
     * @api
     */
    public function getStarsTopupOptions(): array
    {
        return $this->client->callSync(new GetStarsTopupOptionsRequest());
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetStarsStatusRequest(peer: $peer, ton: $ton));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetStarsTransactionsRequest(peer: $peer, offset: $offset, limit: $limit, inbound: $inbound, outbound: $outbound, ascending: $ascending, ton: $ton, subscriptionId: $subscriptionId));
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
        return $this->client->callSync(new SendStarsFormRequest(formId: $formId, invoice: $invoice));
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
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->callSync(new RefundStarsChargeRequest(userId: $userId, chargeId: $chargeId));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetStarsRevenueStatsRequest(peer: $peer, dark: $dark, ton: $ton));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetStarsRevenueWithdrawalUrlRequest(peer: $peer, password: $password, ton: $ton, amount: $amount));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return StarsRevenueAdsAccountUrl|null
     * @see https://core.telegram.org/method/payments.getStarsRevenueAdsAccountUrl
     * @api
     */
    public function getStarsRevenueAdsAccountUrl(AbstractInputPeer|string|int $peer): ?StarsRevenueAdsAccountUrl
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetStarsRevenueAdsAccountUrlRequest(peer: $peer));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetStarsTransactionsByIDRequest(peer: $peer, id: $id, ton: $ton));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int|null $userId
     * @return list<StarsGiftOption>
     * @see https://core.telegram.org/method/payments.getStarsGiftOptions
     * @api
     */
    public function getStarsGiftOptions(AbstractInputUser|string|int|null $userId = null): array
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->callSync(new GetStarsGiftOptionsRequest(userId: $userId));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetStarsSubscriptionsRequest(peer: $peer, offset: $offset, missingBalance: $missingBalance));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return (bool) $this->client->callSync(new ChangeStarsSubscriptionRequest(peer: $peer, subscriptionId: $subscriptionId, canceled: $canceled));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return (bool) $this->client->callSync(new FulfillStarsSubscriptionRequest(peer: $peer, subscriptionId: $subscriptionId));
    }

    /**
     * @return list<StarsGiveawayOption>
     * @see https://core.telegram.org/method/payments.getStarsGiveawayOptions
     * @api
     */
    public function getStarsGiveawayOptions(): array
    {
        return $this->client->callSync(new GetStarsGiveawayOptionsRequest());
    }

    /**
     * @param int $hash
     * @return StarGiftsNotModified|StarGifts|null
     * @see https://core.telegram.org/method/payments.getStarGifts
     * @api
     */
    public function getStarGifts(int $hash): ?AbstractStarGifts
    {
        return $this->client->callSync(new GetStarGiftsRequest(hash: $hash));
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
        return (bool) $this->client->callSync(new SaveStarGiftRequest(stargift: $stargift, unsave: $unsave));
    }

    /**
     * @param InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug $stargift
     * @return bool
     * @see https://core.telegram.org/method/payments.convertStarGift
     * @api
     */
    public function convertStarGift(AbstractInputSavedStarGift $stargift): bool
    {
        return (bool) $this->client->callSync(new ConvertStarGiftRequest(stargift: $stargift));
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
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return (bool) $this->client->callSync(new BotCancelStarsSubscriptionRequest(userId: $userId, chargeId: $chargeId, restore: $restore));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetConnectedStarRefBotsRequest(peer: $peer, limit: $limit, offsetDate: $offsetDate, offsetLink: $offsetLink));
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
        return $this->client->callSync(new GetConnectedStarRefBotRequest(peer: $peer, bot: $bot));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetSuggestedStarRefBotsRequest(peer: $peer, offset: $offset, limit: $limit, orderByRevenue: $orderByRevenue, orderByDate: $orderByDate));
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
        return $this->client->callSync(new ConnectStarRefBotRequest(peer: $peer, bot: $bot));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new EditConnectedStarRefBotRequest(peer: $peer, link: $link, revoked: $revoked));
    }

    /**
     * @param int $giftId
     * @return StarGiftUpgradePreview|null
     * @see https://core.telegram.org/method/payments.getStarGiftUpgradePreview
     * @api
     */
    public function getStarGiftUpgradePreview(int $giftId): ?StarGiftUpgradePreview
    {
        return $this->client->callSync(new GetStarGiftUpgradePreviewRequest(giftId: $giftId));
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
        return $this->client->callSync(new UpgradeStarGiftRequest(stargift: $stargift, keepOriginalDetails: $keepOriginalDetails));
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
        if (is_string($toId) || is_int($toId)) {
            $toId = $this->client->peerManager->resolve($toId);
        }
        return $this->client->callSync(new TransferStarGiftRequest(stargift: $stargift, toId: $toId));
    }

    /**
     * @param string $slug
     * @return UniqueStarGift|null
     * @see https://core.telegram.org/method/payments.getUniqueStarGift
     * @api
     */
    public function getUniqueStarGift(string $slug): ?UniqueStarGift
    {
        return $this->client->callSync(new GetUniqueStarGiftRequest(slug: $slug));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetSavedStarGiftsRequest(peer: $peer, offset: $offset, limit: $limit, excludeUnsaved: $excludeUnsaved, excludeSaved: $excludeSaved, excludeUnlimited: $excludeUnlimited, excludeUnique: $excludeUnique, sortByValue: $sortByValue, excludeUpgradable: $excludeUpgradable, excludeUnupgradable: $excludeUnupgradable, peerColorAvailable: $peerColorAvailable, excludeHosted: $excludeHosted, collectionId: $collectionId));
    }

    /**
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug> $stargift
     * @return SavedStarGifts|null
     * @see https://core.telegram.org/method/payments.getSavedStarGift
     * @api
     */
    public function getSavedStarGift(array $stargift): ?SavedStarGifts
    {
        return $this->client->callSync(new GetSavedStarGiftRequest(stargift: $stargift));
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
        return $this->client->callSync(new GetStarGiftWithdrawalUrlRequest(stargift: $stargift, password: $password));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return (bool) $this->client->callSync(new ToggleChatStarGiftNotificationsRequest(peer: $peer, enabled: $enabled));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return (bool) $this->client->callSync(new ToggleStarGiftsPinnedToTopRequest(peer: $peer, stargift: $stargift));
    }

    /**
     * @param InputStorePaymentPremiumSubscription|InputStorePaymentGiftPremium|InputStorePaymentPremiumGiftCode|InputStorePaymentPremiumGiveaway|InputStorePaymentStarsTopup|InputStorePaymentStarsGift|InputStorePaymentStarsGiveaway|InputStorePaymentAuthCode $purpose
     * @return bool
     * @see https://core.telegram.org/method/payments.canPurchaseStore
     * @api
     */
    public function canPurchaseStore(AbstractInputStorePaymentPurpose $purpose): bool
    {
        return (bool) $this->client->callSync(new CanPurchaseStoreRequest(purpose: $purpose));
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
        return $this->client->callSync(new GetResaleStarGiftsRequest(giftId: $giftId, offset: $offset, limit: $limit, sortByPrice: $sortByPrice, sortByNum: $sortByNum, attributesHash: $attributesHash, attributes: $attributes));
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
        return $this->client->callSync(new UpdateStarGiftPriceRequest(stargift: $stargift, resellAmount: $resellAmount));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new CreateStarGiftCollectionRequest(peer: $peer, title: $title, stargift: $stargift));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new UpdateStarGiftCollectionRequest(peer: $peer, collectionId: $collectionId, title: $title, deleteStargift: $deleteStargift, addStargift: $addStargift, order: $order));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return (bool) $this->client->callSync(new ReorderStarGiftCollectionsRequest(peer: $peer, order: $order));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return (bool) $this->client->callSync(new DeleteStarGiftCollectionRequest(peer: $peer, collectionId: $collectionId));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetStarGiftCollectionsRequest(peer: $peer, hash: $hash));
    }

    /**
     * @param string $slug
     * @return UniqueStarGiftValueInfo|null
     * @see https://core.telegram.org/method/payments.getUniqueStarGiftValueInfo
     * @api
     */
    public function getUniqueStarGiftValueInfo(string $slug): ?UniqueStarGiftValueInfo
    {
        return $this->client->callSync(new GetUniqueStarGiftValueInfoRequest(slug: $slug));
    }

    /**
     * @param int $giftId
     * @return CheckCanSendGiftResultOk|CheckCanSendGiftResultFail|null
     * @see https://core.telegram.org/method/payments.checkCanSendGift
     * @api
     */
    public function checkCanSendGift(int $giftId): ?AbstractCheckCanSendGiftResult
    {
        return $this->client->callSync(new CheckCanSendGiftRequest(giftId: $giftId));
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
        return $this->client->callSync(new GetStarGiftAuctionStateRequest(auction: $auction, version: $version));
    }

    /**
     * @param int $giftId
     * @return StarGiftAuctionAcquiredGifts|null
     * @see https://core.telegram.org/method/payments.getStarGiftAuctionAcquiredGifts
     * @api
     */
    public function getStarGiftAuctionAcquiredGifts(int $giftId): ?StarGiftAuctionAcquiredGifts
    {
        return $this->client->callSync(new GetStarGiftAuctionAcquiredGiftsRequest(giftId: $giftId));
    }

    /**
     * @param int $hash
     * @return StarGiftActiveAuctionsNotModified|StarGiftActiveAuctions|null
     * @see https://core.telegram.org/method/payments.getStarGiftActiveAuctions
     * @api
     */
    public function getStarGiftActiveAuctions(int $hash): ?AbstractStarGiftActiveAuctions
    {
        return $this->client->callSync(new GetStarGiftActiveAuctionsRequest(hash: $hash));
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
        return $this->client->callSync(new ResolveStarGiftOfferRequest(offerMsgId: $offerMsgId, decline: $decline));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->callSync(new SendStarGiftOfferRequest(peer: $peer, slug: $slug, price: $price, duration: $duration, randomId: $randomId, allowPaidStars: $allowPaidStars));
    }

    /**
     * @param int $giftId
     * @return StarGiftUpgradeAttributes|null
     * @see https://core.telegram.org/method/payments.getStarGiftUpgradeAttributes
     * @api
     */
    public function getStarGiftUpgradeAttributes(int $giftId): ?StarGiftUpgradeAttributes
    {
        return $this->client->callSync(new GetStarGiftUpgradeAttributesRequest(giftId: $giftId));
    }
}