<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeFirebaseSms
 */
final class SentCodeTypeFirebaseSms extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0x9fd736;
    
    public string $_ = 'auth.sentCodeTypeFirebaseSms';
    
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
        if ($this->nonce !== null) $flags |= (1 << 0);
        if ($this->playIntegrityProjectId !== null) $flags |= (1 << 2);
        if ($this->playIntegrityNonce !== null) $flags |= (1 << 2);
        if ($this->receipt !== null) $flags |= (1 << 1);
        if ($this->pushTimeout !== null) $flags |= (1 << 1);
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $nonce = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $playIntegrityProjectId = ($flags & (1 << 2)) ? Deserializer::int64($stream) : null;
        $playIntegrityNonce = ($flags & (1 << 2)) ? Deserializer::bytes($stream) : null;
        $receipt = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $pushTimeout = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        $length = Deserializer::int32($stream);
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