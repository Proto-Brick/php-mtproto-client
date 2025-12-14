<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/disallowedGiftsSettings
 */
final class DisallowedGiftsSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x71f276c4;
    
    public string $predicate = 'disallowedGiftsSettings';
    
    /**
     * @param true|null $disallowUnlimitedStargifts
     * @param true|null $disallowLimitedStargifts
     * @param true|null $disallowUniqueStargifts
     * @param true|null $disallowPremiumGifts
     */
    public function __construct(
        public readonly ?true $disallowUnlimitedStargifts = null,
        public readonly ?true $disallowLimitedStargifts = null,
        public readonly ?true $disallowUniqueStargifts = null,
        public readonly ?true $disallowPremiumGifts = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->disallowUnlimitedStargifts) {
            $flags |= (1 << 0);
        }
        if ($this->disallowLimitedStargifts) {
            $flags |= (1 << 1);
        }
        if ($this->disallowUniqueStargifts) {
            $flags |= (1 << 2);
        }
        if ($this->disallowPremiumGifts) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $disallowUnlimitedStargifts = (($flags & (1 << 0)) !== 0) ? true : null;
        $disallowLimitedStargifts = (($flags & (1 << 1)) !== 0) ? true : null;
        $disallowUniqueStargifts = (($flags & (1 << 2)) !== 0) ? true : null;
        $disallowPremiumGifts = (($flags & (1 << 3)) !== 0) ? true : null;

        return new self(
            $disallowUnlimitedStargifts,
            $disallowLimitedStargifts,
            $disallowUniqueStargifts,
            $disallowPremiumGifts
        );
    }
}