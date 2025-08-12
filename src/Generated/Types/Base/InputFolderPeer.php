<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputFolderPeer
 */
final class InputFolderPeer extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfbd2c296;
    
    public string $predicate = 'inputFolderPeer';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $folderId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
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
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $peer = AbstractInputPeer::deserialize($stream);
        $folderId = Deserializer::int32($stream);

        return new self(
            $peer,
            $folderId
        );
    }
}