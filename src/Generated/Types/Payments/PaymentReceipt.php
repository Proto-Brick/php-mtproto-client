<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInvoice;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPaymentRequestedInfo;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractShippingOption;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWebDocument;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.paymentReceipt
 */
final class PaymentReceipt extends AbstractPaymentReceipt
{
    public const CONSTRUCTOR_ID = 1891958275;
    
    public string $_ = 'payments.paymentReceipt';
    
    /**
     * @param int $date
     * @param int $botId
     * @param int $providerId
     * @param string $title
     * @param string $description
     * @param AbstractInvoice $invoice
     * @param string $currency
     * @param int $totalAmount
     * @param string $credentialsTitle
     * @param list<AbstractUser> $users
     * @param AbstractWebDocument|null $photo
     * @param AbstractPaymentRequestedInfo|null $info
     * @param AbstractShippingOption|null $shipping
     * @param int|null $tipAmount
     */
    public function __construct(
        public readonly int $date,
        public readonly int $botId,
        public readonly int $providerId,
        public readonly string $title,
        public readonly string $description,
        public readonly AbstractInvoice $invoice,
        public readonly string $currency,
        public readonly int $totalAmount,
        public readonly string $credentialsTitle,
        public readonly array $users,
        public readonly ?AbstractWebDocument $photo = null,
        public readonly ?AbstractPaymentRequestedInfo $info = null,
        public readonly ?AbstractShippingOption $shipping = null,
        public readonly ?int $tipAmount = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->photo !== null) $flags |= (1 << 2);
        if ($this->info !== null) $flags |= (1 << 0);
        if ($this->shipping !== null) $flags |= (1 << 1);
        if ($this->tipAmount !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int64($this->botId);
        $buffer .= $serializer->int64($this->providerId);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->bytes($this->description);
        if ($flags & (1 << 2)) {
            $buffer .= $this->photo->serialize($serializer);
        }
        $buffer .= $this->invoice->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $this->info->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->shipping->serialize($serializer);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->int64($this->tipAmount);
        }
        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->int64($this->totalAmount);
        $buffer .= $serializer->bytes($this->credentialsTitle);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $date = $deserializer->int32($stream);
        $botId = $deserializer->int64($stream);
        $providerId = $deserializer->int64($stream);
        $title = $deserializer->bytes($stream);
        $description = $deserializer->bytes($stream);
        $photo = ($flags & (1 << 2)) ? AbstractWebDocument::deserialize($deserializer, $stream) : null;
        $invoice = AbstractInvoice::deserialize($deserializer, $stream);
        $info = ($flags & (1 << 0)) ? AbstractPaymentRequestedInfo::deserialize($deserializer, $stream) : null;
        $shipping = ($flags & (1 << 1)) ? AbstractShippingOption::deserialize($deserializer, $stream) : null;
        $tipAmount = ($flags & (1 << 3)) ? $deserializer->int64($stream) : null;
        $currency = $deserializer->bytes($stream);
        $totalAmount = $deserializer->int64($stream);
        $credentialsTitle = $deserializer->bytes($stream);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
            return new self(
            $date,
            $botId,
            $providerId,
            $title,
            $description,
            $invoice,
            $currency,
            $totalAmount,
            $credentialsTitle,
            $users,
            $photo,
            $info,
            $shipping,
            $tipAmount
        );
    }
}