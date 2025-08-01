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
    public const CONSTRUCTOR_ID = 3434860080;
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canNotSkip) $flags |= (1 << 0);
        if ($this->document !== null) $flags |= (1 << 1);
        if ($this->url !== null) $flags |= (1 << 2);
        if ($this->sticker !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->id);
        $buffer .= $serializer->bytes($this->version);
        $buffer .= $serializer->bytes($this->text);
        $buffer .= $serializer->vectorOfObjects($this->entities);
        if ($flags & (1 << 1)) {
            $buffer .= $this->document->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->url);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->sticker->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $canNotSkip = ($flags & (1 << 0)) ? true : null;
        $id = $deserializer->int32($stream);
        $version = $deserializer->bytes($stream);
        $text = $deserializer->bytes($stream);
        $entities = $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']);
        $document = ($flags & (1 << 1)) ? AbstractDocument::deserialize($deserializer, $stream) : null;
        $url = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        $sticker = ($flags & (1 << 3)) ? AbstractDocument::deserialize($deserializer, $stream) : null;
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