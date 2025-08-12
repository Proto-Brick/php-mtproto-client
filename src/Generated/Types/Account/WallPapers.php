<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWallPaper;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.wallPapers
 */
final class WallPapers extends AbstractWallPapers
{
    public const CONSTRUCTOR_ID = 0xcdc3858c;
    
    public string $predicate = 'account.wallPapers';
    
    /**
     * @param int $hash
     * @param list<AbstractWallPaper> $wallpapers
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $wallpapers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->wallpapers);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $hash = Deserializer::int64($stream);
        $wallpapers = Deserializer::vectorOfObjects($stream, [AbstractWallPaper::class, 'deserialize']);

        return new self(
            $hash,
            $wallpapers
        );
    }
}