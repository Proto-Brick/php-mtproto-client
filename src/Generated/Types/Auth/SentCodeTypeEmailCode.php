<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeEmailCode
 */
final class SentCodeTypeEmailCode extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 4098946459;
    
    public string $_ = 'auth.sentCodeTypeEmailCode';
    
    /**
     * @param string $emailPattern
     * @param int $length
     * @param bool|null $appleSigninAllowed
     * @param bool|null $googleSigninAllowed
     * @param int|null $resetAvailablePeriod
     * @param int|null $resetPendingDate
     */
    public function __construct(
        public readonly string $emailPattern,
        public readonly int $length,
        public readonly ?bool $appleSigninAllowed = null,
        public readonly ?bool $googleSigninAllowed = null,
        public readonly ?int $resetAvailablePeriod = null,
        public readonly ?int $resetPendingDate = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->appleSigninAllowed) $flags |= (1 << 0);
        if ($this->googleSigninAllowed) $flags |= (1 << 1);
        if ($this->resetAvailablePeriod !== null) $flags |= (1 << 3);
        if ($this->resetPendingDate !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->emailPattern);
        $buffer .= $serializer->int32($this->length);
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->int32($this->resetAvailablePeriod);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int32($this->resetPendingDate);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $appleSigninAllowed = ($flags & (1 << 0)) ? true : null;
        $googleSigninAllowed = ($flags & (1 << 1)) ? true : null;
        $emailPattern = $deserializer->bytes($stream);
        $length = $deserializer->int32($stream);
        $resetAvailablePeriod = ($flags & (1 << 3)) ? $deserializer->int32($stream) : null;
        $resetPendingDate = ($flags & (1 << 4)) ? $deserializer->int32($stream) : null;
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