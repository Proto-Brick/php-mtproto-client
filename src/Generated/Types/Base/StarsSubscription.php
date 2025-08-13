<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starsSubscription
 */
final class StarsSubscription extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2e6eab1a;
    
    public string $predicate = 'starsSubscription';
    
    /**
     * @param string $id
     * @param AbstractPeer $peer
     * @param int $untilDate
     * @param StarsSubscriptionPricing $pricing
     * @param true|null $canceled
     * @param true|null $canRefulfill
     * @param true|null $missingBalance
     * @param true|null $botCanceled
     * @param string|null $chatInviteHash
     * @param string|null $title
     * @param AbstractWebDocument|null $photo
     * @param string|null $invoiceSlug
     */
    public function __construct(
        public readonly string $id,
        public readonly AbstractPeer $peer,
        public readonly int $untilDate,
        public readonly StarsSubscriptionPricing $pricing,
        public readonly ?true $canceled = null,
        public readonly ?true $canRefulfill = null,
        public readonly ?true $missingBalance = null,
        public readonly ?true $botCanceled = null,
        public readonly ?string $chatInviteHash = null,
        public readonly ?string $title = null,
        public readonly ?AbstractWebDocument $photo = null,
        public readonly ?string $invoiceSlug = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canceled) {
            $flags |= (1 << 0);
        }
        if ($this->canRefulfill) {
            $flags |= (1 << 1);
        }
        if ($this->missingBalance) {
            $flags |= (1 << 2);
        }
        if ($this->botCanceled) {
            $flags |= (1 << 7);
        }
        if ($this->chatInviteHash !== null) {
            $flags |= (1 << 3);
        }
        if ($this->title !== null) {
            $flags |= (1 << 4);
        }
        if ($this->photo !== null) {
            $flags |= (1 << 5);
        }
        if ($this->invoiceSlug !== null) {
            $flags |= (1 << 6);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->untilDate);
        $buffer .= $this->pricing->serialize();
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->chatInviteHash);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->photo->serialize();
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::bytes($this->invoiceSlug);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $canceled = (($flags & (1 << 0)) !== 0) ? true : null;
        $canRefulfill = (($flags & (1 << 1)) !== 0) ? true : null;
        $missingBalance = (($flags & (1 << 2)) !== 0) ? true : null;
        $botCanceled = (($flags & (1 << 7)) !== 0) ? true : null;
        $id = Deserializer::bytes($stream);
        $peer = AbstractPeer::deserialize($stream);
        $untilDate = Deserializer::int32($stream);
        $pricing = StarsSubscriptionPricing::deserialize($stream);
        $chatInviteHash = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($stream) : null;
        $title = (($flags & (1 << 4)) !== 0) ? Deserializer::bytes($stream) : null;
        $photo = (($flags & (1 << 5)) !== 0) ? AbstractWebDocument::deserialize($stream) : null;
        $invoiceSlug = (($flags & (1 << 6)) !== 0) ? Deserializer::bytes($stream) : null;

        return new self(
            $id,
            $peer,
            $untilDate,
            $pricing,
            $canceled,
            $canRefulfill,
            $missingBalance,
            $botCanceled,
            $chatInviteHash,
            $title,
            $photo,
            $invoiceSlug
        );
    }
}