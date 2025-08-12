<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageCaption
 */
final class PageCaption extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6f747657;
    
    public string $predicate = 'pageCaption';
    
    /**
     * @param AbstractRichText $text
     * @param AbstractRichText $credit
     */
    public function __construct(
        public readonly AbstractRichText $text,
        public readonly AbstractRichText $credit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize();
        $buffer .= $this->credit->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $text = AbstractRichText::deserialize($stream);
        $credit = AbstractRichText::deserialize($stream);

        return new self(
            $text,
            $credit
        );
    }
}