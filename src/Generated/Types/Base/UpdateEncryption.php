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
    
    public string $predicate = 'updateEncryption';
    
    /**
     * @param AbstractEncryptedChat $chat
     * @param int $date
     */
    public function __construct(
        public readonly AbstractEncryptedChat $chat,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chat->serialize();
        $buffer .= Serializer::int32($this->date);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $chat = AbstractEncryptedChat::deserialize($stream);
        $date = Deserializer::int32($stream);

        return new self(
            $chat,
            $date
        );
    }
}