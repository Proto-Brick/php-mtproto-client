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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::int64($this->botId);
        $buffer .= Serializer::bytes($this->domain);
        $buffer .= Serializer::bytes($this->browser);
        $buffer .= Serializer::bytes($this->platform);
        $buffer .= Serializer::int32($this->dateCreated);
        $buffer .= Serializer::int32($this->dateActive);
        $buffer .= Serializer::bytes($this->ip);
        $buffer .= Serializer::bytes($this->region);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $hash = Deserializer::int64($stream);
        $botId = Deserializer::int64($stream);
        $domain = Deserializer::bytes($stream);
        $browser = Deserializer::bytes($stream);
        $platform = Deserializer::bytes($stream);
        $dateCreated = Deserializer::int32($stream);
        $dateActive = Deserializer::int32($stream);
        $ip = Deserializer::bytes($stream);
        $region = Deserializer::bytes($stream);
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