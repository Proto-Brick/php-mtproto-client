<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/replyInlineMarkup
 */
final class ReplyInlineMarkup extends AbstractReplyMarkup
{
    public const CONSTRUCTOR_ID = 0x48a30254;
    
    public string $_ = 'replyInlineMarkup';
    
    /**
     * @param list<KeyboardButtonRow> $rows
     */
    public function __construct(
        public readonly array $rows
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->rows);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $rows = $deserializer->vectorOfObjects($stream, [KeyboardButtonRow::class, 'deserialize']);
        return new self(
            $rows
        );
    }
}