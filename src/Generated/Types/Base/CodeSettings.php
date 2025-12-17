<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/codeSettings
 */
final class CodeSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0xad253d78;
    
    public string $predicate = 'codeSettings';
    
    /**
     * @param true|null $allowFlashcall
     * @param true|null $currentNumber
     * @param true|null $allowAppHash
     * @param true|null $allowMissedCall
     * @param true|null $allowFirebase
     * @param true|null $unknownNumber
     * @param list<string>|null $logoutTokens
     * @param string|null $token
     * @param bool|null $appSandbox
     */
    public function __construct(
        public readonly ?true $allowFlashcall = null,
        public readonly ?true $currentNumber = null,
        public readonly ?true $allowAppHash = null,
        public readonly ?true $allowMissedCall = null,
        public readonly ?true $allowFirebase = null,
        public readonly ?true $unknownNumber = null,
        public readonly ?array $logoutTokens = null,
        public readonly ?string $token = null,
        public readonly ?bool $appSandbox = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->allowFlashcall) {
            $flags |= (1 << 0);
        }
        if ($this->currentNumber) {
            $flags |= (1 << 1);
        }
        if ($this->allowAppHash) {
            $flags |= (1 << 4);
        }
        if ($this->allowMissedCall) {
            $flags |= (1 << 5);
        }
        if ($this->allowFirebase) {
            $flags |= (1 << 7);
        }
        if ($this->unknownNumber) {
            $flags |= (1 << 9);
        }
        if ($this->logoutTokens !== null) {
            $flags |= (1 << 6);
        }
        if ($this->token !== null) {
            $flags |= (1 << 8);
        }
        if ($this->appSandbox !== null) {
            $flags |= (1 << 8);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::vectorOfStrings($this->logoutTokens);
        }
        if ($flags & (1 << 8)) {
            $buffer .= Serializer::bytes($this->token);
        }
        if ($flags & (1 << 8)) {
            $buffer .= ($this->appSandbox ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $allowFlashcall = (($flags & (1 << 0)) !== 0) ? true : null;
        $currentNumber = (($flags & (1 << 1)) !== 0) ? true : null;
        $allowAppHash = (($flags & (1 << 4)) !== 0) ? true : null;
        $allowMissedCall = (($flags & (1 << 5)) !== 0) ? true : null;
        $allowFirebase = (($flags & (1 << 7)) !== 0) ? true : null;
        $unknownNumber = (($flags & (1 << 9)) !== 0) ? true : null;
        $logoutTokens = (($flags & (1 << 6)) !== 0) ? Deserializer::vectorOfStrings($__payload, $__offset) : null;
        $token = (($flags & (1 << 8)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $appSandbox = (($flags & (1 << 8)) !== 0) ? (Deserializer::int32($__payload, $__offset) === 0x997275b5) : null;

        return new self(
            $allowFlashcall,
            $currentNumber,
            $allowAppHash,
            $allowMissedCall,
            $allowFirebase,
            $unknownNumber,
            $logoutTokens,
            $token,
            $appSandbox
        );
    }
}