<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateUserEmojiStatus
 */
final class UpdateUserEmojiStatus extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x28373599;
    
    public string $predicate = 'updateUserEmojiStatus';
    
    /**
     * @param int $userId
     * @param AbstractEmojiStatus $emojiStatus
     */
    public function __construct(
        public readonly int $userId,
        public readonly AbstractEmojiStatus $emojiStatus
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= $this->emojiStatus->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $userId = Deserializer::int64($stream);
        $emojiStatus = AbstractEmojiStatus::deserialize($stream);

        return new self(
            $userId,
            $emojiStatus
        );
    }
}