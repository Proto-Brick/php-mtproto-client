<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starGiftCollection
 */
final class StarGiftCollection extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9d6b13b0;
    
    public string $predicate = 'starGiftCollection';
    
    /**
     * @param int $collectionId
     * @param string $title
     * @param int $giftsCount
     * @param int $hash
     * @param AbstractDocument|null $icon
     */
    public function __construct(
        public readonly int $collectionId,
        public readonly string $title,
        public readonly int $giftsCount,
        public readonly int $hash,
        public readonly ?AbstractDocument $icon = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->icon !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->collectionId);
        $buffer .= Serializer::bytes($this->title);
        if ($flags & (1 << 0)) {
            $buffer .= $this->icon->serialize();
        }
        $buffer .= Serializer::int32($this->giftsCount);
        $buffer .= Serializer::int64($this->hash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $collectionId = Deserializer::int32($stream);
        $title = Deserializer::bytes($stream);
        $icon = ($flags & (1 << 0)) ? AbstractDocument::deserialize($stream) : null;
        $giftsCount = Deserializer::int32($stream);
        $hash = Deserializer::int64($stream);

        return new self(
            $collectionId,
            $title,
            $giftsCount,
            $hash,
            $icon
        );
    }
}