<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/userStatusRecently
 */
final class UserStatusRecently extends AbstractUserStatus
{
    public const CONSTRUCTOR_ID = 0x7b197dc8;
    
    public string $predicate = 'userStatusRecently';
    
    /**
     * @param true|null $byMe
     */
    public function __construct(
        public readonly ?true $byMe = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->byMe) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $byMe = ($flags & (1 << 0)) ? true : null;

        return new self(
            $byMe
        );
    }
}