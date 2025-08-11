<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/documentAttributeFilename
 */
final class DocumentAttributeFilename extends AbstractDocumentAttribute
{
    public const CONSTRUCTOR_ID = 0x15590068;
    
    public string $_ = 'documentAttributeFilename';
    
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $fileName = Deserializer::bytes($stream);
        return new self(
            $fileName
        );
    }
}