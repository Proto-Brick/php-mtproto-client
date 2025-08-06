<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractExportedChatInvite;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getExportedChatInvite
 */
final class GetExportedChatInviteRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x73746f5c;
    
    public string $_ = 'messages.getExportedChatInvite';
    
    public function getMethodName(): string
    {
        return 'messages.getExportedChatInvite';
    }
    
    public function getResponseClass(): string
    {
        return AbstractExportedChatInvite::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $link
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $link
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->link);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}