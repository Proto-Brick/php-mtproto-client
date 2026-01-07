<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/account.savedMusicIds
 */
final class SavedMusicIds extends AbstractSavedMusicIds
{
    public const CONSTRUCTOR_ID = 0x998d6636;
    
    public string $predicate = 'account.savedMusicIds';
    
    /**
     * @param list<int> $ids
     */
    public function __construct(
        public readonly array $ids
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfLongs($this->ids);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $ids = Deserializer::vectorOfLongs($__payload, $__offset);

        return new self(
            $ids
        );
    }
}