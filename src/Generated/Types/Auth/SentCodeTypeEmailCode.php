<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeEmailCode
 */
final class SentCodeTypeEmailCode extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0xf450f59b;
    
    public string $predicate = 'auth.sentCodeTypeEmailCode';
    
    /**
     * @param string $emailPattern
     * @param int $length
     * @param true|null $appleSigninAllowed
     * @param true|null $googleSigninAllowed
     * @param int|null $resetAvailablePeriod
     * @param int|null $resetPendingDate
     */
    public function __construct(
        public readonly string $emailPattern,
        public readonly int $length,
        public readonly ?true $appleSigninAllowed = null,
        public readonly ?true $googleSigninAllowed = null,
        public readonly ?int $resetAvailablePeriod = null,
        public readonly ?int $resetPendingDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->appleSigninAllowed) {
            $flags |= (1 << 0);
        }
        if ($this->googleSigninAllowed) {
            $flags |= (1 << 1);
        }
        if ($this->resetAvailablePeriod !== null) {
            $flags |= (1 << 3);
        }
        if ($this->resetPendingDate !== null) {
            $flags |= (1 << 4);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->emailPattern);
        $buffer .= Serializer::int32($this->length);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->resetAvailablePeriod);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->resetPendingDate);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $appleSigninAllowed = (($flags & (1 << 0)) !== 0) ? true : null;
        $googleSigninAllowed = (($flags & (1 << 1)) !== 0) ? true : null;
        $emailPattern = Deserializer::bytes($__payload, $__offset);
        $length = Deserializer::int32($__payload, $__offset);
        $resetAvailablePeriod = (($flags & (1 << 3)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $resetPendingDate = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $emailPattern,
            $length,
            $appleSigninAllowed,
            $googleSigninAllowed,
            $resetAvailablePeriod,
            $resetPendingDate
        );
    }
}