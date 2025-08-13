<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputEmojiStatusCollectible
 */
final class InputEmojiStatusCollectible extends AbstractEmojiStatus
{
    public const CONSTRUCTOR_ID = 0x7141dbf;
    
    public string $predicate = 'inputEmojiStatusCollectible';
    
    /**
     * @param int $collectibleId
     * @param int|null $until
     */
    public function __construct(
        public readonly int $collectibleId,
        public readonly ?int $until = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->until !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->collectibleId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->until);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $collectibleId = Deserializer::int64($stream);
        $until = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;

        return new self(
            $collectibleId,
            $until
        );
    }
}