<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/authorization
 */
final class Authorization extends TlObject
{
    public const CONSTRUCTOR_ID = 0xad01d61d;
    
    public string $predicate = 'authorization';
    
    /**
     * @param int $hash
     * @param string $deviceModel
     * @param string $platform
     * @param string $systemVersion
     * @param int $apiId
     * @param string $appName
     * @param string $appVersion
     * @param int $dateCreated
     * @param int $dateActive
     * @param string $ip
     * @param string $country
     * @param string $region
     * @param true|null $current
     * @param true|null $officialApp
     * @param true|null $passwordPending
     * @param true|null $encryptedRequestsDisabled
     * @param true|null $callRequestsDisabled
     * @param true|null $unconfirmed
     */
    public function __construct(
        public readonly int $hash,
        public readonly string $deviceModel,
        public readonly string $platform,
        public readonly string $systemVersion,
        public readonly int $apiId,
        public readonly string $appName,
        public readonly string $appVersion,
        public readonly int $dateCreated,
        public readonly int $dateActive,
        public readonly string $ip,
        public readonly string $country,
        public readonly string $region,
        public readonly ?true $current = null,
        public readonly ?true $officialApp = null,
        public readonly ?true $passwordPending = null,
        public readonly ?true $encryptedRequestsDisabled = null,
        public readonly ?true $callRequestsDisabled = null,
        public readonly ?true $unconfirmed = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->current) {
            $flags |= (1 << 0);
        }
        if ($this->officialApp) {
            $flags |= (1 << 1);
        }
        if ($this->passwordPending) {
            $flags |= (1 << 2);
        }
        if ($this->encryptedRequestsDisabled) {
            $flags |= (1 << 3);
        }
        if ($this->callRequestsDisabled) {
            $flags |= (1 << 4);
        }
        if ($this->unconfirmed) {
            $flags |= (1 << 5);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::bytes($this->deviceModel);
        $buffer .= Serializer::bytes($this->platform);
        $buffer .= Serializer::bytes($this->systemVersion);
        $buffer .= Serializer::int32($this->apiId);
        $buffer .= Serializer::bytes($this->appName);
        $buffer .= Serializer::bytes($this->appVersion);
        $buffer .= Serializer::int32($this->dateCreated);
        $buffer .= Serializer::int32($this->dateActive);
        $buffer .= Serializer::bytes($this->ip);
        $buffer .= Serializer::bytes($this->country);
        $buffer .= Serializer::bytes($this->region);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $current = (($flags & (1 << 0)) !== 0) ? true : null;
        $officialApp = (($flags & (1 << 1)) !== 0) ? true : null;
        $passwordPending = (($flags & (1 << 2)) !== 0) ? true : null;
        $encryptedRequestsDisabled = (($flags & (1 << 3)) !== 0) ? true : null;
        $callRequestsDisabled = (($flags & (1 << 4)) !== 0) ? true : null;
        $unconfirmed = (($flags & (1 << 5)) !== 0) ? true : null;
        $hash = Deserializer::int64($stream);
        $deviceModel = Deserializer::bytes($stream);
        $platform = Deserializer::bytes($stream);
        $systemVersion = Deserializer::bytes($stream);
        $apiId = Deserializer::int32($stream);
        $appName = Deserializer::bytes($stream);
        $appVersion = Deserializer::bytes($stream);
        $dateCreated = Deserializer::int32($stream);
        $dateActive = Deserializer::int32($stream);
        $ip = Deserializer::bytes($stream);
        $country = Deserializer::bytes($stream);
        $region = Deserializer::bytes($stream);

        return new self(
            $hash,
            $deviceModel,
            $platform,
            $systemVersion,
            $apiId,
            $appName,
            $appVersion,
            $dateCreated,
            $dateActive,
            $ip,
            $country,
            $region,
            $current,
            $officialApp,
            $passwordPending,
            $encryptedRequestsDisabled,
            $callRequestsDisabled,
            $unconfirmed
        );
    }
}