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
    
    public string $_ = 'pageCaption';
    
    /**
     * @param AbstractRichText $text
     * @param AbstractRichText $credit
     */
    public function __construct(
        public readonly AbstractRichText $text,
        public readonly AbstractRichText $credit
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize($serializer);
        $buffer .= $this->credit->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $text = AbstractRichText::deserialize($deserializer, $stream);
        $credit = AbstractRichText::deserialize($deserializer, $stream);
        return new self(
            $text,
            $credit
        );
    }
}