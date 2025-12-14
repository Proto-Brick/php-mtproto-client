<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionGiftCode
 */
final class MessageActionGiftCode extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x56d03994;
    
    public string $predicate = 'messageActionGiftCode';
    
    /**
     * @param int $months
     * @param string $slug
     * @param true|null $viaGiveaway
     * @param true|null $unclaimed
     * @param AbstractPeer|null $boostPeer
     * @param string|null $currency
     * @param int|null $amount
     * @param string|null $cryptoCurrency
     * @param int|null $cryptoAmount
     * @param TextWithEntities|null $message
     */
    public function __construct(
        public readonly int $months,
        public readonly string $slug,
        public readonly ?true $viaGiveaway = null,
        public readonly ?true $unclaimed = null,
        public readonly ?AbstractPeer $boostPeer = null,
        public readonly ?string $currency = null,
        public readonly ?int $amount = null,
        public readonly ?string $cryptoCurrency = null,
        public readonly ?int $cryptoAmount = null,
        public readonly ?TextWithEntities $message = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->viaGiveaway) {
            $flags |= (1 << 0);
        }
        if ($this->unclaimed) {
            $flags |= (1 << 5);
        }
        if ($this->boostPeer !== null) {
            $flags |= (1 << 1);
        }
        if ($this->currency !== null) {
            $flags |= (1 << 2);
        }
        if ($this->amount !== null) {
            $flags |= (1 << 2);
        }
        if ($this->cryptoCurrency !== null) {
            $flags |= (1 << 3);
        }
        if ($this->cryptoAmount !== null) {
            $flags |= (1 << 3);
        }
        if ($this->message !== null) {
            $flags |= (1 << 4);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= $this->boostPeer->serialize();
        }
        $buffer .= Serializer::int32($this->months);
        $buffer .= Serializer::bytes($this->slug);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->currency);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int64($this->amount);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->cryptoCurrency);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int64($this->cryptoAmount);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $this->message->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $viaGiveaway = (($flags & (1 << 0)) !== 0) ? true : null;
        $unclaimed = (($flags & (1 << 5)) !== 0) ? true : null;
        $boostPeer = (($flags & (1 << 1)) !== 0) ? AbstractPeer::deserialize($stream) : null;
        $months = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $slug = Deserializer::bytes($stream);
        $currency = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($stream) : null;
        $amount = (($flags & (1 << 2)) !== 0) ? Deserializer::int64($stream) : null;
        $cryptoCurrency = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($stream) : null;
        $cryptoAmount = (($flags & (1 << 3)) !== 0) ? Deserializer::int64($stream) : null;
        $message = (($flags & (1 << 4)) !== 0) ? TextWithEntities::deserialize($stream) : null;

        return new self(
            $months,
            $slug,
            $viaGiveaway,
            $unclaimed,
            $boostPeer,
            $currency,
            $amount,
            $cryptoCurrency,
            $cryptoAmount,
            $message
        );
    }
}