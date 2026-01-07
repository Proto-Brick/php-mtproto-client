<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Users;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/users.savedMusicNotModified
 */
final class SavedMusicNotModified extends AbstractSavedMusic
{
    public const CONSTRUCTOR_ID = 0xe3878aa4;
    
    public string $predicate = 'users.savedMusicNotModified';
    
    /**
     * @param int $count
     */
    public function __construct(
        public readonly int $count
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $count = Deserializer::int32($__payload, $__offset);

        return new self(
            $count
        );
    }
}