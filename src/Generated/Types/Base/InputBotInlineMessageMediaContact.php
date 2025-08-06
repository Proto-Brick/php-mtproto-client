<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBotInlineMessageMediaContact
 */
final class InputBotInlineMessageMediaContact extends AbstractInputBotInlineMessage
{
    public const CONSTRUCTOR_ID = 0xa6edbffd;
    
    public string $_ = 'inputBotInlineMessageMediaContact';
    
    /**
     * @param string $phoneNumber
     * @param string $firstName
     * @param string $lastName
     * @param string $vcard
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $vcard,
        public readonly ?AbstractReplyMarkup $replyMarkup = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->replyMarkup !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->phoneNumber);
        $buffer .= $serializer->bytes($this->firstName);
        $buffer .= $serializer->bytes($this->lastName);
        $buffer .= $serializer->bytes($this->vcard);
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $phoneNumber = $deserializer->bytes($stream);
        $firstName = $deserializer->bytes($stream);
        $lastName = $deserializer->bytes($stream);
        $vcard = $deserializer->bytes($stream);
        $replyMarkup = ($flags & (1 << 2)) ? AbstractReplyMarkup::deserialize($deserializer, $stream) : null;
        return new self(
            $phoneNumber,
            $firstName,
            $lastName,
            $vcard,
            $replyMarkup
        );
    }
}