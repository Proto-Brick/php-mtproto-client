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
    public const CONSTRUCTOR_ID = 2120376535;
    
    public string $_ = 'textConcat';
    
    /**
     * @param list<AbstractRichText> $texts
     */
    public function __construct(
        public readonly array $texts
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->texts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $texts = $deserializer->vectorOfObjects($stream, [AbstractRichText::class, 'deserialize']);
            return new self(
            $texts
        );
    }
}