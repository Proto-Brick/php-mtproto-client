<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/autoSaveSettings
 */
final class AutoSaveSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc84834ce;
    
    public string $predicate = 'autoSaveSettings';
    
    /**
     * @param true|null $photos
     * @param true|null $videos
     * @param int|null $videoMaxSize
     */
    public function __construct(
        public readonly ?true $photos = null,
        public readonly ?true $videos = null,
        public readonly ?int $videoMaxSize = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->photos) {
            $flags |= (1 << 0);
        }
        if ($this->videos) {
            $flags |= (1 << 1);
        }
        if ($this->videoMaxSize !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int64($this->videoMaxSize);
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
        $photos = (($flags & (1 << 0)) !== 0) ? true : null;
        $videos = (($flags & (1 << 1)) !== 0) ? true : null;
        $videoMaxSize = (($flags & (1 << 2)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;

        return new self(
            $photos,
            $videos,
            $videoMaxSize
        );
    }
}