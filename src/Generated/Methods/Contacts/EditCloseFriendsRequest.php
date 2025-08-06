<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.editCloseFriends
 */
final class EditCloseFriendsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xba6705f0;
    
    public string $_ = 'contacts.editCloseFriends';
    
    public function getMethodName(): string
    {
        return 'contacts.editCloseFriends';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<int> $id
     */
    public function __construct(
        public readonly array $id
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfLongs($this->id);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}