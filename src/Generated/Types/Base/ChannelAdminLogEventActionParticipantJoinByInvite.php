<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionParticipantJoinByInvite
 */
final class ChannelAdminLogEventActionParticipantJoinByInvite extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 4271882584;
    
    public string $_ = 'channelAdminLogEventActionParticipantJoinByInvite';
    
    /**
     * @param AbstractExportedChatInvite $invite
     * @param bool|null $viaChatlist
     */
    public function __construct(
        public readonly AbstractExportedChatInvite $invite,
        public readonly ?bool $viaChatlist = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->viaChatlist) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->invite->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $viaChatlist = ($flags & (1 << 0)) ? true : null;
        $invite = AbstractExportedChatInvite::deserialize($deserializer, $stream);
            return new self(
            $invite,
            $viaChatlist
        );
    }
}