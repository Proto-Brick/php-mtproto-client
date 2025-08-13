<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.transferStarGift
 */
final class TransferStarGiftRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7f18176a;
    
    public string $predicate = 'payments.transferStarGift';
    
    public function getMethodName(): string
    {
        return 'payments.transferStarGift';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputSavedStarGift $stargift
     * @param AbstractInputPeer $toId
     */
    public function __construct(
        public readonly AbstractInputSavedStarGift $stargift,
        public readonly AbstractInputPeer $toId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stargift->serialize();
        $buffer .= $this->toId->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}