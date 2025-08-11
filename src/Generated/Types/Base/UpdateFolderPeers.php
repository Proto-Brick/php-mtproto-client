<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateFolderPeers
 */
final class UpdateFolderPeers extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x19360dc0;
    
    public string $_ = 'updateFolderPeers';
    
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
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $folderPeers = Deserializer::vectorOfObjects($stream, [FolderPeer::class, 'deserialize']);
        $pts = Deserializer::int32($stream);
        $ptsCount = Deserializer::int32($stream);
        return new self(
            $folderPeers,
            $pts,
            $ptsCount
        );
    }
}