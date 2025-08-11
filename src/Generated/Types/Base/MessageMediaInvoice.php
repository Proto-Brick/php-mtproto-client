<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageMediaInvoice
 */
final class MessageMediaInvoice extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0xf6a548d3;
    
    public string $_ = 'messageMediaInvoice';
    
    /**
     * @param string $title
     * @param string $description
     * @param string $currency
     * @param int $totalAmount
     * @param string $startParam
     * @param bool|null $shippingAddressRequested
     * @param bool|null $test
     * @param AbstractWebDocument|null $photo
     * @param int|null $receiptMsgId
     * @param AbstractMessageExtendedMedia|null $extendedMedia
     */
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $currency,
        public readonly int $totalAmount,
        public readonly string $startParam,
        public readonly ?bool $shippingAddressRequested = null,
        public readonly ?bool $test = null,
        public readonly ?AbstractWebDocument $photo = null,
        public readonly ?int $receiptMsgId = null,
        public readonly ?AbstractMessageExtendedMedia $extendedMedia = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->shippingAddressRequested) $flags |= (1 << 1);
        if ($this->test) $flags |= (1 << 3);
        if ($this->photo !== null) $flags |= (1 << 0);
        if ($this->receiptMsgId !== null) $flags |= (1 << 2);
        if ($this->extendedMedia !== null) $flags |= (1 << 4);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->description);
        if ($flags & (1 << 0)) {
            $buffer .= $this->photo->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->receiptMsgId);
        }
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->totalAmount);
        $buffer .= Serializer::bytes($this->startParam);
        if ($flags & (1 << 4)) {
            $buffer .= $this->extendedMedia->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $shippingAddressRequested = ($flags & (1 << 1)) ? true : null;
        $test = ($flags & (1 << 3)) ? true : null;
        $title = Deserializer::bytes($stream);
        $description = Deserializer::bytes($stream);
        $photo = ($flags & (1 << 0)) ? AbstractWebDocument::deserialize($stream) : null;
        $receiptMsgId = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;
        $currency = Deserializer::bytes($stream);
        $totalAmount = Deserializer::int64($stream);
        $startParam = Deserializer::bytes($stream);
        $extendedMedia = ($flags & (1 << 4)) ? AbstractMessageExtendedMedia::deserialize($stream) : null;
        return new self(
            $title,
            $description,
            $currency,
            $totalAmount,
            $startParam,
            $shippingAddressRequested,
            $test,
            $photo,
            $receiptMsgId,
            $extendedMedia
        );
    }
}