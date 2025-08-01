<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSecureCredentialsEncrypted;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSecureValueHash;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.acceptAuthorization
 */
final class AcceptAuthorizationRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 4092415091;
    
    public string $_ = 'account.acceptAuthorization';
    
    public function getMethodName(): string
    {
        return 'account.acceptAuthorization';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $botId
     * @param string $scope
     * @param string $publicKey
     * @param list<AbstractSecureValueHash> $valueHashes
     * @param AbstractSecureCredentialsEncrypted $credentials
     */
    public function __construct(
        public readonly int $botId,
        public readonly string $scope,
        public readonly string $publicKey,
        public readonly array $valueHashes,
        public readonly AbstractSecureCredentialsEncrypted $credentials
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->botId);
        $buffer .= $serializer->bytes($this->scope);
        $buffer .= $serializer->bytes($this->publicKey);
        $buffer .= $serializer->vectorOfObjects($this->valueHashes);
        $buffer .= $this->credentials->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}