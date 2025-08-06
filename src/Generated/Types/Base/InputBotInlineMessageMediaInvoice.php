<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBotInlineMessageMediaInvoice
 */
final class InputBotInlineMessageMediaInvoice extends AbstractInputBotInlineMessage
{
    public const CONSTRUCTOR_ID = 0xd7e78225;
    
    public string $_ = 'inputBotInlineMessageMediaInvoice';
    
    /**
     * @param string $title
     * @param string $description
     * @param Invoice $invoice
     * @param string $payload
     * @param string $provider
     * @param array $providerData
     * @param InputWebDocument|null $photo
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly Invoice $invoice,
        public readonly string $payload,
        public readonly string $provider,
        public readonly array $providerData,
        public readonly ?InputWebDocument $photo = null,
        public readonly ?AbstractReplyMarkup $replyMarkup = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->photo !== null) $flags |= (1 << 0);
        if ($this->replyMarkup !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->bytes($this->description);
        if ($flags & (1 << 0)) {
            $buffer .= $this->photo->serialize($serializer);
        }
        $buffer .= $this->invoice->serialize($serializer);
        $buffer .= $serializer->bytes($this->payload);
        $buffer .= $serializer->bytes($this->provider);
        $buffer .= $serializer->bytes(json_encode($this->providerData, JSON_FORCE_OBJECT));
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $title = $deserializer->bytes($stream);
        $description = $deserializer->bytes($stream);
        $photo = ($flags & (1 << 0)) ? InputWebDocument::deserialize($deserializer, $stream) : null;
        $invoice = Invoice::deserialize($deserializer, $stream);
        $payload = $deserializer->bytes($stream);
        $provider = $deserializer->bytes($stream);
        $providerData = $deserializer->deserializeDataJSON($stream);
        $replyMarkup = ($flags & (1 << 2)) ? AbstractReplyMarkup::deserialize($deserializer, $stream) : null;
        return new self(
            $title,
            $description,
            $invoice,
            $payload,
            $provider,
            $providerData,
            $photo,
            $replyMarkup
        );
    }
}