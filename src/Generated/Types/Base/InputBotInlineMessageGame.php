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
    public const CONSTRUCTOR_ID = 1262639204;
    
    public string $_ = 'inputBotInlineMessageGame';
    
    /**
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly ?AbstractReplyMarkup $replyMarkup = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->replyMarkup !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $replyMarkup = ($flags & (1 << 2)) ? AbstractReplyMarkup::deserialize($deserializer, $stream) : null;
            return new self(
            $replyMarkup
        );
    }
}