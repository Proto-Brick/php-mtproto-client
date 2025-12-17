<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
        if ($this->photo !== null) {
            $flags |= (1 << 0);
        }
        if ($this->replyMarkup !== null) {
            $flags |= (1 << 2);
        }
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $title = Deserializer::bytes($__payload, $__offset);
        $description = Deserializer::bytes($__payload, $__offset);
        $photo = (($flags & (1 << 0)) !== 0) ? InputWebDocument::deserialize($__payload, $__offset) : null;
        $invoice = Invoice::deserialize($__payload, $__offset);
        $payload = Deserializer::bytes($__payload, $__offset);
        $provider = Deserializer::bytes($__payload, $__offset);
        $providerData = Deserializer::deserializeDataJSON($__payload, $__offset);
        $replyMarkup = (($flags & (1 << 2)) !== 0) ? AbstractReplyMarkup::deserialize($__payload, $__offset) : null;

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