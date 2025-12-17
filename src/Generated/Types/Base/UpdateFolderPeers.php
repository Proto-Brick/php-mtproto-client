<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateFolderPeers
 */
final class UpdateFolderPeers extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x19360dc0;
    
    public string $predicate = 'updateFolderPeers';
    
    /**
     * @param list<FolderPeer> $folderPeers
     * @param int $pts
     * @param int $ptsCount
     */
    public function __construct(
        public readonly array $folderPeers,
        public readonly int $pts,
        public readonly int $ptsCount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->folderPeers);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $folderPeers = Deserializer::vectorOfObjects($__payload, $__offset, [FolderPeer::class, 'deserialize']);
        $pts = Deserializer::int32($__payload, $__offset);
        $ptsCount = Deserializer::int32($__payload, $__offset);

        return new self(
            $folderPeers,
            $pts,
            $ptsCount
        );
    }
}