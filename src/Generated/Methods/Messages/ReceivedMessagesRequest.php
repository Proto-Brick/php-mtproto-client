<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\ReceivedNotifyMessage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.receivedMessages
 */
final class ReceivedMessagesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5a954c0;
    
    public string $predicate = 'messages.receivedMessages';
    
    public function getMethodName(): string
    {
        return 'messages.receivedMessages';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . ReceivedNotifyMessage::class . '>';
    }
    /**
     * @param int $maxId
     */
    public function __construct(
        public readonly int $maxId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->maxId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}