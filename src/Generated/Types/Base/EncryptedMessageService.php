<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/encryptedMessageService
 */
final class EncryptedMessageService extends AbstractEncryptedMessage
{
    public const CONSTRUCTOR_ID = 0x23734b06;
    
    public string $_ = 'encryptedMessageService';
    
    /**
     * @param int $randomId
     * @param int $chatId
     * @param int $date
     * @param string $bytes
     */
    public function __construct(
        public readonly int $randomId,
        public readonly int $chatId,
        public readonly int $date,
        public readonly string $bytes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->randomId);
        $buffer .= Serializer::int32($this->chatId);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::bytes($this->bytes);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $randomId = Deserializer::int64($stream);
        $chatId = Deserializer::int32($stream);
        $date = Deserializer::int32($stream);
        $bytes = Deserializer::bytes($stream);
        return new self(
            $randomId,
            $chatId,
            $date,
            $bytes
        );
    }
}