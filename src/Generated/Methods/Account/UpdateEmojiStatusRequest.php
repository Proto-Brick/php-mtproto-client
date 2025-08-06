<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmojiStatus;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updateEmojiStatus
 */
final class UpdateEmojiStatusRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfbd3de6b;
    
    public string $_ = 'account.updateEmojiStatus';
    
    public function getMethodName(): string
    {
        return 'account.updateEmojiStatus';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractEmojiStatus $emojiStatus
     */
    public function __construct(
        public readonly AbstractEmojiStatus $emojiStatus
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->emojiStatus->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}