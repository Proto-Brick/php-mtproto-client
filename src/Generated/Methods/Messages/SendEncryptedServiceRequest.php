<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputEncryptedChat;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractSentEncryptedMessage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.sendEncryptedService
 */
final class SendEncryptedServiceRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 852769188;
    
    public string $_ = 'messages.sendEncryptedService';
    
    public function getMethodName(): string
    {
        return 'messages.sendEncryptedService';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSentEncryptedMessage::class;
    }
    /**
     * @param AbstractInputEncryptedChat $peer
     * @param int $randomId
     * @param string $data
     */
    public function __construct(
        public readonly AbstractInputEncryptedChat $peer,
        public readonly int $randomId,
        public readonly string $data
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int64($this->randomId);
        $buffer .= $serializer->bytes($this->data);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}