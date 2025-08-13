<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarGiftCollection;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.updateStarGiftCollection
 */
final class UpdateStarGiftCollectionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4fddbee7;
    
    public string $predicate = 'payments.updateStarGiftCollection';
    
    public function getMethodName(): string
    {
        return 'payments.updateStarGiftCollection';
    }
    
    public function getResponseClass(): string
    {
        return StarGiftCollection::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $collectionId
     * @param string|null $title
     * @param list<AbstractInputSavedStarGift>|null $deleteStargift
     * @param list<AbstractInputSavedStarGift>|null $addStargift
     * @param list<AbstractInputSavedStarGift>|null $order
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $collectionId,
        public readonly ?string $title = null,
        public readonly ?array $deleteStargift = null,
        public readonly ?array $addStargift = null,
        public readonly ?array $order = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) $flags |= (1 << 0);
        if ($this->deleteStargift !== null) $flags |= (1 << 1);
        if ($this->addStargift !== null) $flags |= (1 << 2);
        if ($this->order !== null) $flags |= (1 << 3);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->collectionId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->deleteStargift);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::vectorOfObjects($this->addStargift);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->order);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}