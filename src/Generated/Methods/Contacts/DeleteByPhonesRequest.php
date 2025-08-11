<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.deleteByPhones
 */
final class DeleteByPhonesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1013fd9e;
    
    public string $_ = 'contacts.deleteByPhones';
    
    public function getMethodName(): string
    {
        return 'contacts.deleteByPhones';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<string> $phones
     */
    public function __construct(
        public readonly array $phones
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfStrings($this->phones);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}