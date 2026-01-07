<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/payments.giveawayInfo
 */
final class GiveawayInfo extends AbstractGiveawayInfo
{
    public const CONSTRUCTOR_ID = 0x4367daa0;
    
    public string $predicate = 'payments.giveawayInfo';
    
    /**
     * @param int $startDate
     * @param true|null $participating
     * @param true|null $preparingResults
     * @param int|null $joinedTooEarlyDate
     * @param int|null $adminDisallowedChatId
     * @param string|null $disallowedCountry
     */
    public function __construct(
        public readonly int $startDate,
        public readonly ?true $participating = null,
        public readonly ?true $preparingResults = null,
        public readonly ?int $joinedTooEarlyDate = null,
        public readonly ?int $adminDisallowedChatId = null,
        public readonly ?string $disallowedCountry = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->participating) {
            $flags |= (1 << 0);
        }
        if ($this->preparingResults) {
            $flags |= (1 << 3);
        }
        if ($this->joinedTooEarlyDate !== null) {
            $flags |= (1 << 1);
        }
        if ($this->adminDisallowedChatId !== null) {
            $flags |= (1 << 2);
        }
        if ($this->disallowedCountry !== null) {
            $flags |= (1 << 4);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->startDate);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->joinedTooEarlyDate);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int64($this->adminDisallowedChatId);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::bytes($this->disallowedCountry);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $participating = (($flags & (1 << 0)) !== 0) ? true : null;
        $preparingResults = (($flags & (1 << 3)) !== 0) ? true : null;
        $startDate = Deserializer::int32($__payload, $__offset);
        $joinedTooEarlyDate = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $adminDisallowedChatId = (($flags & (1 << 2)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $disallowedCountry = (($flags & (1 << 4)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $startDate,
            $participating,
            $preparingResults,
            $joinedTooEarlyDate,
            $adminDisallowedChatId,
            $disallowedCountry
        );
    }
}