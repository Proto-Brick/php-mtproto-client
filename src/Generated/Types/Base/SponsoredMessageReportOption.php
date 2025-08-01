<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/sponsoredMessageReportOption
 */
final class SponsoredMessageReportOption extends AbstractSponsoredMessageReportOption
{
    public const CONSTRUCTOR_ID = 1124938064;
    
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
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $text = $deserializer->bytes($stream);
        $option = $deserializer->bytes($stream);
            return new self(
            $text,
            $option
        );
    }
}