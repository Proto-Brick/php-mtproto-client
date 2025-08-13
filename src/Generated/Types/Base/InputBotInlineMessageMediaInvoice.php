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
    
    public string $predicate = 'inputBotInlineMessageMediaInvoice';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->photo !== null) $flags |= (1 << 0);
        if ($this->replyMarkup !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->description);
        if ($flags & (1 << 0)) {
            $buffer .= $this->photo->serialize();
        }
        $buffer .= $this->invoice->serialize();
        $buffer .= Serializer::bytes($this->payload);
        $buffer .= Serializer::bytes($this->provider);
        $buffer .= Serializer::serializeDataJSON($this->providerData);
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $title = Deserializer::bytes($stream);
        $description = Deserializer::bytes($stream);
        $photo = ($flags & (1 << 0)) ? InputWebDocument::deserialize($stream) : null;
        $invoice = Invoice::deserialize($stream);
        $payload = Deserializer::bytes($stream);
        $provider = Deserializer::bytes($stream);
        $providerData = Deserializer::deserializeDataJSON($stream);
        $replyMarkup = ($flags & (1 << 2)) ? AbstractReplyMarkup::deserialize($stream) : null;

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