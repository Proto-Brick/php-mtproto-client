<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


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
            0x13567e8a => PageBlockUnsupported::deserialize($stream),
            0x70abc3fd => PageBlockTitle::deserialize($stream),
            0x8ffa9a1f => PageBlockSubtitle::deserialize($stream),
            0xbaafe5e0 => PageBlockAuthorDate::deserialize($stream),
            0xbfd064ec => PageBlockHeader::deserialize($stream),
            0xf12bb6e1 => PageBlockSubheader::deserialize($stream),
            0x467a0766 => PageBlockParagraph::deserialize($stream),
            0xc070d93e => PageBlockPreformatted::deserialize($stream),
            0x48870999 => PageBlockFooter::deserialize($stream),
            0xdb20b188 => PageBlockDivider::deserialize($stream),
            0xce0d37b0 => PageBlockAnchor::deserialize($stream),
            0xe4e88011 => PageBlockList::deserialize($stream),
            0x263d7c26 => PageBlockBlockquote::deserialize($stream),
            0x4f4456d3 => PageBlockPullquote::deserialize($stream),
            0x1759c560 => PageBlockPhoto::deserialize($stream),
            0x7c8fe7b6 => PageBlockVideo::deserialize($stream),
            0x39f23300 => PageBlockCover::deserialize($stream),
            0xa8718dc5 => PageBlockEmbed::deserialize($stream),
            0xf259a80b => PageBlockEmbedPost::deserialize($stream),
            0x65a0fa4d => PageBlockCollage::deserialize($stream),
            0x31f9590 => PageBlockSlideshow::deserialize($stream),
            0xef1751b5 => PageBlockChannel::deserialize($stream),
            0x804361ea => PageBlockAudio::deserialize($stream),
            0x1e148390 => PageBlockKicker::deserialize($stream),
            0xbf4dea82 => PageBlockTable::deserialize($stream),
            0x9a8ae1e1 => PageBlockOrderedList::deserialize($stream),
            0x76768bed => PageBlockDetails::deserialize($stream),
            0x16115a96 => PageBlockRelatedArticles::deserialize($stream),
            0xa44f3ef6 => PageBlockMap::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type PageBlock. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}