<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputEncryptedChat;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.readEncryptedHistory
 */
final class ReadEncryptedHistoryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2135648522;
    
    public string $_ = 'messages.readEncryptedHistory';
    
    public function getMethodName(): string
    {
        return 'messages.readEncryptedHistory';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputEncryptedChat $peer
     * @param int $maxDate
     */
    public function __construct(
        public readonly AbstractInputEncryptedChat $peer,
        public readonly int $maxDate
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->maxDate);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}