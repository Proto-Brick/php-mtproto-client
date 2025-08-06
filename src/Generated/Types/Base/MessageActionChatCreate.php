<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionChatCreate
 */
final class MessageActionChatCreate extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xbd47cbad;
    
    public string $_ = 'messageActionChatCreate';
    
    /**
     * @param string $title
     * @param list<int> $users
     */
    public function __construct(
        public readonly string $title,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->vectorOfLongs($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $title = $deserializer->bytes($stream);
        $users = $deserializer->vectorOfLongs($stream);
        return new self(
            $title,
            $users
        );
    }
}