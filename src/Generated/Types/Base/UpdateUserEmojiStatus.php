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
    
    public string $_ = 'updateUserEmojiStatus';
    
    /**
     * @param int $userId
     * @param AbstractEmojiStatus $emojiStatus
     */
    public function __construct(
        public readonly int $userId,
        public readonly AbstractEmojiStatus $emojiStatus
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $this->emojiStatus->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $userId = $deserializer->int64($stream);
        $emojiStatus = AbstractEmojiStatus::deserialize($deserializer, $stream);
        return new self(
            $userId,
            $emojiStatus
        );
    }
}