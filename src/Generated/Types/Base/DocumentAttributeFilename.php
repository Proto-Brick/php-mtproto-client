<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/documentAttributeFilename
 */
final class DocumentAttributeFilename extends AbstractDocumentAttribute
{
    public const CONSTRUCTOR_ID = 0x15590068;
    
    public string $predicate = 'documentAttributeFilename';
    
    /**
     * @param string $fileName
     */
    public function __construct(
        public readonly string $fileName
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->fileName);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $fileName = Deserializer::bytes($__payload, $__offset);

        return new self(
            $fileName
        );
    }
}