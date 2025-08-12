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
    
    public string $predicate = 'replyInlineMarkup';
    
    /**
     * @param list<KeyboardButtonRow> $rows
     */
    public function __construct(
        public readonly array $rows
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->rows);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $rows = Deserializer::vectorOfObjects($stream, [KeyboardButtonRow::class, 'deserialize']);

        return new self(
            $rows
        );
    }
}