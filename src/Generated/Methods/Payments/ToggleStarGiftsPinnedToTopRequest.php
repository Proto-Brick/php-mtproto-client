<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.toggleStarGiftsPinnedToTop
 */
final class ToggleStarGiftsPinnedToTopRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1513e7b0;
    
    public string $predicate = 'payments.toggleStarGiftsPinnedToTop';
    
    public function getMethodName(): string
    {
        return 'payments.toggleStarGiftsPinnedToTop';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<AbstractInputSavedStarGift> $stargift
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $stargift
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfObjects($this->stargift);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}