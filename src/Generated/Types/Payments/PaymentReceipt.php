<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractWebDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Invoice;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PaymentRequestedInfo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ShippingOption;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/payments.paymentReceipt
 */
final class PaymentReceipt extends AbstractPaymentReceipt
{
    public const CONSTRUCTOR_ID = 0x70c4fe03;
    
    public string $predicate = 'payments.paymentReceipt';
    
    /**
     * @param int $date
     * @param int $botId
     * @param int $providerId
     * @param string $title
     * @param string $description
     * @param Invoice $invoice
     * @param string $currency
     * @param int $totalAmount
     * @param string $credentialsTitle
     * @param list<AbstractUser> $users
     * @param AbstractWebDocument|null $photo
     * @param PaymentRequestedInfo|null $info
     * @param ShippingOption|null $shipping
     * @param int|null $tipAmount
     */
    public function __construct(
        public readonly int $date,
        public readonly int $botId,
        public readonly int $providerId,
        public readonly string $title,
        public readonly string $description,
        public readonly Invoice $invoice,
        public readonly string $currency,
        public readonly int $totalAmount,
        public readonly string $credentialsTitle,
        public readonly array $users,
        public readonly ?AbstractWebDocument $photo = null,
        public readonly ?PaymentRequestedInfo $info = null,
        public readonly ?ShippingOption $shipping = null,
        public readonly ?int $tipAmount = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->photo !== null) {
            $flags |= (1 << 2);
        }
        if ($this->info !== null) {
            $flags |= (1 << 0);
        }
        if ($this->shipping !== null) {
            $flags |= (1 << 1);
        }
        if ($this->tipAmount !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int64($this->botId);
        $buffer .= Serializer::int64($this->providerId);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->description);
        if ($flags & (1 << 2)) {
            $buffer .= $this->photo->serialize();
        }
        $buffer .= $this->invoice->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->info->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->shipping->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int64($this->tipAmount);
        }
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->totalAmount);
        $buffer .= Serializer::bytes($this->credentialsTitle);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $date = Deserializer::int32($stream);
        $botId = Deserializer::int64($stream);
        $providerId = Deserializer::int64($stream);
        $title = Deserializer::bytes($stream);
        $description = Deserializer::bytes($stream);
        $photo = (($flags & (1 << 2)) !== 0) ? AbstractWebDocument::deserialize($stream) : null;
        $invoice = Invoice::deserialize($stream);
        $info = (($flags & (1 << 0)) !== 0) ? PaymentRequestedInfo::deserialize($stream) : null;
        $shipping = (($flags & (1 << 1)) !== 0) ? ShippingOption::deserialize($stream) : null;
        $tipAmount = (($flags & (1 << 3)) !== 0) ? Deserializer::int64($stream) : null;
        $currency = Deserializer::bytes($stream);
        $totalAmount = Deserializer::int64($stream);
        $credentialsTitle = Deserializer::bytes($stream);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

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