<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/userStatusLastWeek
 */
final class UserStatusLastWeek extends AbstractUserStatus
{
    public const CONSTRUCTOR_ID = 0x541a1d1a;
    
    public string $_ = 'userStatusLastWeek';
    
    /**
     * @param bool|null $byMe
     */
    public function __construct(
        public readonly ?bool $byMe = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->byMe) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $byMe = ($flags & (1 << 0)) ? true : null;
        return new self(
            $byMe
        );
    }
}