<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBotInlineMessageGame
 */
final class InputBotInlineMessageGame extends AbstractInputBotInlineMessage
{
    public const CONSTRUCTOR_ID = 0x4b425864;
    
    public string $predicate = 'inputBotInlineMessageGame';
    
    /**
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly ?AbstractReplyMarkup $replyMarkup = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->replyMarkup !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $replyMarkup = ($flags & (1 << 2)) ? AbstractReplyMarkup::deserialize($stream) : null;

        return new self(
            $replyMarkup
        );
    }
}