<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputFolderPeer
 */
final class InputFolderPeer extends AbstractInputFolderPeer
{
    public const CONSTRUCTOR_ID = 4224893590;
    
    public string $_ = 'inputFolderPeer';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $folderId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $folderId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->folderId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractInputPeer::deserialize($deserializer, $stream);
        $folderId = $deserializer->int32($stream);
            return new self(
            $peer,
            $folderId
        );
    }
}