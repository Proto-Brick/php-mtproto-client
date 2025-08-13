<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ApplyGiftCodeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\AssignAppStoreTransactionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\AssignPlayMarketTransactionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\BotCancelStarsSubscriptionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\CanPurchaseStoreRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ChangeStarsSubscriptionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\CheckGiftCodeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ClearSavedInfoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ConnectStarRefBotRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ConvertStarGiftRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\CreateStarGiftCollectionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\DeleteStarGiftCollectionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\EditConnectedStarRefBotRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ExportInvoiceRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\FulfillStarsSubscriptionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetBankCardDataRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetConnectedStarRefBotRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetConnectedStarRefBotsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetGiveawayInfoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetPaymentFormRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetPaymentReceiptRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetPremiumGiftCodeOptionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetResaleStarGiftsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetSavedInfoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetSavedStarGiftRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetSavedStarGiftsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetStarGiftCollectionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetStarGiftUpgradePreviewRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetStarGiftWithdrawalUrlRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetStarGiftsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetStarsGiftOptionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetStarsGiveawayOptionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetStarsRevenueAdsAccountUrlRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetStarsRevenueStatsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetStarsRevenueWithdrawalUrlRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetStarsStatusRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetStarsSubscriptionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetStarsTopupOptionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetStarsTransactionsByIDRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetStarsTransactionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetSuggestedStarRefBotsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetUniqueStarGiftRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\LaunchPrepaidGiveawayRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\RefundStarsChargeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ReorderStarGiftCollectionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\SaveStarGiftRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\SendPaymentFormRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\SendStarsFormRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ToggleChatStarGiftNotificationsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ToggleStarGiftsPinnedToTopRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\TransferStarGiftRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\UpdateStarGiftCollectionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\UpdateStarGiftPriceRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\UpgradeStarGiftRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ValidateRequestedInfoRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputInvoice;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPaymentCredentials;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStorePaymentPurpose;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStarGiftAttributeId;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStarsAmount;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCheckPasswordEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoiceBusinessBotTransferStars;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoiceChatInviteSubscription;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoiceMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoicePremiumGiftCode;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoicePremiumGiftStars;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoiceSlug;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoiceStarGift;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoiceStarGiftResale;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoiceStarGiftTransfer;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoiceStarGiftUpgrade;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoiceStars;
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
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPaymentCredentials;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPaymentCredentialsApplePay;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPaymentCredentialsGooglePay;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPaymentCredentialsSaved;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputSavedStarGiftChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputSavedStarGiftSlug;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputSavedStarGiftUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStarsTransaction;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStorePaymentAuthCode;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStorePaymentGiftPremium;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStorePaymentPremiumGiftCode;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStorePaymentPremiumGiveaway;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStorePaymentPremiumSubscription;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStorePaymentStarsGift;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStorePaymentStarsGiveaway;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStorePaymentStarsTopup;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\PaymentRequestedInfo;
use DigitalStars\MtprotoClient\Generated\Types\Base\PremiumGiftCodeOption;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarGiftAttributeIdBackdrop;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarGiftAttributeIdModel;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarGiftAttributeIdPattern;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarGiftCollection;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarsAmount;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarsGiftOption;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarsGiveawayOption;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarsTonAmount;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarsTopupOption;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShort;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortChatMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortSentMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\Updates;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesCombined;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesTooLong;
use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractGiveawayInfo;
use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractPaymentForm;
use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractPaymentReceipt;
use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractPaymentResult;
use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractStarGiftCollections;
use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractStarGifts;
use DigitalStars\MtprotoClient\Generated\Types\Payments\BankCardData;
use DigitalStars\MtprotoClient\Generated\Types\Payments\CheckedGiftCode;
use DigitalStars\MtprotoClient\Generated\Types\Payments\ConnectedStarRefBots;
use DigitalStars\MtprotoClient\Generated\Types\Payments\ExportedInvoice;
use DigitalStars\MtprotoClient\Generated\Types\Payments\GiveawayInfo;
use DigitalStars\MtprotoClient\Generated\Types\Payments\GiveawayInfoResults;
use DigitalStars\MtprotoClient\Generated\Types\Payments\PaymentForm;
use DigitalStars\MtprotoClient\Generated\Types\Payments\PaymentFormStarGift;
use DigitalStars\MtprotoClient\Generated\Types\Payments\PaymentFormStars;
use DigitalStars\MtprotoClient\Generated\Types\Payments\PaymentReceipt;
use DigitalStars\MtprotoClient\Generated\Types\Payments\PaymentReceiptStars;
use DigitalStars\MtprotoClient\Generated\Types\Payments\PaymentResult;
use DigitalStars\MtprotoClient\Generated\Types\Payments\PaymentVerificationNeeded;
use DigitalStars\MtprotoClient\Generated\Types\Payments\ResaleStarGifts;
use DigitalStars\MtprotoClient\Generated\Types\Payments\SavedInfo;
use DigitalStars\MtprotoClient\Generated\Types\Payments\SavedStarGifts;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarGiftCollections;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarGiftCollectionsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarGiftUpgradePreview;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarGiftWithdrawalUrl;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarGifts;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarGiftsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarsRevenueAdsAccountUrl;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarsRevenueStats;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarsRevenueWithdrawalUrl;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarsStatus;
use DigitalStars\MtprotoClient\Generated\Types\Payments\SuggestedStarRefBots;
use DigitalStars\MtprotoClient\Generated\Types\Payments\UniqueStarGift;
use DigitalStars\MtprotoClient\Generated\Types\Payments\ValidatedRequestedInfo;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "payments" group.
 */
final readonly class PaymentsMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift|InputInvoiceStarGiftUpgrade|InputInvoiceStarGiftTransfer|InputInvoicePremiumGiftStars|InputInvoiceBusinessBotTransferStars|InputInvoiceStarGiftResale $invoice
     * @param array|null $themeParams
     * @return PaymentForm|PaymentFormStars|PaymentFormStarGift|null
     * @see https://core.telegram.org/method/payments.getPaymentForm
     * @api
     */
    public function getPaymentForm(AbstractInputInvoice $invoice, ?array $themeParams = null): ?AbstractPaymentForm
    {
        return $this->client->callSync(new GetPaymentFormRequest($invoice, $themeParams));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @return PaymentReceipt|PaymentReceiptStars|null
     * @see https://core.telegram.org/method/payments.getPaymentReceipt
     * @api
     */
    public function getPaymentReceipt(AbstractInputPeer $peer, int $msgId): ?AbstractPaymentReceipt
    {
        return $this->client->callSync(new GetPaymentReceiptRequest($peer, $msgId));
    }

    /**
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift|InputInvoiceStarGiftUpgrade|InputInvoiceStarGiftTransfer|InputInvoicePremiumGiftStars|InputInvoiceBusinessBotTransferStars|InputInvoiceStarGiftResale $invoice
     * @param PaymentRequestedInfo $info
     * @param bool|null $save
     * @return ValidatedRequestedInfo|null
     * @see https://core.telegram.org/method/payments.validateRequestedInfo
     * @api
     */
    public function validateRequestedInfo(AbstractInputInvoice $invoice, PaymentRequestedInfo $info, ?bool $save = null): ?ValidatedRequestedInfo
    {
        return $this->client->callSync(new ValidateRequestedInfoRequest($invoice, $info, $save));
    }

    /**
     * @param int $formId
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift|InputInvoiceStarGiftUpgrade|InputInvoiceStarGiftTransfer|InputInvoicePremiumGiftStars|InputInvoiceBusinessBotTransferStars|InputInvoiceStarGiftResale $invoice
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
        return $this->client->callSync(new SendPaymentFormRequest($formId, $invoice, $credentials, $requestedInfoId, $shippingOptionId, $tipAmount));
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
        return (bool) $this->client->callSync(new ClearSavedInfoRequest($credentials, $info));
    }

    /**
     * @param string $number
     * @return BankCardData|null
     * @see https://core.telegram.org/method/payments.getBankCardData
     * @api
     */
    public function getBankCardData(string $number): ?BankCardData
    {
        return $this->client->callSync(new GetBankCardDataRequest($number));
    }

    /**
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $invoiceMedia
     * @return ExportedInvoice|null
     * @see https://core.telegram.org/method/payments.exportInvoice
     * @api
     */
    public function exportInvoice(AbstractInputMedia $invoiceMedia): ?ExportedInvoice
    {
        return $this->client->callSync(new ExportInvoiceRequest($invoiceMedia));
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
        return $this->client->callSync(new AssignAppStoreTransactionRequest($receipt, $purpose));
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
        return $this->client->callSync(new AssignPlayMarketTransactionRequest($receipt, $purpose));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $boostPeer
     * @return list<PremiumGiftCodeOption>
     * @see https://core.telegram.org/method/payments.getPremiumGiftCodeOptions
     * @api
     */
    public function getPremiumGiftCodeOptions(?AbstractInputPeer $boostPeer = null): array
    {
        return $this->client->callSync(new GetPremiumGiftCodeOptionsRequest($boostPeer));
    }

    /**
     * @param string $slug
     * @return CheckedGiftCode|null
     * @see https://core.telegram.org/method/payments.checkGiftCode
     * @api
     */
    public function checkGiftCode(string $slug): ?CheckedGiftCode
    {
        return $this->client->callSync(new CheckGiftCodeRequest($slug));
    }

    /**
     * @param string $slug
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.applyGiftCode
     * @api
     */
    public function applyGiftCode(string $slug): ?AbstractUpdates
    {
        return $this->client->callSync(new ApplyGiftCodeRequest($slug));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $msgId
     * @return GiveawayInfo|GiveawayInfoResults|null
     * @see https://core.telegram.org/method/payments.getGiveawayInfo
     * @api
     */
    public function getGiveawayInfo(AbstractInputPeer $peer, int $msgId): ?AbstractGiveawayInfo
    {
        return $this->client->callSync(new GetGiveawayInfoRequest($peer, $msgId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $giveawayId
     * @param InputStorePaymentPremiumSubscription|InputStorePaymentGiftPremium|InputStorePaymentPremiumGiftCode|InputStorePaymentPremiumGiveaway|InputStorePaymentStarsTopup|InputStorePaymentStarsGift|InputStorePaymentStarsGiveaway|InputStorePaymentAuthCode $purpose
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.launchPrepaidGiveaway
     * @api
     */
    public function launchPrepaidGiveaway(AbstractInputPeer $peer, int $giveawayId, AbstractInputStorePaymentPurpose $purpose): ?AbstractUpdates
    {
        return $this->client->callSync(new LaunchPrepaidGiveawayRequest($peer, $giveawayId, $purpose));
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
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param bool|null $ton
     * @return StarsStatus|null
     * @see https://core.telegram.org/method/payments.getStarsStatus
     * @api
     */
    public function getStarsStatus(AbstractInputPeer $peer, ?bool $ton = null): ?StarsStatus
    {
        return $this->client->callSync(new GetStarsStatusRequest($peer, $ton));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
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
    public function getStarsTransactions(AbstractInputPeer $peer, string $offset, int $limit, ?bool $inbound = null, ?bool $outbound = null, ?bool $ascending = null, ?bool $ton = null, ?string $subscriptionId = null): ?StarsStatus
    {
        return $this->client->callSync(new GetStarsTransactionsRequest($peer, $offset, $limit, $inbound, $outbound, $ascending, $ton, $subscriptionId));
    }

    /**
     * @param int $formId
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift|InputInvoiceStarGiftUpgrade|InputInvoiceStarGiftTransfer|InputInvoicePremiumGiftStars|InputInvoiceBusinessBotTransferStars|InputInvoiceStarGiftResale $invoice
     * @return PaymentResult|PaymentVerificationNeeded|null
     * @see https://core.telegram.org/method/payments.sendStarsForm
     * @api
     */
    public function sendStarsForm(int $formId, AbstractInputInvoice $invoice): ?AbstractPaymentResult
    {
        return $this->client->callSync(new SendStarsFormRequest($formId, $invoice));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param string $chargeId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.refundStarsCharge
     * @api
     */
    public function refundStarsCharge(AbstractInputUser $userId, string $chargeId): ?AbstractUpdates
    {
        return $this->client->callSync(new RefundStarsChargeRequest($userId, $chargeId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param bool|null $dark
     * @param bool|null $ton
     * @return StarsRevenueStats|null
     * @see https://core.telegram.org/method/payments.getStarsRevenueStats
     * @api
     */
    public function getStarsRevenueStats(AbstractInputPeer $peer, ?bool $dark = null, ?bool $ton = null): ?StarsRevenueStats
    {
        return $this->client->callSync(new GetStarsRevenueStatsRequest($peer, $dark, $ton));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @param bool|null $ton
     * @param int|null $amount
     * @return StarsRevenueWithdrawalUrl|null
     * @see https://core.telegram.org/method/payments.getStarsRevenueWithdrawalUrl
     * @api
     */
    public function getStarsRevenueWithdrawalUrl(AbstractInputPeer $peer, AbstractInputCheckPasswordSRP $password, ?bool $ton = null, ?int $amount = null): ?StarsRevenueWithdrawalUrl
    {
        return $this->client->callSync(new GetStarsRevenueWithdrawalUrlRequest($peer, $password, $ton, $amount));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return StarsRevenueAdsAccountUrl|null
     * @see https://core.telegram.org/method/payments.getStarsRevenueAdsAccountUrl
     * @api
     */
    public function getStarsRevenueAdsAccountUrl(AbstractInputPeer $peer): ?StarsRevenueAdsAccountUrl
    {
        return $this->client->callSync(new GetStarsRevenueAdsAccountUrlRequest($peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<InputStarsTransaction> $id
     * @param bool|null $ton
     * @return StarsStatus|null
     * @see https://core.telegram.org/method/payments.getStarsTransactionsByID
     * @api
     */
    public function getStarsTransactionsByID(AbstractInputPeer $peer, array $id, ?bool $ton = null): ?StarsStatus
    {
        return $this->client->callSync(new GetStarsTransactionsByIDRequest($peer, $id, $ton));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|null $userId
     * @return list<StarsGiftOption>
     * @see https://core.telegram.org/method/payments.getStarsGiftOptions
     * @api
     */
    public function getStarsGiftOptions(?AbstractInputUser $userId = null): array
    {
        return $this->client->callSync(new GetStarsGiftOptionsRequest($userId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $offset
     * @param bool|null $missingBalance
     * @return StarsStatus|null
     * @see https://core.telegram.org/method/payments.getStarsSubscriptions
     * @api
     */
    public function getStarsSubscriptions(AbstractInputPeer $peer, string $offset, ?bool $missingBalance = null): ?StarsStatus
    {
        return $this->client->callSync(new GetStarsSubscriptionsRequest($peer, $offset, $missingBalance));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $subscriptionId
     * @param bool|null $canceled
     * @return bool
     * @see https://core.telegram.org/method/payments.changeStarsSubscription
     * @api
     */
    public function changeStarsSubscription(AbstractInputPeer $peer, string $subscriptionId, ?bool $canceled = null): bool
    {
        return (bool) $this->client->callSync(new ChangeStarsSubscriptionRequest($peer, $subscriptionId, $canceled));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $subscriptionId
     * @return bool
     * @see https://core.telegram.org/method/payments.fulfillStarsSubscription
     * @api
     */
    public function fulfillStarsSubscription(AbstractInputPeer $peer, string $subscriptionId): bool
    {
        return (bool) $this->client->callSync(new FulfillStarsSubscriptionRequest($peer, $subscriptionId));
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
        return $this->client->callSync(new GetStarGiftsRequest($hash));
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
        return (bool) $this->client->callSync(new SaveStarGiftRequest($stargift, $unsave));
    }

    /**
     * @param InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug $stargift
     * @return bool
     * @see https://core.telegram.org/method/payments.convertStarGift
     * @api
     */
    public function convertStarGift(AbstractInputSavedStarGift $stargift): bool
    {
        return (bool) $this->client->callSync(new ConvertStarGiftRequest($stargift));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param string $chargeId
     * @param bool|null $restore
     * @return bool
     * @see https://core.telegram.org/method/payments.botCancelStarsSubscription
     * @api
     */
    public function botCancelStarsSubscription(AbstractInputUser $userId, string $chargeId, ?bool $restore = null): bool
    {
        return (bool) $this->client->callSync(new BotCancelStarsSubscriptionRequest($userId, $chargeId, $restore));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $limit
     * @param int|null $offsetDate
     * @param string|null $offsetLink
     * @return ConnectedStarRefBots|null
     * @see https://core.telegram.org/method/payments.getConnectedStarRefBots
     * @api
     */
    public function getConnectedStarRefBots(AbstractInputPeer $peer, int $limit, ?int $offsetDate = null, ?string $offsetLink = null): ?ConnectedStarRefBots
    {
        return $this->client->callSync(new GetConnectedStarRefBotsRequest($peer, $limit, $offsetDate, $offsetLink));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @return ConnectedStarRefBots|null
     * @see https://core.telegram.org/method/payments.getConnectedStarRefBot
     * @api
     */
    public function getConnectedStarRefBot(AbstractInputPeer $peer, AbstractInputUser $bot): ?ConnectedStarRefBots
    {
        return $this->client->callSync(new GetConnectedStarRefBotRequest($peer, $bot));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $offset
     * @param int $limit
     * @param bool|null $orderByRevenue
     * @param bool|null $orderByDate
     * @return SuggestedStarRefBots|null
     * @see https://core.telegram.org/method/payments.getSuggestedStarRefBots
     * @api
     */
    public function getSuggestedStarRefBots(AbstractInputPeer $peer, string $offset, int $limit, ?bool $orderByRevenue = null, ?bool $orderByDate = null): ?SuggestedStarRefBots
    {
        return $this->client->callSync(new GetSuggestedStarRefBotsRequest($peer, $offset, $limit, $orderByRevenue, $orderByDate));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @return ConnectedStarRefBots|null
     * @see https://core.telegram.org/method/payments.connectStarRefBot
     * @api
     */
    public function connectStarRefBot(AbstractInputPeer $peer, AbstractInputUser $bot): ?ConnectedStarRefBots
    {
        return $this->client->callSync(new ConnectStarRefBotRequest($peer, $bot));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $link
     * @param bool|null $revoked
     * @return ConnectedStarRefBots|null
     * @see https://core.telegram.org/method/payments.editConnectedStarRefBot
     * @api
     */
    public function editConnectedStarRefBot(AbstractInputPeer $peer, string $link, ?bool $revoked = null): ?ConnectedStarRefBots
    {
        return $this->client->callSync(new EditConnectedStarRefBotRequest($peer, $link, $revoked));
    }

    /**
     * @param int $giftId
     * @return StarGiftUpgradePreview|null
     * @see https://core.telegram.org/method/payments.getStarGiftUpgradePreview
     * @api
     */
    public function getStarGiftUpgradePreview(int $giftId): ?StarGiftUpgradePreview
    {
        return $this->client->callSync(new GetStarGiftUpgradePreviewRequest($giftId));
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
        return $this->client->callSync(new UpgradeStarGiftRequest($stargift, $keepOriginalDetails));
    }

    /**
     * @param InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug $stargift
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $toId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.transferStarGift
     * @api
     */
    public function transferStarGift(AbstractInputSavedStarGift $stargift, AbstractInputPeer $toId): ?AbstractUpdates
    {
        return $this->client->callSync(new TransferStarGiftRequest($stargift, $toId));
    }

    /**
     * @param string $slug
     * @return UniqueStarGift|null
     * @see https://core.telegram.org/method/payments.getUniqueStarGift
     * @api
     */
    public function getUniqueStarGift(string $slug): ?UniqueStarGift
    {
        return $this->client->callSync(new GetUniqueStarGiftRequest($slug));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $offset
     * @param int $limit
     * @param bool|null $excludeUnsaved
     * @param bool|null $excludeSaved
     * @param bool|null $excludeUnlimited
     * @param bool|null $excludeLimited
     * @param bool|null $excludeUnique
     * @param bool|null $sortByValue
     * @param int|null $collectionId
     * @return SavedStarGifts|null
     * @see https://core.telegram.org/method/payments.getSavedStarGifts
     * @api
     */
    public function getSavedStarGifts(AbstractInputPeer $peer, string $offset, int $limit, ?bool $excludeUnsaved = null, ?bool $excludeSaved = null, ?bool $excludeUnlimited = null, ?bool $excludeLimited = null, ?bool $excludeUnique = null, ?bool $sortByValue = null, ?int $collectionId = null): ?SavedStarGifts
    {
        return $this->client->callSync(new GetSavedStarGiftsRequest($peer, $offset, $limit, $excludeUnsaved, $excludeSaved, $excludeUnlimited, $excludeLimited, $excludeUnique, $sortByValue, $collectionId));
    }

    /**
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug> $stargift
     * @return SavedStarGifts|null
     * @see https://core.telegram.org/method/payments.getSavedStarGift
     * @api
     */
    public function getSavedStarGift(array $stargift): ?SavedStarGifts
    {
        return $this->client->callSync(new GetSavedStarGiftRequest($stargift));
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
        return $this->client->callSync(new GetStarGiftWithdrawalUrlRequest($stargift, $password));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param bool|null $enabled
     * @return bool
     * @see https://core.telegram.org/method/payments.toggleChatStarGiftNotifications
     * @api
     */
    public function toggleChatStarGiftNotifications(AbstractInputPeer $peer, ?bool $enabled = null): bool
    {
        return (bool) $this->client->callSync(new ToggleChatStarGiftNotificationsRequest($peer, $enabled));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug> $stargift
     * @return bool
     * @see https://core.telegram.org/method/payments.toggleStarGiftsPinnedToTop
     * @api
     */
    public function toggleStarGiftsPinnedToTop(AbstractInputPeer $peer, array $stargift): bool
    {
        return (bool) $this->client->callSync(new ToggleStarGiftsPinnedToTopRequest($peer, $stargift));
    }

    /**
     * @param InputStorePaymentPremiumSubscription|InputStorePaymentGiftPremium|InputStorePaymentPremiumGiftCode|InputStorePaymentPremiumGiveaway|InputStorePaymentStarsTopup|InputStorePaymentStarsGift|InputStorePaymentStarsGiveaway|InputStorePaymentAuthCode $purpose
     * @return bool
     * @see https://core.telegram.org/method/payments.canPurchaseStore
     * @api
     */
    public function canPurchaseStore(AbstractInputStorePaymentPurpose $purpose): bool
    {
        return (bool) $this->client->callSync(new CanPurchaseStoreRequest($purpose));
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
        return $this->client->callSync(new GetResaleStarGiftsRequest($giftId, $offset, $limit, $sortByPrice, $sortByNum, $attributesHash, $attributes));
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
        return $this->client->callSync(new UpdateStarGiftPriceRequest($stargift, $resellAmount));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $title
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug> $stargift
     * @return StarGiftCollection|null
     * @see https://core.telegram.org/method/payments.createStarGiftCollection
     * @api
     */
    public function createStarGiftCollection(AbstractInputPeer $peer, string $title, array $stargift): ?StarGiftCollection
    {
        return $this->client->callSync(new CreateStarGiftCollectionRequest($peer, $title, $stargift));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $collectionId
     * @param string|null $title
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug>|null $deleteStargift
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug>|null $addStargift
     * @param list<InputSavedStarGiftUser|InputSavedStarGiftChat|InputSavedStarGiftSlug>|null $order
     * @return StarGiftCollection|null
     * @see https://core.telegram.org/method/payments.updateStarGiftCollection
     * @api
     */
    public function updateStarGiftCollection(AbstractInputPeer $peer, int $collectionId, ?string $title = null, ?array $deleteStargift = null, ?array $addStargift = null, ?array $order = null): ?StarGiftCollection
    {
        return $this->client->callSync(new UpdateStarGiftCollectionRequest($peer, $collectionId, $title, $deleteStargift, $addStargift, $order));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $order
     * @return bool
     * @see https://core.telegram.org/method/payments.reorderStarGiftCollections
     * @api
     */
    public function reorderStarGiftCollections(AbstractInputPeer $peer, array $order): bool
    {
        return (bool) $this->client->callSync(new ReorderStarGiftCollectionsRequest($peer, $order));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $collectionId
     * @return bool
     * @see https://core.telegram.org/method/payments.deleteStarGiftCollection
     * @api
     */
    public function deleteStarGiftCollection(AbstractInputPeer $peer, int $collectionId): bool
    {
        return (bool) $this->client->callSync(new DeleteStarGiftCollectionRequest($peer, $collectionId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $hash
     * @return StarGiftCollectionsNotModified|StarGiftCollections|null
     * @see https://core.telegram.org/method/payments.getStarGiftCollections
     * @api
     */
    public function getStarGiftCollections(AbstractInputPeer $peer, int $hash): ?AbstractStarGiftCollections
    {
        return $this->client->callSync(new GetStarGiftCollectionsRequest($peer, $hash));
    }
}