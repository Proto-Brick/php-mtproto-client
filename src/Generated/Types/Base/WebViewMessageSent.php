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
    
    public string $predicate = 'webViewMessageSent';
    
    /**
     * @param AbstractInputBotInlineMessageID|null $msgId
     */
    public function __construct(
        public readonly ?AbstractInputBotInlineMessageID $msgId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->msgId !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->msgId->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $msgId = ($flags & (1 << 0)) ? AbstractInputBotInlineMessageID::deserialize($stream) : null;

        return new self(
            $msgId
        );
    }
}