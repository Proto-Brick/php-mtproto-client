<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/inputBusinessIntro
 */
final class InputBusinessIntro extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9c469cd;
    
    public string $predicate = 'inputBusinessIntro';
    
    /**
     * @param string $title
     * @param string $description
     * @param AbstractInputDocument|null $sticker
     */
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly ?AbstractInputDocument $sticker = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->sticker !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->description);
        if ($flags & (1 << 0)) {
            $buffer .= $this->sticker->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $title = Deserializer::bytes($stream);
        $description = Deserializer::bytes($stream);
        $sticker = (($flags & (1 << 0)) !== 0) ? AbstractInputDocument::deserialize($stream) : null;

        return new self(
            $title,
            $description,
            $sticker
        );
    }
}