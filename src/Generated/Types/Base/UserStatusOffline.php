<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/userStatusOffline
 */
final class UserStatusOffline extends AbstractUserStatus
{
    public const CONSTRUCTOR_ID = 9203775;
    
    public string $_ = 'userStatusOffline';
    
    /**
     * @param int $wasOnline
     */
    public function __construct(
        public readonly int $wasOnline
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->wasOnline);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $wasOnline = $deserializer->int32($stream);
            return new self(
            $wasOnline
        );
    }
}