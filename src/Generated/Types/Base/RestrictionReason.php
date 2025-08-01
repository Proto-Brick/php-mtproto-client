<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/restrictionReason
 */
final class RestrictionReason extends AbstractRestrictionReason
{
    public const CONSTRUCTOR_ID = 3497176244;
    
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
        $deserializer->int32($stream); // Constructor ID is consumed here.
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