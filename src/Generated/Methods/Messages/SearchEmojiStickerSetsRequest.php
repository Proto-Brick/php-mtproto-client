<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractFoundStickerSets;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.searchEmojiStickerSets
 */
final class SearchEmojiStickerSetsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x92b4494c;
    
    public string $predicate = 'messages.searchEmojiStickerSets';
    
    public function getMethodName(): string
    {
        return 'messages.searchEmojiStickerSets';
    }
    
    public function getResponseClass(): string
    {
        return AbstractFoundStickerSets::class;
    }
    /**
     * @param string $q
     * @param int $hash
     * @param true|null $excludeFeatured
     */
    public function __construct(
        public readonly string $q,
        public readonly int $hash,
        public readonly ?true $excludeFeatured = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->excludeFeatured) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->q);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}