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
    public const CONSTRUCTOR_ID = 4056722092;
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->collapsed) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->offset);
        $buffer .= $serializer->int32($this->length);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $collapsed = ($flags & (1 << 0)) ? true : null;
        $offset = $deserializer->int32($stream);
        $length = $deserializer->int32($stream);
            return new self(
            $offset,
            $length,
            $collapsed
        );
    }
}