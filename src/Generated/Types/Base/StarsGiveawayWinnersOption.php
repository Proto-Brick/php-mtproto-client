<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starsGiveawayWinnersOption
 */
final class StarsGiveawayWinnersOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0x54236209;
    
    public string $_ = 'starsGiveawayWinnersOption';
    
    /**
     * @param int $users
     * @param int $perUserStars
     * @param bool|null $default_
     */
    public function __construct(
        public readonly int $users,
        public readonly int $perUserStars,
        public readonly ?bool $default_ = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->default_) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->users);
        $buffer .= $serializer->int64($this->perUserStars);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $default_ = ($flags & (1 << 0)) ? true : null;
        $users = $deserializer->int32($stream);
        $perUserStars = $deserializer->int64($stream);
        return new self(
            $users,
            $perUserStars,
            $default_
        );
    }
}