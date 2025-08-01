<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.registerDevice
 */
final class RegisterDeviceRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3968205178;
    
    public string $_ = 'account.registerDevice';
    
    public function getMethodName(): string
    {
        return 'account.registerDevice';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $tokenType
     * @param string $token
     * @param bool $appSandbox
     * @param string $secret
     * @param list<int> $otherUids
     * @param bool|null $noMuted
     */
    public function __construct(
        public readonly int $tokenType,
        public readonly string $token,
        public readonly bool $appSandbox,
        public readonly string $secret,
        public readonly array $otherUids,
        public readonly ?bool $noMuted = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->noMuted) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->tokenType);
        $buffer .= $serializer->bytes($this->token);
        $buffer .= ($this->appSandbox ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        $buffer .= $serializer->bytes($this->secret);
        $buffer .= $serializer->vectorOfLongs($this->otherUids);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}