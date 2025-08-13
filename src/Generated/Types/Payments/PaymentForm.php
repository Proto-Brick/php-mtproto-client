<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWebDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\Generated\Types\Base\Invoice;
use DigitalStars\MtprotoClient\Generated\Types\Base\PaymentFormMethod;
use DigitalStars\MtprotoClient\Generated\Types\Base\PaymentRequestedInfo;
use DigitalStars\MtprotoClient\Generated\Types\Base\PaymentSavedCredentials;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.paymentForm
 */
final class PaymentForm extends AbstractPaymentForm
{
    public const CONSTRUCTOR_ID = 0xa0058751;
    
    public string $predicate = 'payments.paymentForm';
    
    /**
     * @param int $formId
     * @param int $botId
     * @param string $title
     * @param string $description
     * @param Invoice $invoice
     * @param int $providerId
     * @param string $url
     * @param list<AbstractUser> $users
     * @param true|null $canSaveCredentials
     * @param true|null $passwordMissing
     * @param AbstractWebDocument|null $photo
     * @param string|null $nativeProvider
     * @param array|null $nativeParams
     * @param list<PaymentFormMethod>|null $additionalMethods
     * @param PaymentRequestedInfo|null $savedInfo
     * @param list<PaymentSavedCredentials>|null $savedCredentials
     */
    public function __construct(
        public readonly int $formId,
        public readonly int $botId,
        public readonly string $title,
        public readonly string $description,
        public readonly Invoice $invoice,
        public readonly int $providerId,
        public readonly string $url,
        public readonly array $users,
        public readonly ?true $canSaveCredentials = null,
        public readonly ?true $passwordMissing = null,
        public readonly ?AbstractWebDocument $photo = null,
        public readonly ?string $nativeProvider = null,
        public readonly ?array $nativeParams = null,
        public readonly ?array $additionalMethods = null,
        public readonly ?PaymentRequestedInfo $savedInfo = null,
        public readonly ?array $savedCredentials = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canSaveCredentials) $flags |= (1 << 2);
        if ($this->passwordMissing) $flags |= (1 << 3);
        if ($this->photo !== null) $flags |= (1 << 5);
        if ($this->nativeProvider !== null) $flags |= (1 << 4);
        if ($this->nativeParams !== null) $flags |= (1 << 4);
        if ($this->additionalMethods !== null) $flags |= (1 << 6);
        if ($this->savedInfo !== null) $flags |= (1 << 0);
        if ($this->savedCredentials !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->formId);
        $buffer .= Serializer::int64($this->botId);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->description);
        if ($flags & (1 << 5)) {
            $buffer .= $this->photo->serialize();
        }
        $buffer .= $this->invoice->serialize();
        $buffer .= Serializer::int64($this->providerId);
        $buffer .= Serializer::bytes($this->url);
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::bytes($this->nativeProvider);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::serializeDataJSON($this->nativeParams);
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::vectorOfObjects($this->additionalMethods);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $this->savedInfo->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->savedCredentials);
        }
        $buffer .= Serializer::vectorOfObjects($this->users);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $canSaveCredentials = ($flags & (1 << 2)) ? true : null;
        $passwordMissing = ($flags & (1 << 3)) ? true : null;
        $formId = Deserializer::int64($stream);
        $botId = Deserializer::int64($stream);
        $title = Deserializer::bytes($stream);
        $description = Deserializer::bytes($stream);
        $photo = ($flags & (1 << 5)) ? AbstractWebDocument::deserialize($stream) : null;
        $invoice = Invoice::deserialize($stream);
        $providerId = Deserializer::int64($stream);
        $url = Deserializer::bytes($stream);
        $nativeProvider = ($flags & (1 << 4)) ? Deserializer::bytes($stream) : null;
        $nativeParams = ($flags & (1 << 4)) ? Deserializer::deserializeDataJSON($stream) : null;
        $additionalMethods = ($flags & (1 << 6)) ? Deserializer::vectorOfObjects($stream, [PaymentFormMethod::class, 'deserialize']) : null;
        $savedInfo = ($flags & (1 << 0)) ? PaymentRequestedInfo::deserialize($stream) : null;
        $savedCredentials = ($flags & (1 << 1)) ? Deserializer::vectorOfObjects($stream, [PaymentSavedCredentials::class, 'deserialize']) : null;
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $formId,
            $botId,
            $title,
            $description,
            $invoice,
            $providerId,
            $url,
            $users,
            $canSaveCredentials,
            $passwordMissing,
            $photo,
            $nativeProvider,
            $nativeParams,
            $additionalMethods,
            $savedInfo,
            $savedCredentials
        );
    }
}