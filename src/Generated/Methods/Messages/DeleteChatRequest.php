<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.deleteChat
 */
final class DeleteChatRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5bd0ee50;
    
    public string $_ = 'messages.deleteChat';
    
    public function getMethodName(): string
    {
        return 'messages.deleteChat';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $chatId
     */
    public function __construct(
        public readonly int $chatId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->chatId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}