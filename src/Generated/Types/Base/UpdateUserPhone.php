<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateUserPhone
 */
final class UpdateUserPhone extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x5492a13;
    
    public string $predicate = 'updateUserPhone';
    
    /**
     * @param int $userId
     * @param string $phone
     */
    public function __construct(
        public readonly int $userId,
        public readonly string $phone
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::bytes($this->phone);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $userId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $phone = Deserializer::bytes($stream);

        return new self(
            $userId,
            $phone
        );
    }
}