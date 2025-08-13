<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/accountDaysTTL
 */
final class AccountDaysTTL extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb8d0afdf;
    
    public string $predicate = 'accountDaysTTL';
    
    /**
     * @param int $days
     */
    public function __construct(
        public readonly int $days
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->days);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $days = Deserializer::int32($stream);

        return new self(
            $days
        );
    }
}