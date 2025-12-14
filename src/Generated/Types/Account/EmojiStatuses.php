<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmojiStatus;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/account.emojiStatuses
 */
final class EmojiStatuses extends AbstractEmojiStatuses
{
    public const CONSTRUCTOR_ID = 0x90c467d1;
    
    public string $predicate = 'account.emojiStatuses';
    
    /**
     * @param int $hash
     * @param list<AbstractEmojiStatus> $statuses
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $statuses
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->statuses);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $hash = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $statuses = Deserializer::vectorOfObjects($stream, [AbstractEmojiStatus::class, 'deserialize']);

        return new self(
            $hash,
            $statuses
        );
    }
}