<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractWallPaper;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $hash = Deserializer::int64($__payload, $__offset);
        $wallpapers = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractWallPaper::class, 'deserialize']);

        return new self(
            $hash,
            $wallpapers
        );
    }
}