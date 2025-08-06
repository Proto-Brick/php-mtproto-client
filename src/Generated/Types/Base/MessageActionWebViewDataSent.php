<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionWebViewDataSent
 */
final class MessageActionWebViewDataSent extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xb4c38cb5;
    
    public string $_ = 'messageActionWebViewDataSent';
    
    /**
     * @param string $text
     */
    public function __construct(
        public readonly string $text
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->text);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $text = $deserializer->bytes($stream);
        return new self(
            $text
        );
    }
}