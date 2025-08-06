<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEncryptedChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.requestEncryption
 */
final class RequestEncryptionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf64daf43;
    
    public string $_ = 'messages.requestEncryption';
    
    public function getMethodName(): string
    {
        return 'messages.requestEncryption';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEncryptedChat::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param int $randomId
     * @param string $gA
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly int $randomId,
        public readonly string $gA
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize($serializer);
        $buffer .= $serializer->int32($this->randomId);
        $buffer .= $serializer->bytes($this->gA);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}