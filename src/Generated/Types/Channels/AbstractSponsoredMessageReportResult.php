<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Channels;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/channels.SponsoredMessageReportResult
 */
abstract class AbstractSponsoredMessageReportResult extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            SponsoredMessageReportResultChooseOption::CONSTRUCTOR_ID => SponsoredMessageReportResultChooseOption::deserialize($deserializer, $stream),
            SponsoredMessageReportResultAdsHidden::CONSTRUCTOR_ID => SponsoredMessageReportResultAdsHidden::deserialize($deserializer, $stream),
            SponsoredMessageReportResultReported::CONSTRUCTOR_ID => SponsoredMessageReportResultReported::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type channels.SponsoredMessageReportResult. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}