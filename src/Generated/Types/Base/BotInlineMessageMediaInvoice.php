<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/botInlineMessageMediaInvoice
 */
final class BotInlineMessageMediaInvoice extends AbstractBotInlineMessage
{
    public const CONSTRUCTOR_ID = 894081801;
    
    public string $_ = 'botInlineMessageMediaInvoice';
    
    /**
     * @param string $title
     * @param string $description
     * @param string $currency
     * @param int $totalAmount
     * @param bool|null $shippingAddressRequested
     * @param bool|null $test
     * @param AbstractWebDocument|null $photo
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $currency,
        public readonly int $totalAmount,
        public readonly ?bool $shippingAddressRequested = null,
        public readonly ?bool $test = null,
        public readonly ?AbstractWebDocument $photo = null,
        public readonly ?AbstractReplyMarkup $replyMarkup = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->shippingAddressRequested) $flags |= (1 << 1);
        if ($this->test) $flags |= (1 << 3);
        if ($this->photo !== null) $flags |= (1 << 0);
        if ($this->replyMarkup !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->bytes($this->description);
        if ($flags & (1 << 0)) {
            $buffer .= $this->photo->serialize($serializer);
        }
        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->int64($this->totalAmount);
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $shippingAddressRequested = ($flags & (1 << 1)) ? true : null;
        $test = ($flags & (1 << 3)) ? true : null;
        $title = $deserializer->bytes($stream);
        $description = $deserializer->bytes($stream);
        $photo = ($flags & (1 << 0)) ? AbstractWebDocument::deserialize($deserializer, $stream) : null;
        $currency = $deserializer->bytes($stream);
        $totalAmount = $deserializer->int64($stream);
        $replyMarkup = ($flags & (1 << 2)) ? AbstractReplyMarkup::deserialize($deserializer, $stream) : null;
            return new self(
            $title,
            $description,
            $currency,
            $totalAmount,
            $shippingAddressRequested,
            $test,
            $photo,
            $replyMarkup
        );
    }
}