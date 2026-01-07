<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Phone;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/phone.groupCallStreamRtmpUrl
 */
final class GroupCallStreamRtmpUrl extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2dbf3432;
    
    public string $predicate = 'phone.groupCallStreamRtmpUrl';
    
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $url = Deserializer::bytes($__payload, $__offset);
        $key = Deserializer::bytes($__payload, $__offset);

        return new self(
            $url,
            $key
        );
    }
}