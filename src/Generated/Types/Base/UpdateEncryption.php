<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateEncryption
 */
final class UpdateEncryption extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xb4a2e88d;
    
    public string $_ = 'updateEncryption';
    
    /**
     * @param AbstractEncryptedChat $chat
     * @param int $date
     */
    public function __construct(
        public readonly AbstractEncryptedChat $chat,
        public readonly int $date
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chat->serialize($serializer);
        $buffer .= $serializer->int32($this->date);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $chat = AbstractEncryptedChat::deserialize($deserializer, $stream);
        $date = $deserializer->int32($stream);
        return new self(
            $chat,
            $date
        );
    }
}