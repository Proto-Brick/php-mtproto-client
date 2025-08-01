<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSponsoredMessageReportOption;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channels.sponsoredMessageReportResultChooseOption
 */
final class SponsoredMessageReportResultChooseOption extends AbstractSponsoredMessageReportResult
{
    public const CONSTRUCTOR_ID = 2221907522;
    
    public string $_ = 'channels.sponsoredMessageReportResultChooseOption';
    
    /**
     * @param string $title
     * @param list<AbstractSponsoredMessageReportOption> $options
     */
    public function __construct(
        public readonly string $title,
        public readonly array $options
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->vectorOfObjects($this->options);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $title = $deserializer->bytes($stream);
        $options = $deserializer->vectorOfObjects($stream, [AbstractSponsoredMessageReportOption::class, 'deserialize']);
            return new self(
            $title,
            $options
        );
    }
}