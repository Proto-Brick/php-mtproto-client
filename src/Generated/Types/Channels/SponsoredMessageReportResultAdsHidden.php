<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Channels;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channels.sponsoredMessageReportResultAdsHidden
 */
final class SponsoredMessageReportResultAdsHidden extends AbstractSponsoredMessageReportResult
{
    public const CONSTRUCTOR_ID = 0x3e3bcf2f;
    
    public string $_ = 'channels.sponsoredMessageReportResultAdsHidden';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.

        return new self();
    }
}