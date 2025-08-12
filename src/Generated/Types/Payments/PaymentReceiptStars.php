<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWebDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\Invoice;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.paymentReceiptStars
 */
final class PaymentReceiptStars extends AbstractPaymentReceipt
{
    public const CONSTRUCTOR_ID = 0xdabbf83a;
    
    public string $predicate = 'payments.paymentReceiptStars';
    
    /**
     * @param int $date
     * @param int $botId
     * @param string $title
     * @param string $description
     * @param Invoice $invoice
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
        public readonly Invoice $invoice,
        public readonly string $currency,
        public readonly int $totalAmount,
        public readonly string $transactionId,
        public readonly array $users,
        public readonly ?AbstractWebDocument $photo = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->photo !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int64($this->botId);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->description);
        if ($flags & (1 << 2)) {
            $buffer .= $this->photo->serialize();
        }
        $buffer .= $this->invoice->serialize();
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->totalAmount);
        $buffer .= Serializer::bytes($this->transactionId);
        $buffer .= Serializer::vectorOfObjects($this->users);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $date = Deserializer::int32($stream);
        $botId = Deserializer::int64($stream);
        $title = Deserializer::bytes($stream);
        $description = Deserializer::bytes($stream);
        $photo = ($flags & (1 << 2)) ? AbstractWebDocument::deserialize($stream) : null;
        $invoice = Invoice::deserialize($stream);
        $currency = Deserializer::bytes($stream);
        $totalAmount = Deserializer::int64($stream);
        $transactionId = Deserializer::bytes($stream);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

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