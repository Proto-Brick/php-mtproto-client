<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

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
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
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