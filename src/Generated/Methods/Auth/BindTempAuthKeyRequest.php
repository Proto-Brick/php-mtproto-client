<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.bindTempAuthKey
 */
final class BindTempAuthKeyRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3453233669;
    
    public string $_ = 'auth.bindTempAuthKey';
    
    public function getMethodName(): string
    {
        return 'auth.bindTempAuthKey';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $permAuthKeyId
     * @param int $nonce
     * @param int $expiresAt
     * @param string $encryptedMessage
     */
    public function __construct(
        public readonly int $permAuthKeyId,
        public readonly int $nonce,
        public readonly int $expiresAt,
        public readonly string $encryptedMessage
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->permAuthKeyId);
        $buffer .= $serializer->int64($this->nonce);
        $buffer .= $serializer->int32($this->expiresAt);
        $buffer .= $serializer->bytes($this->encryptedMessage);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}