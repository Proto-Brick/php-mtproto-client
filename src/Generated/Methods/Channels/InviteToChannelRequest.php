<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Messages\InvitedUsers;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.inviteToChannel
 */
final class InviteToChannelRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc9e33d54;
    
    public string $_ = 'channels.inviteToChannel';
    
    public function getMethodName(): string
    {
        return 'channels.inviteToChannel';
    }
    
    public function getResponseClass(): string
    {
        return InvitedUsers::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param list<AbstractInputUser> $users
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}