<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Phone;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/phone.groupCallStreamRtmpUrl
 */
final class GroupCallStreamRtmpUrl extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2dbf3432;
    
    public string $_ = 'phone.groupCallStreamRtmpUrl';
    
    /**
     * @param string $url
     * @param string $key
     */
    public function __construct(
        public readonly string $url,
        public readonly string $key
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::bytes($this->key);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $url = Deserializer::bytes($stream);
        $key = Deserializer::bytes($stream);
        return new self(
            $url,
            $key
        );
    }
}