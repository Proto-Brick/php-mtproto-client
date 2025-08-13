<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/folderPeer
 */
final class FolderPeer extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe9baa668;
    
    public string $predicate = 'folderPeer';
    
    /**
     * @param AbstractPeer $peer
     * @param int $folderId
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $folderId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->folderId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $peer = AbstractPeer::deserialize($stream);
        $folderId = Deserializer::int32($stream);

        return new self(
            $peer,
            $folderId
        );
    }
}