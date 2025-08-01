<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionCustomAction
 */
final class MessageActionCustomAction extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 4209418070;
    
    public string $_ = 'messageActionCustomAction';
    
    /**
     * @param string $message
     */
    public function __construct(
        public readonly string $message
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->message);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $message = $deserializer->bytes($stream);
            return new self(
            $message
        );
    }
}