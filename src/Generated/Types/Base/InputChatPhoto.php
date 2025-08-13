<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputChatPhoto
 */
final class InputChatPhoto extends AbstractInputChatPhoto
{
    public const CONSTRUCTOR_ID = 0x8953ad37;
    
    public string $predicate = 'inputChatPhoto';
    
    /**
     * @param AbstractInputPhoto $id
     */
    public function __construct(
        public readonly AbstractInputPhoto $id
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
        $id = AbstractInputPhoto::deserialize($stream);

        return new self(
            $id
        );
    }
}