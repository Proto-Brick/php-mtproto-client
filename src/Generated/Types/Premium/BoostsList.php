<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Premium;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBoost;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/premium.boostsList
 */
final class BoostsList extends AbstractBoostsList
{
    public const CONSTRUCTOR_ID = 2264424764;
    
    public string $_ = 'premium.boostsList';
    
    /**
     * @param int $count
     * @param list<AbstractBoost> $boosts
     * @param list<AbstractUser> $users
     * @param string|null $nextOffset
     */
    public function __construct(
        public readonly int $count,
        public readonly array $boosts,
        public readonly array $users,
        public readonly ?string $nextOffset = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nextOffset !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->count);
        $buffer .= $serializer->vectorOfObjects($this->boosts);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->nextOffset);
        }
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $count = $deserializer->int32($stream);
        $boosts = $deserializer->vectorOfObjects($stream, [AbstractBoost::class, 'deserialize']);
        $nextOffset = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
            return new self(
            $count,
            $boosts,
            $users,
            $nextOffset
        );
    }
}