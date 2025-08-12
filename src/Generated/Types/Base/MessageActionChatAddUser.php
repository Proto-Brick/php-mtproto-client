<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionChatAddUser
 */
final class MessageActionChatAddUser extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x15cefd00;
    
    public string $predicate = 'messageActionChatAddUser';
    
    /**
     * @param list<int> $users
     */
    public function __construct(
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfLongs($this->users);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $users = Deserializer::vectorOfLongs($stream);

        return new self(
            $users
        );
    }
}