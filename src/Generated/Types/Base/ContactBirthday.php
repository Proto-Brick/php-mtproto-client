<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/contactBirthday
 */
final class ContactBirthday extends AbstractContactBirthday
{
    public const CONSTRUCTOR_ID = 496600883;
    
    public string $_ = 'contactBirthday';
    
    /**
     * @param int $contactId
     * @param AbstractBirthday $birthday
     */
    public function __construct(
        public readonly int $contactId,
        public readonly AbstractBirthday $birthday
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->contactId);
        $buffer .= $this->birthday->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $contactId = $deserializer->int64($stream);
        $birthday = AbstractBirthday::deserialize($deserializer, $stream);
            return new self(
            $contactId,
            $birthday
        );
    }
}