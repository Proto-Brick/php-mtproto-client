<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatBannedRights;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.editChatDefaultBannedRights
 */
final class EditChatDefaultBannedRightsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa5866b41;
    
    public string $_ = 'messages.editChatDefaultBannedRights';
    
    public function getMethodName(): string
    {
        return 'messages.editChatDefaultBannedRights';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param ChatBannedRights $bannedRights
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ChatBannedRights $bannedRights
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->bannedRights->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}