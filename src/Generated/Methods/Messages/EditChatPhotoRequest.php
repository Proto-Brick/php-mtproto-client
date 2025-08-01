<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChatPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.editChatPhoto
 */
final class EditChatPhotoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 903730804;
    
    public string $_ = 'messages.editChatPhoto';
    
    public function getMethodName(): string
    {
        return 'messages.editChatPhoto';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param int $chatId
     * @param AbstractInputChatPhoto $photo
     */
    public function __construct(
        public readonly int $chatId,
        public readonly AbstractInputChatPhoto $photo
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->chatId);
        $buffer .= $this->photo->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}