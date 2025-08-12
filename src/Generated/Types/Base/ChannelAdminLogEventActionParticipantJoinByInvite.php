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
    public const CONSTRUCTOR_ID = 0xfe9fc158;
    
    public string $predicate = 'channelAdminLogEventActionParticipantJoinByInvite';
    
    /**
     * @param AbstractExportedChatInvite $invite
     * @param true|null $viaChatlist
     */
    public function __construct(
        public readonly AbstractExportedChatInvite $invite,
        public readonly ?true $viaChatlist = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->viaChatlist) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->invite->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $viaChatlist = ($flags & (1 << 0)) ? true : null;
        $invite = AbstractExportedChatInvite::deserialize($stream);

        return new self(
            $invite,
            $viaChatlist
        );
    }
}