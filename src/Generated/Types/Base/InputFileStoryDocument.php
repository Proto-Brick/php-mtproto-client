<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputFileStoryDocument
 */
final class InputFileStoryDocument extends AbstractInputFile
{
    public const CONSTRUCTOR_ID = 0x62dc8b48;
    
    public string $predicate = 'inputFileStoryDocument';
    
    /**
     * @param AbstractInputDocument $id
     */
    public function __construct(
        public readonly AbstractInputDocument $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = AbstractInputDocument::deserialize($stream);

        return new self(
            $id
        );
    }
}