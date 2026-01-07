<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/recentStory
 */
final class RecentStory extends TlObject
{
    public const CONSTRUCTOR_ID = 0x711d692d;
    
    public string $predicate = 'recentStory';
    
    /**
     * @param true|null $live
     * @param int|null $maxId
     */
    public function __construct(
        public readonly ?true $live = null,
        public readonly ?int $maxId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->live) {
            $flags |= (1 << 0);
        }
        if ($this->maxId !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->maxId);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $live = (($flags & (1 << 0)) !== 0) ? true : null;
        $maxId = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $live,
            $maxId
        );
    }
}