<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\SponsoredMessageReportOption;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channels.sponsoredMessageReportResultChooseOption
 */
final class SponsoredMessageReportResultChooseOption extends AbstractSponsoredMessageReportResult
{
    public const CONSTRUCTOR_ID = 0x846f9e42;
    
    public string $predicate = 'channels.sponsoredMessageReportResultChooseOption';
    
    /**
     * @param string $title
     * @param list<SponsoredMessageReportOption> $options
     */
    public function __construct(
        public readonly string $title,
        public readonly array $options
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::vectorOfObjects($this->options);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $title = Deserializer::bytes($stream);
        $options = Deserializer::vectorOfObjects($stream, [SponsoredMessageReportOption::class, 'deserialize']);

        return new self(
            $title,
            $options
        );
    }
}