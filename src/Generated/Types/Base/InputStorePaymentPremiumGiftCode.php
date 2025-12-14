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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $users = Deserializer::vectorOfObjects($stream, [AbstractInputUser::class, 'deserialize']);
        $boostPeer = (($flags & (1 << 0)) !== 0) ? AbstractInputPeer::deserialize($stream) : null;
        $currency = Deserializer::bytes($stream);
        $amount = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $message = (($flags & (1 << 1)) !== 0) ? TextWithEntities::deserialize($stream) : null;

        return new self(
            $users,
            $currency,
            $amount,
            $boostPeer,
            $message
        );
    }
}