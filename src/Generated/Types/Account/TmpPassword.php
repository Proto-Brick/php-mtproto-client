<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/account.tmpPassword
 */
final class TmpPassword extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdb64fd34;
    
    public string $predicate = 'account.tmpPassword';
    
    /**
     * @param string $tmpPassword
     * @param int $validUntil
     */
    public function __construct(
        public readonly string $tmpPassword,
        public readonly int $validUntil
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->tmpPassword);
        $buffer .= Serializer::int32($this->validUntil);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $tmpPassword = Deserializer::bytes($stream);
        $validUntil = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $tmpPassword,
            $validUntil
        );
    }
}