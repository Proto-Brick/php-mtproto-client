<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInvoice;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWebDocument;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.paymentReceiptStars
 */
final class PaymentReceiptStars extends AbstractPaymentReceipt
{
    public const CONSTRUCTOR_ID = 3669751866;
    
    public string $_ = 'payments.paymentReceiptStars';
    
    /**
     * @param int $date
     * @param int $botId
     * @param string $title
     * @param string $description
     * @param AbstractInvoice $invoice
     * @param string $currency
     * @param int $totalAmount
     * @param string $transactionId
     * @param list<AbstractUser> $users
     * @param AbstractWebDocument|null $photo
     */
    public function __construct(
        public readonly int $date,
        public readonly int $botId,
        public readonly string $title,
        public readonly string $description,
        public readonly AbstractInvoice $invoice,
        public readonly string $currency,
        public readonly int $totalAmount,
        public readonly string $transactionId,
        public readonly array $users,
        public readonly ?AbstractWebDocument $photo = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->photo !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int64($this->botId);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->bytes($this->description);
        if ($flags & (1 << 2)) {
            $buffer .= $this->photo->serialize($serializer);
        }
        $buffer .= $this->invoice->serialize($serializer);
        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->int64($this->totalAmount);
        $buffer .= $serializer->bytes($this->transactionId);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $date = $deserializer->int32($stream);
        $botId = $deserializer->int64($stream);
        $title = $deserializer->bytes($stream);
        $description = $deserializer->bytes($stream);
        $photo = ($flags & (1 << 2)) ? AbstractWebDocument::deserialize($deserializer, $stream) : null;
        $invoice = AbstractInvoice::deserialize($deserializer, $stream);
        $currency = $deserializer->bytes($stream);
        $totalAmount = $deserializer->int64($stream);
        $transactionId = $deserializer->bytes($stream);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
            return new self(
            $date,
            $botId,
            $title,
            $description,
            $invoice,
            $currency,
            $totalAmount,
            $transactionId,
            $users,
            $photo
        );
    }
}