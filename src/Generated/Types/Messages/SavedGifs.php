<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.savedGifs
 */
final class SavedGifs extends AbstractSavedGifs
{
    public const CONSTRUCTOR_ID = 0x84a02a0d;
    
    public string $_ = 'messages.savedGifs';
    
    /**
     * @param int $hash
     * @param list<AbstractDocument> $gifs
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $gifs
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->gifs);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $hash = Deserializer::int64($stream);
        $gifs = Deserializer::vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
        return new self(
            $hash,
            $gifs
        );
    }
}