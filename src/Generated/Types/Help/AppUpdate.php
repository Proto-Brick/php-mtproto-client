<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.appUpdate
 */
final class AppUpdate extends AbstractAppUpdate
{
    public const CONSTRUCTOR_ID = 0xccbbce30;
    
    public string $_ = 'help.appUpdate';
    
    /**
     * @param int $id
     * @param string $version
     * @param string $text
     * @param list<AbstractMessageEntity> $entities
     * @param bool|null $canNotSkip
     * @param AbstractDocument|null $document
     * @param string|null $url
     * @param AbstractDocument|null $sticker
     */
    public function __construct(
        public readonly int $id,
        public readonly string $version,
        public readonly string $text,
        public readonly array $entities,
        public readonly ?bool $canNotSkip = null,
        public readonly ?AbstractDocument $document = null,
        public readonly ?string $url = null,
        public readonly ?AbstractDocument $sticker = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canNotSkip) $flags |= (1 << 0);
        if ($this->document !== null) $flags |= (1 << 1);
        if ($this->url !== null) $flags |= (1 << 2);
        if ($this->sticker !== null) $flags |= (1 << 3);
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $canNotSkip = ($flags & (1 << 0)) ? true : null;
        $id = Deserializer::int32($stream);
        $version = Deserializer::bytes($stream);
        $text = Deserializer::bytes($stream);
        $entities = Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']);
        $document = ($flags & (1 << 1)) ? AbstractDocument::deserialize($stream) : null;
        $url = ($flags & (1 << 2)) ? Deserializer::bytes($stream) : null;
        $sticker = ($flags & (1 << 3)) ? AbstractDocument::deserialize($stream) : null;
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