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
    public const CONSTRUCTOR_ID = 0xedb93949;
    
    public string $_ = 'userStatusOnline';
    
    /**
     * @param int $expires
     */
    public function __construct(
        public readonly int $expires
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->expires);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $expires = Deserializer::int32($stream);
        return new self(
            $expires
        );
    }
}