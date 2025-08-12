<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/businessIntro
 */
final class BusinessIntro extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5a0a066d;
    
    public string $predicate = 'businessIntro';
    
    /**
     * @param string $title
     * @param string $description
     * @param AbstractDocument|null $sticker
     */
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly ?AbstractDocument $sticker = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->sticker !== null) $flags |= (1 << 0);
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
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $title = Deserializer::bytes($stream);
        $description = Deserializer::bytes($stream);
        $sticker = ($flags & (1 << 0)) ? AbstractDocument::deserialize($stream) : null;

        return new self(
            $title,
            $description,
            $sticker
        );
    }
}