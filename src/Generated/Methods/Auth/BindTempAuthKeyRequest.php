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
    public const CONSTRUCTOR_ID = 0xcdd42a05;
    
    public string $predicate = 'auth.bindTempAuthKey';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->permAuthKeyId);
        $buffer .= Serializer::int64($this->nonce);
        $buffer .= Serializer::int32($this->expiresAt);
        $buffer .= Serializer::bytes($this->encryptedMessage);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}