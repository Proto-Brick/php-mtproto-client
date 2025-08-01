<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInvoice;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWebDocument;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.paymentFormStars
 */
final class PaymentFormStars extends AbstractPaymentForm
{
    public const CONSTRUCTOR_ID = 2079764828;
    
    public string $_ = 'payments.paymentFormStars';
    
    /**
     * @param int $formId
     * @param int $botId
     * @param string $title
     * @param string $description
     * @param AbstractInvoice $invoice
     * @param list<AbstractUser> $users
     * @param AbstractWebDocument|null $photo
     */
    public function __construct(
        public readonly int $formId,
        public readonly int $botId,
        public readonly string $title,
        public readonly string $description,
        public readonly AbstractInvoice $invoice,
        public readonly array $users,
        public readonly ?AbstractWebDocument $photo = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->photo !== null) $flags |= (1 << 5);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->formId);
        $buffer .= $serializer->int64($this->botId);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->bytes($this->description);
        if ($flags & (1 << 5)) {
            $buffer .= $this->photo->serialize($serializer);
        }
        $buffer .= $this->invoice->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $formId = $deserializer->int64($stream);
        $botId = $deserializer->int64($stream);
        $title = $deserializer->bytes($stream);
        $description = $deserializer->bytes($stream);
        $photo = ($flags & (1 << 5)) ? AbstractWebDocument::deserialize($deserializer, $stream) : null;
        $invoice = AbstractInvoice::deserialize($deserializer, $stream);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
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