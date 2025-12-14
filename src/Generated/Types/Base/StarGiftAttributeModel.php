<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/starGiftAttributeModel
 */
final class StarGiftAttributeModel extends AbstractStarGiftAttribute
{
    public const CONSTRUCTOR_ID = 0x39d99013;
    
    public string $predicate = 'starGiftAttributeModel';
    
    /**
     * @param string $name
     * @param AbstractDocument $document
     * @param int $rarityPermille
     */
    public function __construct(
        public readonly string $name,
        public readonly AbstractDocument $document,
        public readonly int $rarityPermille
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->name);
        $buffer .= $this->document->serialize();
        $buffer .= Serializer::int32($this->rarityPermille);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $name = Deserializer::bytes($stream);
        $document = AbstractDocument::deserialize($stream);
        $rarityPermille = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $name,
            $document,
            $rarityPermille
        );
    }
}