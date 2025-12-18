<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessageEntity;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/help.appUpdate
 */
final class AppUpdate extends AbstractAppUpdate
{
    public const CONSTRUCTOR_ID = 0xccbbce30;
    
    public string $predicate = 'help.appUpdate';
    
    /**
     * @param int $id
     * @param string $version
     * @param string $text
     * @param list<AbstractMessageEntity> $entities
     * @param true|null $canNotSkip
     * @param AbstractDocument|null $document
     * @param string|null $url
     * @param AbstractDocument|null $sticker
     */
    public function __construct(
        public readonly int $id,
        public readonly string $version,
        public readonly string $text,
        public readonly array $entities,
        public readonly ?true $canNotSkip = null,
        public readonly ?AbstractDocument $document = null,
        public readonly ?string $url = null,
        public readonly ?AbstractDocument $sticker = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canNotSkip) {
            $flags |= (1 << 0);
        }
        if ($this->document !== null) {
            $flags |= (1 << 1);
        }
        if ($this->url !== null) {
            $flags |= (1 << 2);
        }
        if ($this->sticker !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::bytes($this->version);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::vectorOfObjects($this->entities);
        if ($flags & (1 << 1)) {
            $buffer .= $this->document->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->url);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->sticker->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $canNotSkip = (($flags & (1 << 0)) !== 0) ? true : null;
        $id = Deserializer::int32($__payload, $__offset);
        $version = Deserializer::bytes($__payload, $__offset);
        $text = Deserializer::bytes($__payload, $__offset);
        $entities = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessageEntity::class, 'deserialize']);
        $document = (($flags & (1 << 1)) !== 0) ? AbstractDocument::deserialize($__payload, $__offset) : null;
        $url = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $sticker = (($flags & (1 << 3)) !== 0) ? AbstractDocument::deserialize($__payload, $__offset) : null;

        return new self(
            $id,
            $version,
            $text,
            $entities,
            $canNotSkip,
            $document,
            $url,
            $sticker
        );
    }
}