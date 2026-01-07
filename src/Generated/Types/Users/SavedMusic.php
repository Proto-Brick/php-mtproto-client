<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Users;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/users.savedMusic
 */
final class SavedMusic extends AbstractSavedMusic
{
    public const CONSTRUCTOR_ID = 0x34a2f297;
    
    public string $predicate = 'users.savedMusic';
    
    /**
     * @param int $count
     * @param list<AbstractDocument> $documents
     */
    public function __construct(
        public readonly int $count,
        public readonly array $documents
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->documents);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $count = Deserializer::int32($__payload, $__offset);
        $documents = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractDocument::class, 'deserialize']);

        return new self(
            $count,
            $documents
        );
    }
}