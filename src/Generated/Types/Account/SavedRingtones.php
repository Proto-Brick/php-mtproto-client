<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/account.savedRingtones
 */
final class SavedRingtones extends AbstractSavedRingtones
{
    public const CONSTRUCTOR_ID = 0xc1e92cc5;
    
    public string $predicate = 'account.savedRingtones';
    
    /**
     * @param int $hash
     * @param list<AbstractDocument> $ringtones
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $ringtones
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->ringtones);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $hash = Deserializer::int64($__payload, $__offset);
        $ringtones = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractDocument::class, 'deserialize']);

        return new self(
            $hash,
            $ringtones
        );
    }
}