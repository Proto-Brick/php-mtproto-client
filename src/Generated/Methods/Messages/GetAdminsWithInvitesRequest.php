<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ChatAdminsWithInvites;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getAdminsWithInvites
 */
final class GetAdminsWithInvitesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3920e6ef;
    
    public string $predicate = 'messages.getAdminsWithInvites';
    
    public function getMethodName(): string
    {
        return 'messages.getAdminsWithInvites';
    }
    
    public function getResponseClass(): string
    {
        return ChatAdminsWithInvites::class;
    }
    /**
     * @param AbstractInputPeer $peer
     */
    public function __construct(
        public readonly AbstractInputPeer $peer
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