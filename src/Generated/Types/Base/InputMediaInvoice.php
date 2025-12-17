<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMediaInvoice
 */
final class InputMediaInvoice extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0x405fef0d;
    
    public string $predicate = 'inputMediaInvoice';
    
    /**
     * @param string $title
     * @param string $description
     * @param Invoice $invoice
     * @param string $payload
     * @param array $providerData
     * @param InputWebDocument|null $photo
     * @param string|null $provider
     * @param string|null $startParam
     * @param AbstractInputMedia|null $extendedMedia
     */
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly Invoice $invoice,
        public readonly string $payload,
        public readonly array $providerData,
        public readonly ?InputWebDocument $photo = null,
        public readonly ?string $provider = null,
        public readonly ?string $startParam = null,
        public readonly ?AbstractInputMedia $extendedMedia = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->photo !== null) {
            $flags |= (1 << 0);
        }
        if ($this->provider !== null) {
            $flags |= (1 << 3);
        }
        if ($this->startParam !== null) {
            $flags |= (1 << 1);
        }
        if ($this->extendedMedia !== null) {
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
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->provider);
        }
        $buffer .= Serializer::serializeDataJSON($this->providerData);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->startParam);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->extendedMedia->serialize();
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
        $provider = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $providerData = Deserializer::deserializeDataJSON($__payload, $__offset);
        $startParam = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $extendedMedia = (($flags & (1 << 2)) !== 0) ? AbstractInputMedia::deserialize($__payload, $__offset) : null;

        return new self(
            $title,
            $description,
            $invoice,
            $payload,
            $providerData,
            $photo,
            $provider,
            $startParam,
            $extendedMedia
        );
    }
}