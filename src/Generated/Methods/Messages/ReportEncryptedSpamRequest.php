<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputEncryptedChat;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.reportEncryptedSpam
 */
final class ReportEncryptedSpamRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4b0c8c0f;
    
    public string $_ = 'messages.reportEncryptedSpam';
    
    public function getMethodName(): string
    {
        return 'messages.reportEncryptedSpam';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputEncryptedChat $peer
     */
    public function __construct(
        public readonly InputEncryptedChat $peer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}