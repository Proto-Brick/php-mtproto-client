<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/PageBlock
 */
abstract class AbstractPageBlock extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            PageBlockUnsupported::CONSTRUCTOR_ID => PageBlockUnsupported::deserialize($stream),
            PageBlockTitle::CONSTRUCTOR_ID => PageBlockTitle::deserialize($stream),
            PageBlockSubtitle::CONSTRUCTOR_ID => PageBlockSubtitle::deserialize($stream),
            PageBlockAuthorDate::CONSTRUCTOR_ID => PageBlockAuthorDate::deserialize($stream),
            PageBlockHeader::CONSTRUCTOR_ID => PageBlockHeader::deserialize($stream),
            PageBlockSubheader::CONSTRUCTOR_ID => PageBlockSubheader::deserialize($stream),
            PageBlockParagraph::CONSTRUCTOR_ID => PageBlockParagraph::deserialize($stream),
            PageBlockPreformatted::CONSTRUCTOR_ID => PageBlockPreformatted::deserialize($stream),
            PageBlockFooter::CONSTRUCTOR_ID => PageBlockFooter::deserialize($stream),
            PageBlockDivider::CONSTRUCTOR_ID => PageBlockDivider::deserialize($stream),
            PageBlockAnchor::CONSTRUCTOR_ID => PageBlockAnchor::deserialize($stream),
            PageBlockList::CONSTRUCTOR_ID => PageBlockList::deserialize($stream),
            PageBlockBlockquote::CONSTRUCTOR_ID => PageBlockBlockquote::deserialize($stream),
            PageBlockPullquote::CONSTRUCTOR_ID => PageBlockPullquote::deserialize($stream),
            PageBlockPhoto::CONSTRUCTOR_ID => PageBlockPhoto::deserialize($stream),
            PageBlockVideo::CONSTRUCTOR_ID => PageBlockVideo::deserialize($stream),
            PageBlockCover::CONSTRUCTOR_ID => PageBlockCover::deserialize($stream),
            PageBlockEmbed::CONSTRUCTOR_ID => PageBlockEmbed::deserialize($stream),
            PageBlockEmbedPost::CONSTRUCTOR_ID => PageBlockEmbedPost::deserialize($stream),
            PageBlockCollage::CONSTRUCTOR_ID => PageBlockCollage::deserialize($stream),
            PageBlockSlideshow::CONSTRUCTOR_ID => PageBlockSlideshow::deserialize($stream),
            PageBlockChannel::CONSTRUCTOR_ID => PageBlockChannel::deserialize($stream),
            PageBlockAudio::CONSTRUCTOR_ID => PageBlockAudio::deserialize($stream),
            PageBlockKicker::CONSTRUCTOR_ID => PageBlockKicker::deserialize($stream),
            PageBlockTable::CONSTRUCTOR_ID => PageBlockTable::deserialize($stream),
            PageBlockOrderedList::CONSTRUCTOR_ID => PageBlockOrderedList::deserialize($stream),
            PageBlockDetails::CONSTRUCTOR_ID => PageBlockDetails::deserialize($stream),
            PageBlockRelatedArticles::CONSTRUCTOR_ID => PageBlockRelatedArticles::deserialize($stream),
            PageBlockMap::CONSTRUCTOR_ID => PageBlockMap::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type PageBlock. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}