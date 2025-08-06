<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Folders;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputFolderPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/folders.editPeerFolders
 */
final class EditPeerFoldersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6847d0ab;
    
    public string $_ = 'folders.editPeerFolders';
    
    public function getMethodName(): string
    {
        return 'folders.editPeerFolders';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param list<InputFolderPeer> $folderPeers
     */
    public function __construct(
        public readonly array $folderPeers
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->folderPeers);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}