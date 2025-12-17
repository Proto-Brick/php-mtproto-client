<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeFirebaseSms
 */
final class SentCodeTypeFirebaseSms extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0x9fd736;
    
    public string $predicate = 'auth.sentCodeTypeFirebaseSms';
    
    /**
     * @param int $length
     * @param string|null $nonce
     * @param int|null $playIntegrityProjectId
     * @param string|null $playIntegrityNonce
     * @param string|null $receipt
     * @param int|null $pushTimeout
     */
    public function __construct(
        public readonly int $length,
        public readonly ?string $nonce = null,
        public readonly ?int $playIntegrityProjectId = null,
        public readonly ?string $playIntegrityNonce = null,
        public readonly ?string $receipt = null,
        public readonly ?int $pushTimeout = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nonce !== null) {
            $flags |= (1 << 0);
        }
        if ($this->playIntegrityProjectId !== null) {
            $flags |= (1 << 2);
        }
        if ($this->playIntegrityNonce !== null) {
            $flags |= (1 << 2);
        }
        if ($this->receipt !== null) {
            $flags |= (1 << 1);
        }
        if ($this->pushTimeout !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->nonce);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int64($this->playIntegrityProjectId);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->playIntegrityNonce);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->receipt);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->pushTimeout);
        }
        $buffer .= Serializer::int32($this->length);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $nonce = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $playIntegrityProjectId = (($flags & (1 << 2)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $playIntegrityNonce = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $receipt = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $pushTimeout = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $length = Deserializer::int32($__payload, $__offset);

        return new self(
            $length,
            $nonce,
            $playIntegrityProjectId,
            $playIntegrityNonce,
            $receipt,
            $pushTimeout
        );
    }
}