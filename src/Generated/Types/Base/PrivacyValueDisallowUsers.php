<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/privacyValueDisallowUsers
 */
final class PrivacyValueDisallowUsers extends AbstractPrivacyRule
{
    public const CONSTRUCTOR_ID = 3831632193;
    
    public string $_ = 'privacyValueDisallowUsers';
    
    /**
     * @param list<int> $users
     */
    public function __construct(
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfLongs($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $users = $deserializer->vectorOfLongs($stream);
            return new self(
            $users
        );
    }
}