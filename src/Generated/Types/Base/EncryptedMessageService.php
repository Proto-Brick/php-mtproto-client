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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->randomId);
        $buffer .= $serializer->int32($this->chatId);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->bytes($this->bytes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $randomId = $deserializer->int64($stream);
        $chatId = $deserializer->int32($stream);
        $date = $deserializer->int32($stream);
        $bytes = $deserializer->bytes($stream);
        return new self(
            $randomId,
            $chatId,
            $date,
            $bytes
        );
    }
}