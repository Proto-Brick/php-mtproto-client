<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.deleteStarGiftCollection
 */
final class DeleteStarGiftCollectionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xad5648e8;
    
    public string $predicate = 'payments.deleteStarGiftCollection';
    
    public function getMethodName(): string
    {
        return 'payments.deleteStarGiftCollection';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $collectionId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $collectionId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->collectionId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}