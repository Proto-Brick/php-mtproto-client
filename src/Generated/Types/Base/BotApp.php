<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/botApp
 */
final class BotApp extends AbstractBotApp
{
    public const CONSTRUCTOR_ID = 2516373974;
    
    public string $_ = 'botApp';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $shortName
     * @param string $title
     * @param string $description
     * @param AbstractPhoto $photo
     * @param int $hash
     * @param AbstractDocument|null $document
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $shortName,
        public readonly string $title,
        public readonly string $description,
        public readonly AbstractPhoto $photo,
        public readonly int $hash,
        public readonly ?AbstractDocument $document = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->document !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int64($this->accessHash);
        $buffer .= $serializer->bytes($this->shortName);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->bytes($this->description);
        $buffer .= $this->photo->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $this->document->serialize($serializer);
        }
        $buffer .= $serializer->int64($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $id = $deserializer->int64($stream);
        $accessHash = $deserializer->int64($stream);
        $shortName = $deserializer->bytes($stream);
        $title = $deserializer->bytes($stream);
        $description = $deserializer->bytes($stream);
        $photo = AbstractPhoto::deserialize($deserializer, $stream);
        $document = ($flags & (1 << 0)) ? AbstractDocument::deserialize($deserializer, $stream) : null;
        $hash = $deserializer->int64($stream);
            return new self(
            $id,
            $accessHash,
            $shortName,
            $title,
            $description,
            $photo,
            $hash,
            $document
        );
    }
}