<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateReadStories
 */
final class UpdateReadStories extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xf74e932b;
    
    public string $_ = 'updateReadStories';
    
    /**
     * @param AbstractPeer $peer
     * @param int $maxId
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $maxId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->maxId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $maxId = $deserializer->int32($stream);
        return new self(
            $peer,
            $maxId
        );
    }
}