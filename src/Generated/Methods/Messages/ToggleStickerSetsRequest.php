<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStickerSet;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.toggleStickerSets
 */
final class ToggleStickerSetsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb5052fea;
    
    public string $predicate = 'messages.toggleStickerSets';
    
    public function getMethodName(): string
    {
        return 'messages.toggleStickerSets';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<AbstractInputStickerSet> $stickersets
     * @param true|null $uninstall
     * @param true|null $archive
     * @param true|null $unarchive
     */
    public function __construct(
        public readonly array $stickersets,
        public readonly ?true $uninstall = null,
        public readonly ?true $archive = null,
        public readonly ?true $unarchive = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->uninstall) {
            $flags |= (1 << 0);
        }
        if ($this->archive) {
            $flags |= (1 << 1);
        }
        if ($this->unarchive) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::vectorOfObjects($this->stickersets);
        return $buffer;
    }
}