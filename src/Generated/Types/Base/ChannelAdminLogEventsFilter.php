<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventsFilter
 */
final class ChannelAdminLogEventsFilter extends TlObject
{
    public const CONSTRUCTOR_ID = 0xea107ae4;
    
    public string $predicate = 'channelAdminLogEventsFilter';
    
    /**
     * @param true|null $join
     * @param true|null $leave
     * @param true|null $invite
     * @param true|null $ban
     * @param true|null $unban
     * @param true|null $kick
     * @param true|null $unkick
     * @param true|null $promote
     * @param true|null $demote
     * @param true|null $info
     * @param true|null $settings
     * @param true|null $pinned
     * @param true|null $edit
     * @param true|null $delete
     * @param true|null $groupCall
     * @param true|null $invites
     * @param true|null $send
     * @param true|null $forums
     * @param true|null $subExtend
     */
    public function __construct(
        public readonly ?true $join = null,
        public readonly ?true $leave = null,
        public readonly ?true $invite = null,
        public readonly ?true $ban = null,
        public readonly ?true $unban = null,
        public readonly ?true $kick = null,
        public readonly ?true $unkick = null,
        public readonly ?true $promote = null,
        public readonly ?true $demote = null,
        public readonly ?true $info = null,
        public readonly ?true $settings = null,
        public readonly ?true $pinned = null,
        public readonly ?true $edit = null,
        public readonly ?true $delete = null,
        public readonly ?true $groupCall = null,
        public readonly ?true $invites = null,
        public readonly ?true $send = null,
        public readonly ?true $forums = null,
        public readonly ?true $subExtend = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->join) $flags |= (1 << 0);
        if ($this->leave) $flags |= (1 << 1);
        if ($this->invite) $flags |= (1 << 2);
        if ($this->ban) $flags |= (1 << 3);
        if ($this->unban) $flags |= (1 << 4);
        if ($this->kick) $flags |= (1 << 5);
        if ($this->unkick) $flags |= (1 << 6);
        if ($this->promote) $flags |= (1 << 7);
        if ($this->demote) $flags |= (1 << 8);
        if ($this->info) $flags |= (1 << 9);
        if ($this->settings) $flags |= (1 << 10);
        if ($this->pinned) $flags |= (1 << 11);
        if ($this->edit) $flags |= (1 << 12);
        if ($this->delete) $flags |= (1 << 13);
        if ($this->groupCall) $flags |= (1 << 14);
        if ($this->invites) $flags |= (1 << 15);
        if ($this->send) $flags |= (1 << 16);
        if ($this->forums) $flags |= (1 << 17);
        if ($this->subExtend) $flags |= (1 << 18);
        $buffer .= Serializer::int32($flags);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $join = ($flags & (1 << 0)) ? true : null;
        $leave = ($flags & (1 << 1)) ? true : null;
        $invite = ($flags & (1 << 2)) ? true : null;
        $ban = ($flags & (1 << 3)) ? true : null;
        $unban = ($flags & (1 << 4)) ? true : null;
        $kick = ($flags & (1 << 5)) ? true : null;
        $unkick = ($flags & (1 << 6)) ? true : null;
        $promote = ($flags & (1 << 7)) ? true : null;
        $demote = ($flags & (1 << 8)) ? true : null;
        $info = ($flags & (1 << 9)) ? true : null;
        $settings = ($flags & (1 << 10)) ? true : null;
        $pinned = ($flags & (1 << 11)) ? true : null;
        $edit = ($flags & (1 << 12)) ? true : null;
        $delete = ($flags & (1 << 13)) ? true : null;
        $groupCall = ($flags & (1 << 14)) ? true : null;
        $invites = ($flags & (1 << 15)) ? true : null;
        $send = ($flags & (1 << 16)) ? true : null;
        $forums = ($flags & (1 << 17)) ? true : null;
        $subExtend = ($flags & (1 << 18)) ? true : null;

        return new self(
            $join,
            $leave,
            $invite,
            $ban,
            $unban,
            $kick,
            $unkick,
            $promote,
            $demote,
            $info,
            $settings,
            $pinned,
            $edit,
            $delete,
            $groupCall,
            $invites,
            $send,
            $forums,
            $subExtend
        );
    }
}