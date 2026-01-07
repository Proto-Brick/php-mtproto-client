<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/reportResultChooseOption
 */
final class ReportResultChooseOption extends AbstractReportResult
{
    public const CONSTRUCTOR_ID = 0xf0e4e0b6;
    
    public string $predicate = 'reportResultChooseOption';
    
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $title = Deserializer::bytes($__payload, $__offset);
        $options = Deserializer::vectorOfObjects($__payload, $__offset, [MessageReportOption::class, 'deserialize']);

        return new self(
            $title,
            $options
        );
    }
}