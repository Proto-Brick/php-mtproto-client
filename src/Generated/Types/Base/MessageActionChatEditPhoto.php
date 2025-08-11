<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionChatEditPhoto
 */
final class MessageActionChatEditPhoto extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x7fcb13a8;
    
    public string $_ = 'messageActionChatEditPhoto';
    
    /**
     * @param AbstractPhoto $photo
     */
    public function __construct(
        public readonly AbstractPhoto $photo
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->photo->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $photo = AbstractPhoto::deserialize($stream);
        return new self(
            $photo
        );
    }
}