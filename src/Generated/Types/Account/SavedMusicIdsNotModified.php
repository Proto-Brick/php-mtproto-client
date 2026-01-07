<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/account.savedMusicIdsNotModified
 */
final class SavedMusicIdsNotModified extends AbstractSavedMusicIds
{
    public const CONSTRUCTOR_ID = 0x4fc81d6e;
    
    public string $predicate = 'account.savedMusicIdsNotModified';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID

        return new self();
    }
}