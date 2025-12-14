<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/inputStarsTransaction
 */
final class InputStarsTransaction extends TlObject
{
    public const CONSTRUCTOR_ID = 0x206ae6d1;
    
    public string $predicate = 'inputStarsTransaction';
    
    /**
     * @param string $id
     * @param true|null $refund
     */
    public function __construct(
        public readonly string $id,
        public readonly ?true $refund = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->refund) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->id);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $refund = (($flags & (1 << 0)) !== 0) ? true : null;
        $id = Deserializer::bytes($stream);

        return new self(
            $id,
            $refund
        );
    }
}