<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputEncryptedChat;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.readEncryptedHistory
 */
final class ReadEncryptedHistoryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7f4b690a;
    
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
     * @param InputEncryptedChat $peer
     * @param int $maxDate
     */
    public function __construct(
        public readonly InputEncryptedChat $peer,
        public readonly int $maxDate
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->maxDate);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}