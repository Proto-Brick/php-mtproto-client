<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/bankCardOpenUrl
 */
final class BankCardOpenUrl extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf568028a;
    
    public string $predicate = 'bankCardOpenUrl';
    
    /**
     * @param string $url
     * @param string $name
     */
    public function __construct(
        public readonly string $url,
        public readonly string $name
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::bytes($this->name);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $url = Deserializer::bytes($__payload, $__offset);
        $name = Deserializer::bytes($__payload, $__offset);

        return new self(
            $url,
            $name
        );
    }
}