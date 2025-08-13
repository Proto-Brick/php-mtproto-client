<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Channels;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channels.sponsoredMessageReportResultAdsHidden
 */
final class SponsoredMessageReportResultAdsHidden extends AbstractSponsoredMessageReportResult
{
    public const CONSTRUCTOR_ID = 0x3e3bcf2f;
    
    public string $predicate = 'channels.sponsoredMessageReportResultAdsHidden';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID

        return new self();
    }
}