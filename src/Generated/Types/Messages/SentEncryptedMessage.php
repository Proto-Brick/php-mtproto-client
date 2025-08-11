<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.sentEncryptedMessage
 */
final class SentEncryptedMessage extends AbstractSentEncryptedMessage
{
    public const CONSTRUCTOR_ID = 0x560f8935;
    
    public string $_ = 'messages.sentEncryptedMessage';
    
    /**
     * @param int $date
     */
    public function __construct(
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $date = Deserializer::int32($stream);
        return new self(
            $date
        );
    }
}