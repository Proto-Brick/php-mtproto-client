<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/webViewMessageSent
 */
final class WebViewMessageSent extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc94511c;
    
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $msgId = ($flags & (1 << 0)) ? AbstractInputBotInlineMessageID::deserialize($deserializer, $stream) : null;
        return new self(
            $msgId
        );
    }
}