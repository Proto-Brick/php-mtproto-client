<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMediaUploadedPhoto
 */
final class InputMediaUploadedPhoto extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0x1e287d04;
    
    public string $predicate = 'inputMediaUploadedPhoto';
    
    /**
     * @param AbstractInputFile $file
     * @param true|null $spoiler
     * @param list<AbstractInputDocument>|null $stickers
     * @param int|null $ttlSeconds
     */
    public function __construct(
        public readonly AbstractInputFile $file,
        public readonly ?true $spoiler = null,
        public readonly ?array $stickers = null,
        public readonly ?int $ttlSeconds = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->spoiler) {
            $flags |= (1 << 2);
        }
        if ($this->stickers !== null) {
            $flags |= (1 << 0);
        }
        if ($this->ttlSeconds !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->file->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->stickers);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->ttlSeconds);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $spoiler = (($flags & (1 << 2)) !== 0) ? true : null;
        $file = AbstractInputFile::deserialize($__payload, $__offset);
        $stickers = (($flags & (1 << 0)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractInputDocument::class, 'deserialize']) : null;
        $ttlSeconds = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $file,
            $spoiler,
            $stickers,
            $ttlSeconds
        );
    }
}