<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/contactBirthday
 */
final class ContactBirthday extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1d998733;
    
    public string $_ = 'contactBirthday';
    
    /**
     * @param int $contactId
     * @param Birthday $birthday
     */
    public function __construct(
        public readonly int $contactId,
        public readonly Birthday $birthday
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $contactId = $deserializer->int64($stream);
        $birthday = Birthday::deserialize($deserializer, $stream);
        return new self(
            $contactId,
            $birthday
        );
    }
}