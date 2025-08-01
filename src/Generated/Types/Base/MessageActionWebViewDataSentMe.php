<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionWebViewDataSentMe
 */
final class MessageActionWebViewDataSentMe extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 1205698681;
    
    public string $_ = 'messageActionWebViewDataSentMe';
    
    /**
     * @param string $text
     * @param string $data
     */
    public function __construct(
        public readonly string $text,
        public readonly string $data
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->text);
        $buffer .= $serializer->bytes($this->data);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $text = $deserializer->bytes($stream);
        $data = $deserializer->bytes($stream);
            return new self(
            $text,
            $data
        );
    }
}