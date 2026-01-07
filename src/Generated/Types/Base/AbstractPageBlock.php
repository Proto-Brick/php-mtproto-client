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
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x13567e8a => PageBlockUnsupported::deserialize($__payload, $__offset),
            0x70abc3fd => PageBlockTitle::deserialize($__payload, $__offset),
            0x8ffa9a1f => PageBlockSubtitle::deserialize($__payload, $__offset),
            0xbaafe5e0 => PageBlockAuthorDate::deserialize($__payload, $__offset),
            0xbfd064ec => PageBlockHeader::deserialize($__payload, $__offset),
            0xf12bb6e1 => PageBlockSubheader::deserialize($__payload, $__offset),
            0x467a0766 => PageBlockParagraph::deserialize($__payload, $__offset),
            0xc070d93e => PageBlockPreformatted::deserialize($__payload, $__offset),
            0x48870999 => PageBlockFooter::deserialize($__payload, $__offset),
            0xdb20b188 => PageBlockDivider::deserialize($__payload, $__offset),
            0xce0d37b0 => PageBlockAnchor::deserialize($__payload, $__offset),
            0xe4e88011 => PageBlockList::deserialize($__payload, $__offset),
            0x263d7c26 => PageBlockBlockquote::deserialize($__payload, $__offset),
            0x4f4456d3 => PageBlockPullquote::deserialize($__payload, $__offset),
            0x1759c560 => PageBlockPhoto::deserialize($__payload, $__offset),
            0x7c8fe7b6 => PageBlockVideo::deserialize($__payload, $__offset),
            0x39f23300 => PageBlockCover::deserialize($__payload, $__offset),
            0xa8718dc5 => PageBlockEmbed::deserialize($__payload, $__offset),
            0xf259a80b => PageBlockEmbedPost::deserialize($__payload, $__offset),
            0x65a0fa4d => PageBlockCollage::deserialize($__payload, $__offset),
            0x31f9590 => PageBlockSlideshow::deserialize($__payload, $__offset),
            0xef1751b5 => PageBlockChannel::deserialize($__payload, $__offset),
            0x804361ea => PageBlockAudio::deserialize($__payload, $__offset),
            0x1e148390 => PageBlockKicker::deserialize($__payload, $__offset),
            0xbf4dea82 => PageBlockTable::deserialize($__payload, $__offset),
            0x9a8ae1e1 => PageBlockOrderedList::deserialize($__payload, $__offset),
            0x76768bed => PageBlockDetails::deserialize($__payload, $__offset),
            0x16115a96 => PageBlockRelatedArticles::deserialize($__payload, $__offset),
            0xa44f3ef6 => PageBlockMap::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type PageBlock. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}