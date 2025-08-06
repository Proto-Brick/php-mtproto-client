<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/sponsoredMessageReportOption
 */
final class SponsoredMessageReportOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0x430d3150;
    
    public string $_ = 'sponsoredMessageReportOption';
    
    /**
     * @param string $text
     * @param string $option
     */
    public function __construct(
        public readonly string $text,
        public readonly string $option
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->text);
        $buffer .= $serializer->bytes($this->option);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $text = $deserializer->bytes($stream);
        $option = $deserializer->bytes($stream);
        return new self(
            $text,
            $option
        );
    }
}