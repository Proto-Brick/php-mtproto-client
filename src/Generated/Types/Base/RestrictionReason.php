<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/restrictionReason
 */
final class RestrictionReason extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd072acb4;
    
    public string $_ = 'restrictionReason';
    
    /**
     * @param string $platform
     * @param string $reason
     * @param string $text
     */
    public function __construct(
        public readonly string $platform,
        public readonly string $reason,
        public readonly string $text
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->platform);
        $buffer .= $serializer->bytes($this->reason);
        $buffer .= $serializer->bytes($this->text);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $platform = $deserializer->bytes($stream);
        $reason = $deserializer->bytes($stream);
        $text = $deserializer->bytes($stream);
        return new self(
            $platform,
            $reason,
            $text
        );
    }
}