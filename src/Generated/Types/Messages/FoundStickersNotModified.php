<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.foundStickersNotModified
 */
final class FoundStickersNotModified extends AbstractFoundStickers
{
    public const CONSTRUCTOR_ID = 0x6010c534;
    
    public string $_ = 'messages.foundStickersNotModified';
    
    /**
     * @param int|null $nextOffset
     */
    public function __construct(
        public readonly ?int $nextOffset = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nextOffset !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->nextOffset);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $nextOffset = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        return new self(
            $nextOffset
        );
    }
}