<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/textConcat
 */
final class TextConcat extends AbstractRichText
{
    public const CONSTRUCTOR_ID = 0x7e6260d7;
    
    public string $_ = 'textConcat';
    
    /**
     * @param list<AbstractRichText> $texts
     */
    public function __construct(
        public readonly array $texts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->texts);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $texts = Deserializer::vectorOfObjects($stream, [AbstractRichText::class, 'deserialize']);
        return new self(
            $texts
        );
    }
}