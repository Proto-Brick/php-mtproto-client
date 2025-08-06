<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionSuggestProfilePhoto
 */
final class MessageActionSuggestProfilePhoto extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x57de635e;
    
    public string $_ = 'messageActionSuggestProfilePhoto';
    
    /**
     * @param AbstractPhoto $photo
     */
    public function __construct(
        public readonly AbstractPhoto $photo
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->photo->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $photo = AbstractPhoto::deserialize($deserializer, $stream);
        return new self(
            $photo
        );
    }
}