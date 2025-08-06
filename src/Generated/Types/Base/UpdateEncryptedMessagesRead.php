<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateEncryptedMessagesRead
 */
final class UpdateEncryptedMessagesRead extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x38fe25b7;
    
    public string $_ = 'updateEncryptedMessagesRead';
    
    /**
     * @param int $chatId
     * @param int $maxDate
     * @param int $date
     */
    public function __construct(
        public readonly int $chatId,
        public readonly int $maxDate,
        public readonly int $date
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->chatId);
        $buffer .= $serializer->int32($this->maxDate);
        $buffer .= $serializer->int32($this->date);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $chatId = $deserializer->int32($stream);
        $maxDate = $deserializer->int32($stream);
        $date = $deserializer->int32($stream);
        return new self(
            $chatId,
            $maxDate,
            $date
        );
    }
}