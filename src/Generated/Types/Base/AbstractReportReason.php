<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/ReportReason
 */
abstract class AbstractReportReason extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            InputReportReasonSpam::CONSTRUCTOR_ID => InputReportReasonSpam::deserialize($deserializer, $stream),
            InputReportReasonViolence::CONSTRUCTOR_ID => InputReportReasonViolence::deserialize($deserializer, $stream),
            InputReportReasonPornography::CONSTRUCTOR_ID => InputReportReasonPornography::deserialize($deserializer, $stream),
            InputReportReasonChildAbuse::CONSTRUCTOR_ID => InputReportReasonChildAbuse::deserialize($deserializer, $stream),
            InputReportReasonOther::CONSTRUCTOR_ID => InputReportReasonOther::deserialize($deserializer, $stream),
            InputReportReasonCopyright::CONSTRUCTOR_ID => InputReportReasonCopyright::deserialize($deserializer, $stream),
            InputReportReasonGeoIrrelevant::CONSTRUCTOR_ID => InputReportReasonGeoIrrelevant::deserialize($deserializer, $stream),
            InputReportReasonFake::CONSTRUCTOR_ID => InputReportReasonFake::deserialize($deserializer, $stream),
            InputReportReasonIllegalDrugs::CONSTRUCTOR_ID => InputReportReasonIllegalDrugs::deserialize($deserializer, $stream),
            InputReportReasonPersonalDetails::CONSTRUCTOR_ID => InputReportReasonPersonalDetails::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type ReportReason: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}