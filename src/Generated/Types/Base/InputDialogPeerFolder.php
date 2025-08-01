<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputDialogPeerFolder
 */
final class InputDialogPeerFolder extends AbstractInputDialogPeer
{
    public const CONSTRUCTOR_ID = 1684014375;
    
    public string $_ = 'inputDialogPeerFolder';
    
    /**
     * @param int $folderId
     */
    public function __construct(
        public readonly int $folderId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->folderId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $folderId = $deserializer->int32($stream);
            return new self(
            $folderId
        );
    }
}