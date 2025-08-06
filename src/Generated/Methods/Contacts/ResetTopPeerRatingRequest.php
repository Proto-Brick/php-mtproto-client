<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractTopPeerCategory;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.resetTopPeerRating
 */
final class ResetTopPeerRatingRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1ae373ac;
    
    public string $_ = 'contacts.resetTopPeerRating';
    
    public function getMethodName(): string
    {
        return 'contacts.resetTopPeerRating';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractTopPeerCategory $category
     * @param AbstractInputPeer $peer
     */
    public function __construct(
        public readonly AbstractTopPeerCategory $category,
        public readonly AbstractInputPeer $peer
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->category->serialize($serializer);
        $buffer .= $this->peer->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}