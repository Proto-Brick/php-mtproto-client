<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputChatPhoto
 */
final class InputChatPhoto extends AbstractInputChatPhoto
{
    public const CONSTRUCTOR_ID = 0x8953ad37;
    
    public string $_ = 'inputChatPhoto';
    
    /**
     * @param AbstractInputPhoto $id
     */
    public function __construct(
        public readonly AbstractInputPhoto $id
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = AbstractInputPhoto::deserialize($deserializer, $stream);
        return new self(
            $id
        );
    }
}