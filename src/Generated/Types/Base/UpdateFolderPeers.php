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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $folderPeers = Deserializer::vectorOfObjects($stream, [FolderPeer::class, 'deserialize']);
        $pts = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $ptsCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $folderPeers,
            $pts,
            $ptsCount
        );
    }
}