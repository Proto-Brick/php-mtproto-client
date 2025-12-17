<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\SponsoredMessageReportOption;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $title = Deserializer::bytes($__payload, $__offset);
        $options = Deserializer::vectorOfObjects($__payload, $__offset, [SponsoredMessageReportOption::class, 'deserialize']);

        return new self(
            $title,
            $options
        );
    }
}