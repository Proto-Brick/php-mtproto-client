<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStarsTransaction;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarsStatus;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarsTransactionsByID
 */
final class GetStarsTransactionsByIDRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x27842d2e;
    
    public string $_ = 'payments.getStarsTransactionsByID';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsTransactionsByID';
    }
    
    public function getResponseClass(): string
    {
        return StarsStatus::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<InputStarsTransaction> $id
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfObjects($this->id);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}