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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $title = Deserializer::bytes($stream);
        $description = Deserializer::bytes($stream);
        $photo = (($flags & (1 << 0)) !== 0) ? InputWebDocument::deserialize($stream) : null;
        $invoice = Invoice::deserialize($stream);
        $payload = Deserializer::bytes($stream);
        $provider = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($stream) : null;
        $providerData = Deserializer::deserializeDataJSON($stream);
        $startParam = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;
        $extendedMedia = (($flags & (1 << 2)) !== 0) ? AbstractInputMedia::deserialize($stream) : null;

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