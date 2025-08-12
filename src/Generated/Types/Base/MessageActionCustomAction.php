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
    public const CONSTRUCTOR_ID = 0xfae69f56;
    
    public string $predicate = 'messageActionCustomAction';
    
    /**
     * @param string $message
     */
    public function __construct(
        public readonly string $message
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->message);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $message = Deserializer::bytes($stream);

        return new self(
            $message
        );
    }
}