<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmojiStatus;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.updateUserEmojiStatus
 */
final class UpdateUserEmojiStatusRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3986632901;
    
    public string $_ = 'bots.updateUserEmojiStatus';
    
    public function getMethodName(): string
    {
        return 'bots.updateUserEmojiStatus';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $userId
     * @param AbstractEmojiStatus $emojiStatus
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly AbstractEmojiStatus $emojiStatus
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize($serializer);
        $buffer .= $this->emojiStatus->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}