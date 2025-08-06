<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/webAuthorization
 */
final class WebAuthorization extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa6f8f452;
    
    public string $_ = 'webAuthorization';
    
    /**
     * @param int $hash
     * @param int $botId
     * @param string $domain
     * @param string $browser
     * @param string $platform
     * @param int $dateCreated
     * @param int $dateActive
     * @param string $ip
     * @param string $region
     */
    public function __construct(
        public readonly int $hash,
        public readonly int $botId,
        public readonly string $domain,
        public readonly string $browser,
        public readonly string $platform,
        public readonly int $dateCreated,
        public readonly int $dateActive,
        public readonly string $ip,
        public readonly string $region
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->hash);
        $buffer .= $serializer->int64($this->botId);
        $buffer .= $serializer->bytes($this->domain);
        $buffer .= $serializer->bytes($this->browser);
        $buffer .= $serializer->bytes($this->platform);
        $buffer .= $serializer->int32($this->dateCreated);
        $buffer .= $serializer->int32($this->dateActive);
        $buffer .= $serializer->bytes($this->ip);
        $buffer .= $serializer->bytes($this->region);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $hash = $deserializer->int64($stream);
        $botId = $deserializer->int64($stream);
        $domain = $deserializer->bytes($stream);
        $browser = $deserializer->bytes($stream);
        $platform = $deserializer->bytes($stream);
        $dateCreated = $deserializer->int32($stream);
        $dateActive = $deserializer->int32($stream);
        $ip = $deserializer->bytes($stream);
        $region = $deserializer->bytes($stream);
        return new self(
            $hash,
            $botId,
            $domain,
            $browser,
            $platform,
            $dateCreated,
            $dateActive,
            $ip,
            $region
        );
    }
}