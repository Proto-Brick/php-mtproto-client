<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputEncryptedChat;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractSentEncryptedMessage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.sendEncryptedService
 */
final class SendEncryptedServiceRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x32d439a4;
    
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
     * @param InputEncryptedChat $peer
     * @param int $randomId
     * @param string $data
     */
    public function __construct(
        public readonly InputEncryptedChat $peer,
        public readonly int $randomId,
        public readonly string $data
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->randomId);
        $buffer .= Serializer::bytes($this->data);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}