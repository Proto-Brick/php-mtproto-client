<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Stories\AbstractAlbums;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.getAlbums
 */
final class GetAlbumsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x25b3eac7;
    
    public string $predicate = 'stories.getAlbums';
    
    public function getMethodName(): string
    {
        return 'stories.getAlbums';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAlbums::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $hash
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->hash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}