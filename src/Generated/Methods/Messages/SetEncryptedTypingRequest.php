<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputEncryptedChat;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.setEncryptedTyping
 */
final class SetEncryptedTypingRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x791451ed;
    
    public string $_ = 'messages.setEncryptedTyping';
    
    public function getMethodName(): string
    {
        return 'messages.setEncryptedTyping';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputEncryptedChat $peer
     * @param bool $typing
     */
    public function __construct(
        public readonly InputEncryptedChat $peer,
        public readonly bool $typing
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= ($this->typing ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}