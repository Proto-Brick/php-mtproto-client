<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStarsTransaction;
use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractStarsStatus;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarsTransactionsByID
 */
final class GetStarsTransactionsByIDRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 662973742;
    
    public string $_ = 'payments.getStarsTransactionsByID';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsTransactionsByID';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStarsStatus::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<AbstractInputStarsTransaction> $id
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $id
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->id);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}