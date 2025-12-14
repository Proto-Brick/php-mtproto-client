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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $hash = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $ringtones = Deserializer::vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);

        return new self(
            $hash,
            $ringtones
        );
    }
}