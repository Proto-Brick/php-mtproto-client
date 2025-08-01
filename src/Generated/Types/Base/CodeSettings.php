<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/codeSettings
 */
final class CodeSettings extends AbstractCodeSettings
{
    public const CONSTRUCTOR_ID = 2904898936;
    
    public string $_ = 'codeSettings';
    
    /**
     * @param bool|null $allowFlashcall
     * @param bool|null $currentNumber
     * @param bool|null $allowAppHash
     * @param bool|null $allowMissedCall
     * @param bool|null $allowFirebase
     * @param bool|null $unknownNumber
     * @param list<string>|null $logoutTokens
     * @param string|null $token
     * @param bool|null $appSandbox
     */
    public function __construct(
        public readonly ?bool $allowFlashcall = null,
        public readonly ?bool $currentNumber = null,
        public readonly ?bool $allowAppHash = null,
        public readonly ?bool $allowMissedCall = null,
        public readonly ?bool $allowFirebase = null,
        public readonly ?bool $unknownNumber = null,
        public readonly ?array $logoutTokens = null,
        public readonly ?string $token = null,
        public readonly ?bool $appSandbox = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->allowFlashcall) $flags |= (1 << 0);
        if ($this->currentNumber) $flags |= (1 << 1);
        if ($this->allowAppHash) $flags |= (1 << 4);
        if ($this->allowMissedCall) $flags |= (1 << 5);
        if ($this->allowFirebase) $flags |= (1 << 7);
        if ($this->unknownNumber) $flags |= (1 << 9);
        if ($this->logoutTokens !== null) $flags |= (1 << 6);
        if ($this->token !== null) $flags |= (1 << 8);
        if ($this->appSandbox !== null) $flags |= (1 << 8);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 6)) {
            $buffer .= $serializer->vectorOfStrings($this->logoutTokens);
        }
        if ($flags & (1 << 8)) {
            $buffer .= $serializer->bytes($this->token);
        }
        if ($flags & (1 << 8)) {
            $buffer .= ($this->appSandbox ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $allowFlashcall = ($flags & (1 << 0)) ? true : null;
        $currentNumber = ($flags & (1 << 1)) ? true : null;
        $allowAppHash = ($flags & (1 << 4)) ? true : null;
        $allowMissedCall = ($flags & (1 << 5)) ? true : null;
        $allowFirebase = ($flags & (1 << 7)) ? true : null;
        $unknownNumber = ($flags & (1 << 9)) ? true : null;
        $logoutTokens = ($flags & (1 << 6)) ? $deserializer->vectorOfStrings($stream) : null;
        $token = ($flags & (1 << 8)) ? $deserializer->bytes($stream) : null;
        $appSandbox = ($flags & (1 << 8)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
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