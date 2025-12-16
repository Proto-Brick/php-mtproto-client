<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/fileHash
 */
final class FileHash extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf39b035c;
    
    public string $predicate = 'fileHash';
    
    /**
     * @param int $offset
     * @param int $limit
     * @param string $hash
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $limit,
        public readonly string $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->offset);
        $buffer .= Serializer::int32($this->limit);
        $buffer .= Serializer::bytes($this->hash);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $offset = Deserializer::int64($stream);
        $limit = Deserializer::int32($stream);
        $hash = Deserializer::bytes($stream);

        return new self(
            $offset,
            $limit,
            $hash
        );
    }
}