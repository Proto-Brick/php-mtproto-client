<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/webViewMessageSent
 */
final class WebViewMessageSent extends AbstractWebViewMessageSent
{
    public const CONSTRUCTOR_ID = 211046684;
    
    public string $_ = 'webViewMessageSent';
    
    /**
     * @param AbstractInputBotInlineMessageID|null $msgId
     */
    public function __construct(
        public readonly ?AbstractInputBotInlineMessageID $msgId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->msgId !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->msgId->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $msgId = ($flags & (1 << 0)) ? AbstractInputBotInlineMessageID::deserialize($deserializer, $stream) : null;
            return new self(
            $msgId
        );
    }
}