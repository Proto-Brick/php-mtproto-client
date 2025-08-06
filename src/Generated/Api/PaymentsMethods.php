<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ApplyGiftCodeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\AssignAppStoreTransactionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\AssignPlayMarketTransactionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\BotCancelStarsSubscriptionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\CanPurchasePremiumRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ChangeStarsSubscriptionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\CheckGiftCodeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ClearSavedInfoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ConnectStarRefBotRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ConvertStarGiftRequest;
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
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetSavedInfoRequest;
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
use DigitalStars\MtprotoClient\Generated\Methods\Payments\GetUserStarGiftsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\LaunchPrepaidGiveawayRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\RefundStarsChargeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\SaveStarGiftRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\SendPaymentFormRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\SendStarsFormRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Payments\ValidateRequestedInfoRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputInvoice;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPaymentCredentials;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStorePaymentPurpose;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCheckPasswordEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoiceChatInviteSubscription;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoiceMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoicePremiumGiftCode;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoiceSlug;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputInvoiceStarGift;
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
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStarsTransaction;
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
use DigitalStars\MtprotoClient\Generated\Types\Base\StarsGiftOption;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarsGiveawayOption;
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
use DigitalStars\MtprotoClient\Generated\Types\Payments\SavedInfo;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarGifts;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarGiftsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarsRevenueAdsAccountUrl;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarsRevenueStats;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarsRevenueWithdrawalUrl;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarsStatus;
use DigitalStars\MtprotoClient\Generated\Types\Payments\SuggestedStarRefBots;
use DigitalStars\MtprotoClient\Generated\Types\Payments\UserStarGifts;
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
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift $invoice
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
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift $invoice
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
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift $invoice
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
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia $invoiceMedia
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
     * @param InputStorePaymentPremiumSubscription|InputStorePaymentGiftPremium|InputStorePaymentPremiumGiftCode|InputStorePaymentPremiumGiveaway|InputStorePaymentStarsTopup|InputStorePaymentStarsGift|InputStorePaymentStarsGiveaway $purpose
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
     * @param InputStorePaymentPremiumSubscription|InputStorePaymentGiftPremium|InputStorePaymentPremiumGiftCode|InputStorePaymentPremiumGiveaway|InputStorePaymentStarsTopup|InputStorePaymentStarsGift|InputStorePaymentStarsGiveaway $purpose
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/payments.assignPlayMarketTransaction
     * @api
     */
    public function assignPlayMarketTransaction(array $receipt, AbstractInputStorePaymentPurpose $purpose): ?AbstractUpdates
    {
        return $this->client->callSync(new AssignPlayMarketTransactionRequest($receipt, $purpose));
    }

    /**
     * @param InputStorePaymentPremiumSubscription|InputStorePaymentGiftPremium|InputStorePaymentPremiumGiftCode|InputStorePaymentPremiumGiveaway|InputStorePaymentStarsTopup|InputStorePaymentStarsGift|InputStorePaymentStarsGiveaway $purpose
     * @return bool
     * @see https://core.telegram.org/method/payments.canPurchasePremium
     * @api
     */
    public function canPurchasePremium(AbstractInputStorePaymentPurpose $purpose): bool
    {
        return (bool) $this->client->callSync(new CanPurchasePremiumRequest($purpose));
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
     * @param InputStorePaymentPremiumSubscription|InputStorePaymentGiftPremium|InputStorePaymentPremiumGiftCode|InputStorePaymentPremiumGiveaway|InputStorePaymentStarsTopup|InputStorePaymentStarsGift|InputStorePaymentStarsGiveaway $purpose
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
     * @return StarsStatus|null
     * @see https://core.telegram.org/method/payments.getStarsStatus
     * @api
     */
    public function getStarsStatus(AbstractInputPeer $peer): ?StarsStatus
    {
        return $this->client->callSync(new GetStarsStatusRequest($peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $offset
     * @param int $limit
     * @param bool|null $inbound
     * @param bool|null $outbound
     * @param bool|null $ascending
     * @param string|null $subscriptionId
     * @return StarsStatus|null
     * @see https://core.telegram.org/method/payments.getStarsTransactions
     * @api
     */
    public function getStarsTransactions(AbstractInputPeer $peer, string $offset, int $limit, ?bool $inbound = null, ?bool $outbound = null, ?bool $ascending = null, ?string $subscriptionId = null): ?StarsStatus
    {
        return $this->client->callSync(new GetStarsTransactionsRequest($peer, $offset, $limit, $inbound, $outbound, $ascending, $subscriptionId));
    }

    /**
     * @param int $formId
     * @param InputInvoiceMessage|InputInvoiceSlug|InputInvoicePremiumGiftCode|InputInvoiceStars|InputInvoiceChatInviteSubscription|InputInvoiceStarGift $invoice
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
     * @return StarsRevenueStats|null
     * @see https://core.telegram.org/method/payments.getStarsRevenueStats
     * @api
     */
    public function getStarsRevenueStats(AbstractInputPeer $peer, ?bool $dark = null): ?StarsRevenueStats
    {
        return $this->client->callSync(new GetStarsRevenueStatsRequest($peer, $dark));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $stars
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @return StarsRevenueWithdrawalUrl|null
     * @see https://core.telegram.org/method/payments.getStarsRevenueWithdrawalUrl
     * @api
     */
    public function getStarsRevenueWithdrawalUrl(AbstractInputPeer $peer, int $stars, AbstractInputCheckPasswordSRP $password): ?StarsRevenueWithdrawalUrl
    {
        return $this->client->callSync(new GetStarsRevenueWithdrawalUrlRequest($peer, $stars, $password));
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
     * @return StarsStatus|null
     * @see https://core.telegram.org/method/payments.getStarsTransactionsByID
     * @api
     */
    public function getStarsTransactionsByID(AbstractInputPeer $peer, array $id): ?StarsStatus
    {
        return $this->client->callSync(new GetStarsTransactionsByIDRequest($peer, $id));
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
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param string $offset
     * @param int $limit
     * @return UserStarGifts|null
     * @see https://core.telegram.org/method/payments.getUserStarGifts
     * @api
     */
    public function getUserStarGifts(AbstractInputUser $userId, string $offset, int $limit): ?UserStarGifts
    {
        return $this->client->callSync(new GetUserStarGiftsRequest($userId, $offset, $limit));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param int $msgId
     * @param bool|null $unsave
     * @return bool
     * @see https://core.telegram.org/method/payments.saveStarGift
     * @api
     */
    public function saveStarGift(AbstractInputUser $userId, int $msgId, ?bool $unsave = null): bool
    {
        return (bool) $this->client->callSync(new SaveStarGiftRequest($userId, $msgId, $unsave));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param int $msgId
     * @return bool
     * @see https://core.telegram.org/method/payments.convertStarGift
     * @api
     */
    public function convertStarGift(AbstractInputUser $userId, int $msgId): bool
    {
        return (bool) $this->client->callSync(new ConvertStarGiftRequest($userId, $msgId));
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
}