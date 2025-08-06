<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/ReportResult
 */
abstract class AbstractReportResult extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            ReportResultChooseOption::CONSTRUCTOR_ID => ReportResultChooseOption::deserialize($deserializer, $stream),
            ReportResultAddComment::CONSTRUCTOR_ID => ReportResultAddComment::deserialize($deserializer, $stream),
            ReportResultReported::CONSTRUCTOR_ID => ReportResultReported::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type ReportResult. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}