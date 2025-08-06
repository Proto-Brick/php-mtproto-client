<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPasswordKdfAlgo;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSecurePasswordKdfAlgo;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.password
 */
final class Password extends TlObject
{
    public const CONSTRUCTOR_ID = 0x957b50fb;
    
    public string $_ = 'account.password';
    
    /**
     * @param AbstractPasswordKdfAlgo $newAlgo
     * @param AbstractSecurePasswordKdfAlgo $newSecureAlgo
     * @param string $secureRandom
     * @param bool|null $hasRecovery
     * @param bool|null $hasSecureValues
     * @param bool|null $hasPassword
     * @param AbstractPasswordKdfAlgo|null $currentAlgo
     * @param string|null $srpB
     * @param int|null $srpId
     * @param string|null $hint
     * @param string|null $emailUnconfirmedPattern
     * @param int|null $pendingResetDate
     * @param string|null $loginEmailPattern
     */
    public function __construct(
        public readonly AbstractPasswordKdfAlgo $newAlgo,
        public readonly AbstractSecurePasswordKdfAlgo $newSecureAlgo,
        public readonly string $secureRandom,
        public readonly ?bool $hasRecovery = null,
        public readonly ?bool $hasSecureValues = null,
        public readonly ?bool $hasPassword = null,
        public readonly ?AbstractPasswordKdfAlgo $currentAlgo = null,
        public readonly ?string $srpB = null,
        public readonly ?int $srpId = null,
        public readonly ?string $hint = null,
        public readonly ?string $emailUnconfirmedPattern = null,
        public readonly ?int $pendingResetDate = null,
        public readonly ?string $loginEmailPattern = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasRecovery) $flags |= (1 << 0);
        if ($this->hasSecureValues) $flags |= (1 << 1);
        if ($this->hasPassword) $flags |= (1 << 2);
        if ($this->currentAlgo !== null) $flags |= (1 << 2);
        if ($this->srpB !== null) $flags |= (1 << 2);
        if ($this->srpId !== null) $flags |= (1 << 2);
        if ($this->hint !== null) $flags |= (1 << 3);
        if ($this->emailUnconfirmedPattern !== null) $flags |= (1 << 4);
        if ($this->pendingResetDate !== null) $flags |= (1 << 5);
        if ($this->loginEmailPattern !== null) $flags |= (1 << 6);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 2)) {
            $buffer .= $this->currentAlgo->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->srpB);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int64($this->srpId);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->hint);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->bytes($this->emailUnconfirmedPattern);
        }
        $buffer .= $this->newAlgo->serialize($serializer);
        $buffer .= $this->newSecureAlgo->serialize($serializer);
        $buffer .= $serializer->bytes($this->secureRandom);
        if ($flags & (1 << 5)) {
            $buffer .= $serializer->int32($this->pendingResetDate);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $serializer->bytes($this->loginEmailPattern);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $hasRecovery = ($flags & (1 << 0)) ? true : null;
        $hasSecureValues = ($flags & (1 << 1)) ? true : null;
        $hasPassword = ($flags & (1 << 2)) ? true : null;
        $currentAlgo = ($flags & (1 << 2)) ? AbstractPasswordKdfAlgo::deserialize($deserializer, $stream) : null;
        $srpB = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        $srpId = ($flags & (1 << 2)) ? $deserializer->int64($stream) : null;
        $hint = ($flags & (1 << 3)) ? $deserializer->bytes($stream) : null;
        $emailUnconfirmedPattern = ($flags & (1 << 4)) ? $deserializer->bytes($stream) : null;
        $newAlgo = AbstractPasswordKdfAlgo::deserialize($deserializer, $stream);
        $newSecureAlgo = AbstractSecurePasswordKdfAlgo::deserialize($deserializer, $stream);
        $secureRandom = $deserializer->bytes($stream);
        $pendingResetDate = ($flags & (1 << 5)) ? $deserializer->int32($stream) : null;
        $loginEmailPattern = ($flags & (1 << 6)) ? $deserializer->bytes($stream) : null;
        return new self(
            $newAlgo,
            $newSecureAlgo,
            $secureRandom,
            $hasRecovery,
            $hasSecureValues,
            $hasPassword,
            $currentAlgo,
            $srpB,
            $srpId,
            $hint,
            $emailUnconfirmedPattern,
            $pendingResetDate,
            $loginEmailPattern
        );
    }
}