<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/encryptedChatEmpty
 */
final class EncryptedChatEmpty extends AbstractEncryptedChat
{
    public const CONSTRUCTOR_ID = 0xab7ec0a0;
    
    public string $predicate = 'encryptedChatEmpty';
    
    /**
     * @param int $id
     */
    public function __construct(
        public readonly int $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->id);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = Deserializer::int32($stream);

        return new self(
            $id
        );
    }
}