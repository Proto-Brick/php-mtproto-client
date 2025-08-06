<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/PageBlock
 */
abstract class AbstractPageBlock extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            PageBlockUnsupported::CONSTRUCTOR_ID => PageBlockUnsupported::deserialize($deserializer, $stream),
            PageBlockTitle::CONSTRUCTOR_ID => PageBlockTitle::deserialize($deserializer, $stream),
            PageBlockSubtitle::CONSTRUCTOR_ID => PageBlockSubtitle::deserialize($deserializer, $stream),
            PageBlockAuthorDate::CONSTRUCTOR_ID => PageBlockAuthorDate::deserialize($deserializer, $stream),
            PageBlockHeader::CONSTRUCTOR_ID => PageBlockHeader::deserialize($deserializer, $stream),
            PageBlockSubheader::CONSTRUCTOR_ID => PageBlockSubheader::deserialize($deserializer, $stream),
            PageBlockParagraph::CONSTRUCTOR_ID => PageBlockParagraph::deserialize($deserializer, $stream),
            PageBlockPreformatted::CONSTRUCTOR_ID => PageBlockPreformatted::deserialize($deserializer, $stream),
            PageBlockFooter::CONSTRUCTOR_ID => PageBlockFooter::deserialize($deserializer, $stream),
            PageBlockDivider::CONSTRUCTOR_ID => PageBlockDivider::deserialize($deserializer, $stream),
            PageBlockAnchor::CONSTRUCTOR_ID => PageBlockAnchor::deserialize($deserializer, $stream),
            PageBlockList::CONSTRUCTOR_ID => PageBlockList::deserialize($deserializer, $stream),
            PageBlockBlockquote::CONSTRUCTOR_ID => PageBlockBlockquote::deserialize($deserializer, $stream),
            PageBlockPullquote::CONSTRUCTOR_ID => PageBlockPullquote::deserialize($deserializer, $stream),
            PageBlockPhoto::CONSTRUCTOR_ID => PageBlockPhoto::deserialize($deserializer, $stream),
            PageBlockVideo::CONSTRUCTOR_ID => PageBlockVideo::deserialize($deserializer, $stream),
            PageBlockCover::CONSTRUCTOR_ID => PageBlockCover::deserialize($deserializer, $stream),
            PageBlockEmbed::CONSTRUCTOR_ID => PageBlockEmbed::deserialize($deserializer, $stream),
            PageBlockEmbedPost::CONSTRUCTOR_ID => PageBlockEmbedPost::deserialize($deserializer, $stream),
            PageBlockCollage::CONSTRUCTOR_ID => PageBlockCollage::deserialize($deserializer, $stream),
            PageBlockSlideshow::CONSTRUCTOR_ID => PageBlockSlideshow::deserialize($deserializer, $stream),
            PageBlockChannel::CONSTRUCTOR_ID => PageBlockChannel::deserialize($deserializer, $stream),
            PageBlockAudio::CONSTRUCTOR_ID => PageBlockAudio::deserialize($deserializer, $stream),
            PageBlockKicker::CONSTRUCTOR_ID => PageBlockKicker::deserialize($deserializer, $stream),
            PageBlockTable::CONSTRUCTOR_ID => PageBlockTable::deserialize($deserializer, $stream),
            PageBlockOrderedList::CONSTRUCTOR_ID => PageBlockOrderedList::deserialize($deserializer, $stream),
            PageBlockDetails::CONSTRUCTOR_ID => PageBlockDetails::deserialize($deserializer, $stream),
            PageBlockRelatedArticles::CONSTRUCTOR_ID => PageBlockRelatedArticles::deserialize($deserializer, $stream),
            PageBlockMap::CONSTRUCTOR_ID => PageBlockMap::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type PageBlock. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}