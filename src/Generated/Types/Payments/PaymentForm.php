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
    
    public string $_ = 'payments.paymentForm';
    
    /**
     * @param int $formId
     * @param int $botId
     * @param string $title
     * @param string $description
     * @param Invoice $invoice
     * @param int $providerId
     * @param string $url
     * @param list<AbstractUser> $users
     * @param bool|null $canSaveCredentials
     * @param bool|null $passwordMissing
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
        public readonly ?bool $canSaveCredentials = null,
        public readonly ?bool $passwordMissing = null,
        public readonly ?AbstractWebDocument $photo = null,
        public readonly ?string $nativeProvider = null,
        public readonly ?array $nativeParams = null,
        public readonly ?array $additionalMethods = null,
        public readonly ?PaymentRequestedInfo $savedInfo = null,
        public readonly ?array $savedCredentials = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canSaveCredentials) $flags |= (1 << 2);
        if ($this->passwordMissing) $flags |= (1 << 3);
        if ($this->photo !== null) $flags |= (1 << 5);
        if ($this->nativeProvider !== null) $flags |= (1 << 4);
        if ($this->nativeParams !== null) $flags |= (1 << 4);
        if ($this->additionalMethods !== null) $flags |= (1 << 6);
        if ($this->savedInfo !== null) $flags |= (1 << 0);
        if ($this->savedCredentials !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->formId);
        $buffer .= $serializer->int64($this->botId);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->bytes($this->description);
        if ($flags & (1 << 5)) {
            $buffer .= $this->photo->serialize($serializer);
        }
        $buffer .= $this->invoice->serialize($serializer);
        $buffer .= $serializer->int64($this->providerId);
        $buffer .= $serializer->bytes($this->url);
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->bytes($this->nativeProvider);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->bytes(json_encode($this->nativeParams, JSON_FORCE_OBJECT));
        }
        if ($flags & (1 << 6)) {
            $buffer .= $serializer->vectorOfObjects($this->additionalMethods);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $this->savedInfo->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfObjects($this->savedCredentials);
        }
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $canSaveCredentials = ($flags & (1 << 2)) ? true : null;
        $passwordMissing = ($flags & (1 << 3)) ? true : null;
        $formId = $deserializer->int64($stream);
        $botId = $deserializer->int64($stream);
        $title = $deserializer->bytes($stream);
        $description = $deserializer->bytes($stream);
        $photo = ($flags & (1 << 5)) ? AbstractWebDocument::deserialize($deserializer, $stream) : null;
        $invoice = Invoice::deserialize($deserializer, $stream);
        $providerId = $deserializer->int64($stream);
        $url = $deserializer->bytes($stream);
        $nativeProvider = ($flags & (1 << 4)) ? $deserializer->bytes($stream) : null;
        $nativeParams = ($flags & (1 << 4)) ? $deserializer->deserializeDataJSON($stream) : null;
        $additionalMethods = ($flags & (1 << 6)) ? $deserializer->vectorOfObjects($stream, [PaymentFormMethod::class, 'deserialize']) : null;
        $savedInfo = ($flags & (1 << 0)) ? PaymentRequestedInfo::deserialize($deserializer, $stream) : null;
        $savedCredentials = ($flags & (1 << 1)) ? $deserializer->vectorOfObjects($stream, [PaymentSavedCredentials::class, 'deserialize']) : null;
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
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