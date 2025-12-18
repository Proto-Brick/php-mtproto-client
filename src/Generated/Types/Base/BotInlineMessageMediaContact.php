<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/botInlineMessageMediaContact
 */
final class BotInlineMessageMediaContact extends AbstractBotInlineMessage
{
    public const CONSTRUCTOR_ID = 0x18d1cdc2;
    
    public string $predicate = 'botInlineMessageMediaContact';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->replyMarkup !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::bytes($this->firstName);
        $buffer .= Serializer::bytes($this->lastName);
        $buffer .= Serializer::bytes($this->vcard);
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $phoneNumber = Deserializer::bytes($__payload, $__offset);
        $firstName = Deserializer::bytes($__payload, $__offset);
        $lastName = Deserializer::bytes($__payload, $__offset);
        $vcard = Deserializer::bytes($__payload, $__offset);
        $replyMarkup = (($flags & (1 << 2)) !== 0) ? AbstractReplyMarkup::deserialize($__payload, $__offset) : null;

        return new self(
            $phoneNumber,
            $firstName,
            $lastName,
            $vcard,
            $replyMarkup
        );
    }
}