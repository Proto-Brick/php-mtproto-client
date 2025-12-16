<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPasswordKdfAlgo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractSecurePasswordKdfAlgo;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/account.password
 */
final class Password extends TlObject
{
    public const CONSTRUCTOR_ID = 0x957b50fb;
    
    public string $predicate = 'account.password';
    
    /**
     * @param AbstractPasswordKdfAlgo $newAlgo
     * @param AbstractSecurePasswordKdfAlgo $newSecureAlgo
     * @param string $secureRandom
     * @param true|null $hasRecovery
     * @param true|null $hasSecureValues
     * @param true|null $hasPassword
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
        public readonly ?true $hasRecovery = null,
        public readonly ?true $hasSecureValues = null,
        public readonly ?true $hasPassword = null,
        public readonly ?AbstractPasswordKdfAlgo $currentAlgo = null,
        public readonly ?string $srpB = null,
        public readonly ?int $srpId = null,
        public readonly ?string $hint = null,
        public readonly ?string $emailUnconfirmedPattern = null,
        public readonly ?int $pendingResetDate = null,
        public readonly ?string $loginEmailPattern = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasRecovery) {
            $flags |= (1 << 0);
        }
        if ($this->hasSecureValues) {
            $flags |= (1 << 1);
        }
        if ($this->hasPassword) {
            $flags |= (1 << 2);
        }
        if ($this->currentAlgo !== null) {
            $flags |= (1 << 2);
        }
        if ($this->srpB !== null) {
            $flags |= (1 << 2);
        }
        if ($this->srpId !== null) {
            $flags |= (1 << 2);
        }
        if ($this->hint !== null) {
            $flags |= (1 << 3);
        }
        if ($this->emailUnconfirmedPattern !== null) {
            $flags |= (1 << 4);
        }
        if ($this->pendingResetDate !== null) {
            $flags |= (1 << 5);
        }
        if ($this->loginEmailPattern !== null) {
            $flags |= (1 << 6);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 2)) {
            $buffer .= $this->currentAlgo->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->srpB);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int64($this->srpId);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->hint);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::bytes($this->emailUnconfirmedPattern);
        }
        $buffer .= $this->newAlgo->serialize();
        $buffer .= $this->newSecureAlgo->serialize();
        $buffer .= Serializer::bytes($this->secureRandom);
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int32($this->pendingResetDate);
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::bytes($this->loginEmailPattern);
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
        $hasRecovery = (($flags & (1 << 0)) !== 0) ? true : null;
        $hasSecureValues = (($flags & (1 << 1)) !== 0) ? true : null;
        $hasPassword = (($flags & (1 << 2)) !== 0) ? true : null;
        $currentAlgo = (($flags & (1 << 2)) !== 0) ? AbstractPasswordKdfAlgo::deserialize($stream) : null;
        $srpB = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($stream) : null;
        $srpId = (($flags & (1 << 2)) !== 0) ? Deserializer::int64($stream) : null;
        $hint = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($stream) : null;
        $emailUnconfirmedPattern = (($flags & (1 << 4)) !== 0) ? Deserializer::bytes($stream) : null;
        $newAlgo = AbstractPasswordKdfAlgo::deserialize($stream);
        $newSecureAlgo = AbstractSecurePasswordKdfAlgo::deserialize($stream);
        $secureRandom = Deserializer::bytes($stream);
        $pendingResetDate = (($flags & (1 << 5)) !== 0) ? Deserializer::int32($stream) : null;
        $loginEmailPattern = (($flags & (1 << 6)) !== 0) ? Deserializer::bytes($stream) : null;

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