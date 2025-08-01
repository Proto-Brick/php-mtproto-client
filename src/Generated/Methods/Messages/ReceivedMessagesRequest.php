<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReceivedNotifyMessage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.receivedMessages
 */
final class ReceivedMessagesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 94983360;
    
    public string $_ = 'messages.receivedMessages';
    
    public function getMethodName(): string
    {
        return 'messages.receivedMessages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractReceivedNotifyMessage::class;
    }
    /**
     * @param int $maxId
     */
    public function __construct(
        public readonly int $maxId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->maxId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}