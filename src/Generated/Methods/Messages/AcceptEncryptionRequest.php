<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEncryptedChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputEncryptedChat;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.acceptEncryption
 */
final class AcceptEncryptionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1035731989;
    
    public string $_ = 'messages.acceptEncryption';
    
    public function getMethodName(): string
    {
        return 'messages.acceptEncryption';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEncryptedChat::class;
    }
    /**
     * @param AbstractInputEncryptedChat $peer
     * @param string $gB
     * @param int $keyFingerprint
     */
    public function __construct(
        public readonly AbstractInputEncryptedChat $peer,
        public readonly string $gB,
        public readonly int $keyFingerprint
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->gB);
        $buffer .= $serializer->int64($this->keyFingerprint);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}