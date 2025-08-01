<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmojiStatus;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.emojiStatuses
 */
final class EmojiStatuses extends AbstractEmojiStatuses
{
    public const CONSTRUCTOR_ID = 2428790737;
    
    public string $_ = 'account.emojiStatuses';
    
    /**
     * @param int $hash
     * @param list<AbstractEmojiStatus> $statuses
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $statuses
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->hash);
        $buffer .= $serializer->vectorOfObjects($this->statuses);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->int64($stream);
        $statuses = $deserializer->vectorOfObjects($stream, [AbstractEmojiStatus::class, 'deserialize']);
            return new self(
            $hash,
            $statuses
        );
    }
}