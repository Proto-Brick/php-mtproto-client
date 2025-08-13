<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Contracts\TlObjectInterface;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use RuntimeException;
use ValueError;

/**
 * @see https://core.telegram.org/type/ReportReason
 */
enum ReportReason: int implements TlObjectInterface
{
    case InputReportReasonSpam = 0x58dbcab8;
    case InputReportReasonViolence = 0x1e22c78d;
    case InputReportReasonPornography = 0x2e59d922;
    case InputReportReasonChildAbuse = 0xadf44ee3;
    case InputReportReasonOther = 0xc1e4a2b1;
    case InputReportReasonCopyright = 0x9b89f93a;
    case InputReportReasonGeoIrrelevant = 0xdbd4feed;
    case InputReportReasonFake = 0xf5ddd6e7;
    case InputReportReasonIllegalDrugs = 0xa8eb2be;
    case InputReportReasonPersonalDetails = 0x9ec7863d;

    public function serialize(): string
    {
        return Serializer::int32($this->value);
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        try {
            return self::from($constructorId);
        } catch (ValueError $e) {
            throw new RuntimeException(sprintf(
                'Unknown constructor ID for enum %s. Received ID: 0x%s (signed: %d)',
                self::class,
                dechex(unpack('V', pack('l', $constructorId))[1]),
                $constructorId
            ), 0, $e);
        }
    }
    
    public function getConstructorId(): int
    {
        return $this->value;
    }
    
    public function getPredicate(): string
    {
        return match($this) {
            self::InputReportReasonSpam => 'inputReportReasonSpam',
            self::InputReportReasonViolence => 'inputReportReasonViolence',
            self::InputReportReasonPornography => 'inputReportReasonPornography',
            self::InputReportReasonChildAbuse => 'inputReportReasonChildAbuse',
            self::InputReportReasonOther => 'inputReportReasonOther',
            self::InputReportReasonCopyright => 'inputReportReasonCopyright',
            self::InputReportReasonGeoIrrelevant => 'inputReportReasonGeoIrrelevant',
            self::InputReportReasonFake => 'inputReportReasonFake',
            self::InputReportReasonIllegalDrugs => 'inputReportReasonIllegalDrugs',
            self::InputReportReasonPersonalDetails => 'inputReportReasonPersonalDetails',
        };
    }
}