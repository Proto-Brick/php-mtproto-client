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
    public const CONSTRUCTOR_ID = 0x95fcd1d6;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->document !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::bytes($this->shortName);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->description);
        $buffer .= $this->photo->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->document->serialize();
        }
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $id = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);
        $shortName = Deserializer::bytes($stream);
        $title = Deserializer::bytes($stream);
        $description = Deserializer::bytes($stream);
        $photo = AbstractPhoto::deserialize($stream);
        $document = ($flags & (1 << 0)) ? AbstractDocument::deserialize($stream) : null;
        $hash = Deserializer::int64($stream);
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