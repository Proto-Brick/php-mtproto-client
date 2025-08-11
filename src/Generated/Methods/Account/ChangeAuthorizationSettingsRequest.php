<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.changeAuthorizationSettings
 */
final class ChangeAuthorizationSettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x40f48462;
    
    public string $_ = 'account.changeAuthorizationSettings';
    
    public function getMethodName(): string
    {
        return 'account.changeAuthorizationSettings';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $hash
     * @param bool|null $confirmed
     * @param bool|null $encryptedRequestsDisabled
     * @param bool|null $callRequestsDisabled
     */
    public function __construct(
        public readonly int $hash,
        public readonly ?bool $confirmed = null,
        public readonly ?bool $encryptedRequestsDisabled = null,
        public readonly ?bool $callRequestsDisabled = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->confirmed) $flags |= (1 << 3);
        if ($this->encryptedRequestsDisabled !== null) $flags |= (1 << 0);
        if ($this->callRequestsDisabled !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->hash);
        if ($flags & (1 << 0)) {
            $buffer .= ($this->encryptedRequestsDisabled ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 1)) {
            $buffer .= ($this->callRequestsDisabled ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}