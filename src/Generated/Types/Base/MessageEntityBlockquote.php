<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageEntityBlockquote
 */
final class MessageEntityBlockquote extends AbstractMessageEntity
{
    public const CONSTRUCTOR_ID = 0xf1ccaaac;
    
    public string $_ = 'messageEntityBlockquote';
    
    /**
     * @param int $offset
     * @param int $length
     * @param bool|null $collapsed
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $length,
        public readonly ?bool $collapsed = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->collapsed) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->length);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $collapsed = ($flags & (1 << 0)) ? true : null;
        $offset = Deserializer::int32($stream);
        $length = Deserializer::int32($stream);
        return new self(
            $offset,
            $length,
            $collapsed
        );
    }
}