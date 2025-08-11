<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/reportResultChooseOption
 */
final class ReportResultChooseOption extends AbstractReportResult
{
    public const CONSTRUCTOR_ID = 0xf0e4e0b6;
    
    public string $_ = 'reportResultChooseOption';
    
    /**
     * @param string $title
     * @param list<MessageReportOption> $options
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
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $title = Deserializer::bytes($stream);
        $options = Deserializer::vectorOfObjects($stream, [MessageReportOption::class, 'deserialize']);
        return new self(
            $title,
            $options
        );
    }
}