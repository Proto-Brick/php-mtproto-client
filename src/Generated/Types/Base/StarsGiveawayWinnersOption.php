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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->default_) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->users);
        $buffer .= Serializer::int64($this->perUserStars);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $default_ = ($flags & (1 << 0)) ? true : null;
        $users = Deserializer::int32($stream);
        $perUserStars = Deserializer::int64($stream);
        return new self(
            $users,
            $perUserStars,
            $default_
        );
    }
}