<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Contacts\ContactBirthdays;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.getBirthdays
 */
final class GetBirthdaysRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdaeda864;
    
    public string $_ = 'contacts.getBirthdays';
    
    public function getMethodName(): string
    {
        return 'contacts.getBirthdays';
    }
    
    public function getResponseClass(): string
    {
        return ContactBirthdays::class;
    }
    public function __construct() {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}