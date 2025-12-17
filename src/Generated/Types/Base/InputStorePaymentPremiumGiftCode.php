<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStorePaymentPremiumGiftCode
 */
final class InputStorePaymentPremiumGiftCode extends AbstractInputStorePaymentPurpose
{
    public const CONSTRUCTOR_ID = 0xfb790393;
    
    public string $predicate = 'inputStorePaymentPremiumGiftCode';
    
    /**
     * @param list<AbstractInputUser> $users
     * @param string $currency
     * @param int $amount
     * @param AbstractInputPeer|null $boostPeer
     * @param TextWithEntities|null $message
     */
    public function __construct(
        public readonly array $users,
        public readonly string $currency,
        public readonly int $amount,
        public readonly ?AbstractInputPeer $boostPeer = null,
        public readonly ?TextWithEntities $message = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->boostPeer !== null) {
            $flags |= (1 << 0);
        }
        if ($this->message !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::vectorOfObjects($this->users);
        if ($flags & (1 << 0)) {
            $buffer .= $this->boostPeer->serialize();
        }
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        if ($flags & (1 << 1)) {
            $buffer .= $this->message->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractInputUser::class, 'deserialize']);
        $boostPeer = (($flags & (1 << 0)) !== 0) ? AbstractInputPeer::deserialize($__payload, $__offset) : null;
        $currency = Deserializer::bytes($__payload, $__offset);
        $amount = Deserializer::int64($__payload, $__offset);
        $message = (($flags & (1 << 1)) !== 0) ? TextWithEntities::deserialize($__payload, $__offset) : null;

        return new self(
            $users,
            $currency,
            $amount,
            $boostPeer,
            $message
        );
    }
}