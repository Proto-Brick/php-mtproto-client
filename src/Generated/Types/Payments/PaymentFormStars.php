<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractWebDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Invoice;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/payments.paymentFormStars
 */
final class PaymentFormStars extends AbstractPaymentForm
{
    public const CONSTRUCTOR_ID = 0x7bf6b15c;
    
    public string $predicate = 'payments.paymentFormStars';
    
    /**
     * @param int $formId
     * @param int $botId
     * @param string $title
     * @param string $description
     * @param Invoice $invoice
     * @param list<AbstractUser> $users
     * @param AbstractWebDocument|null $photo
     */
    public function __construct(
        public readonly int $formId,
        public readonly int $botId,
        public readonly string $title,
        public readonly string $description,
        public readonly Invoice $invoice,
        public readonly array $users,
        public readonly ?AbstractWebDocument $photo = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->photo !== null) {
            $flags |= (1 << 5);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->formId);
        $buffer .= Serializer::int64($this->botId);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->description);
        if ($flags & (1 << 5)) {
            $buffer .= $this->photo->serialize();
        }
        $buffer .= $this->invoice->serialize();
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $formId = Deserializer::int64($__payload, $__offset);
        $botId = Deserializer::int64($__payload, $__offset);
        $title = Deserializer::bytes($__payload, $__offset);
        $description = Deserializer::bytes($__payload, $__offset);
        $photo = (($flags & (1 << 5)) !== 0) ? AbstractWebDocument::deserialize($__payload, $__offset) : null;
        $invoice = Invoice::deserialize($__payload, $__offset);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $formId,
            $botId,
            $title,
            $description,
            $invoice,
            $users,
            $photo
        );
    }
}