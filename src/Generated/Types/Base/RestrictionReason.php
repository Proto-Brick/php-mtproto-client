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
    
    public string $predicate = 'restrictionReason';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->platform);
        $buffer .= Serializer::bytes($this->reason);
        $buffer .= Serializer::bytes($this->text);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $platform = Deserializer::bytes($stream);
        $reason = Deserializer::bytes($stream);
        $text = Deserializer::bytes($stream);

        return new self(
            $platform,
            $reason,
            $text
        );
    }
}