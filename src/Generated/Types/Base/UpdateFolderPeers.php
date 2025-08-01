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
    public const CONSTRUCTOR_ID = 422972864;
    
    public string $_ = 'updateFolderPeers';
    
    /**
     * @param list<AbstractFolderPeer> $folderPeers
     * @param int $pts
     * @param int $ptsCount
     */
    public function __construct(
        public readonly array $folderPeers,
        public readonly int $pts,
        public readonly int $ptsCount
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->folderPeers);
        $buffer .= $serializer->int32($this->pts);
        $buffer .= $serializer->int32($this->ptsCount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $folderPeers = $deserializer->vectorOfObjects($stream, [AbstractFolderPeer::class, 'deserialize']);
        $pts = $deserializer->int32($stream);
        $ptsCount = $deserializer->int32($stream);
            return new self(
            $folderPeers,
            $pts,
            $ptsCount
        );
    }
}