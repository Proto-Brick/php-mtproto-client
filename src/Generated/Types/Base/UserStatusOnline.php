<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/userStatusOnline
 */
final class UserStatusOnline extends AbstractUserStatus
{
    public const CONSTRUCTOR_ID = 3988339017;
    
    public string $_ = 'userStatusOnline';
    
    /**
     * @param int $expires
     */
    public function __construct(
        public readonly int $expires
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->expires);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $expires = $deserializer->int32($stream);
            return new self(
            $expires
        );
    }
}