<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBusinessIntro
 */
final class InputBusinessIntro extends AbstractInputBusinessIntro
{
    public const CONSTRUCTOR_ID = 163867085;
    
    public string $_ = 'inputBusinessIntro';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->sticker !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->bytes($this->description);
        if ($flags & (1 << 0)) {
            $buffer .= $this->sticker->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $title = $deserializer->bytes($stream);
        $description = $deserializer->bytes($stream);
        $sticker = ($flags & (1 << 0)) ? AbstractInputDocument::deserialize($deserializer, $stream) : null;
            return new self(
            $title,
            $description,
            $sticker
        );
    }
}