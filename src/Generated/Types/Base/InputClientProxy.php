<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/inputClientProxy
 */
final class InputClientProxy extends TlObject
{
    public const CONSTRUCTOR_ID = 0x75588b3f;
    
    public string $predicate = 'inputClientProxy';
    
    /**
     * @param string $address
     * @param int $port
     */
    public function __construct(
        public readonly string $address,
        public readonly int $port
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->address);
        $buffer .= Serializer::int32($this->port);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $address = Deserializer::bytes($stream);
        $port = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $address,
            $port
        );
    }
}