<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/authorization
 */
final class Authorization extends AbstractAuthorization
{
    public const CONSTRUCTOR_ID = 2902578717;
    
    public string $_ = 'authorization';
    
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
     * @param bool|null $current
     * @param bool|null $officialApp
     * @param bool|null $passwordPending
     * @param bool|null $encryptedRequestsDisabled
     * @param bool|null $callRequestsDisabled
     * @param bool|null $unconfirmed
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
        public readonly ?bool $current = null,
        public readonly ?bool $officialApp = null,
        public readonly ?bool $passwordPending = null,
        public readonly ?bool $encryptedRequestsDisabled = null,
        public readonly ?bool $callRequestsDisabled = null,
        public readonly ?bool $unconfirmed = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->current) $flags |= (1 << 0);
        if ($this->officialApp) $flags |= (1 << 1);
        if ($this->passwordPending) $flags |= (1 << 2);
        if ($this->encryptedRequestsDisabled) $flags |= (1 << 3);
        if ($this->callRequestsDisabled) $flags |= (1 << 4);
        if ($this->unconfirmed) $flags |= (1 << 5);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->hash);
        $buffer .= $serializer->bytes($this->deviceModel);
        $buffer .= $serializer->bytes($this->platform);
        $buffer .= $serializer->bytes($this->systemVersion);
        $buffer .= $serializer->int32($this->apiId);
        $buffer .= $serializer->bytes($this->appName);
        $buffer .= $serializer->bytes($this->appVersion);
        $buffer .= $serializer->int32($this->dateCreated);
        $buffer .= $serializer->int32($this->dateActive);
        $buffer .= $serializer->bytes($this->ip);
        $buffer .= $serializer->bytes($this->country);
        $buffer .= $serializer->bytes($this->region);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $current = ($flags & (1 << 0)) ? true : null;
        $officialApp = ($flags & (1 << 1)) ? true : null;
        $passwordPending = ($flags & (1 << 2)) ? true : null;
        $encryptedRequestsDisabled = ($flags & (1 << 3)) ? true : null;
        $callRequestsDisabled = ($flags & (1 << 4)) ? true : null;
        $unconfirmed = ($flags & (1 << 5)) ? true : null;
        $hash = $deserializer->int64($stream);
        $deviceModel = $deserializer->bytes($stream);
        $platform = $deserializer->bytes($stream);
        $systemVersion = $deserializer->bytes($stream);
        $apiId = $deserializer->int32($stream);
        $appName = $deserializer->bytes($stream);
        $appVersion = $deserializer->bytes($stream);
        $dateCreated = $deserializer->int32($stream);
        $dateActive = $deserializer->int32($stream);
        $ip = $deserializer->bytes($stream);
        $country = $deserializer->bytes($stream);
        $region = $deserializer->bytes($stream);
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