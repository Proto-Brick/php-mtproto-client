<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/ReportReason
 */
abstract class AbstractReportReason extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            InputReportReasonSpam::CONSTRUCTOR_ID => InputReportReasonSpam::deserialize($stream),
            InputReportReasonViolence::CONSTRUCTOR_ID => InputReportReasonViolence::deserialize($stream),
            InputReportReasonPornography::CONSTRUCTOR_ID => InputReportReasonPornography::deserialize($stream),
            InputReportReasonChildAbuse::CONSTRUCTOR_ID => InputReportReasonChildAbuse::deserialize($stream),
            InputReportReasonOther::CONSTRUCTOR_ID => InputReportReasonOther::deserialize($stream),
            InputReportReasonCopyright::CONSTRUCTOR_ID => InputReportReasonCopyright::deserialize($stream),
            InputReportReasonGeoIrrelevant::CONSTRUCTOR_ID => InputReportReasonGeoIrrelevant::deserialize($stream),
            InputReportReasonFake::CONSTRUCTOR_ID => InputReportReasonFake::deserialize($stream),
            InputReportReasonIllegalDrugs::CONSTRUCTOR_ID => InputReportReasonIllegalDrugs::deserialize($stream),
            InputReportReasonPersonalDetails::CONSTRUCTOR_ID => InputReportReasonPersonalDetails::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type ReportReason. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}