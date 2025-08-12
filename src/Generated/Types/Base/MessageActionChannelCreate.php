<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionChannelCreate
 */
final class MessageActionChannelCreate extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x95d2ac92;
    
    public string $predicate = 'messageActionChannelCreate';
    
    /**
     * @param string $title
     */
    public function __construct(
        public readonly string $title
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->title);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $title = Deserializer::bytes($stream);

        return new self(
            $title
        );
    }
}