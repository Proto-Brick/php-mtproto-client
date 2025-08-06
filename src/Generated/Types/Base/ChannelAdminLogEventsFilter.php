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
    
    public string $_ = 'channelAdminLogEventsFilter';
    
    /**
     * @param bool|null $join
     * @param bool|null $leave
     * @param bool|null $invite
     * @param bool|null $ban
     * @param bool|null $unban
     * @param bool|null $kick
     * @param bool|null $unkick
     * @param bool|null $promote
     * @param bool|null $demote
     * @param bool|null $info
     * @param bool|null $settings
     * @param bool|null $pinned
     * @param bool|null $edit
     * @param bool|null $delete
     * @param bool|null $groupCall
     * @param bool|null $invites
     * @param bool|null $send
     * @param bool|null $forums
     * @param bool|null $subExtend
     */
    public function __construct(
        public readonly ?bool $join = null,
        public readonly ?bool $leave = null,
        public readonly ?bool $invite = null,
        public readonly ?bool $ban = null,
        public readonly ?bool $unban = null,
        public readonly ?bool $kick = null,
        public readonly ?bool $unkick = null,
        public readonly ?bool $promote = null,
        public readonly ?bool $demote = null,
        public readonly ?bool $info = null,
        public readonly ?bool $settings = null,
        public readonly ?bool $pinned = null,
        public readonly ?bool $edit = null,
        public readonly ?bool $delete = null,
        public readonly ?bool $groupCall = null,
        public readonly ?bool $invites = null,
        public readonly ?bool $send = null,
        public readonly ?bool $forums = null,
        public readonly ?bool $subExtend = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
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
        $buffer .= $serializer->int32($flags);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

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