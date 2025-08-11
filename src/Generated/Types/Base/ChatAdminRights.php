<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatAdminRights
 */
final class ChatAdminRights extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5fb224d5;
    
    public string $_ = 'chatAdminRights';
    
    /**
     * @param bool|null $changeInfo
     * @param bool|null $postMessages
     * @param bool|null $editMessages
     * @param bool|null $deleteMessages
     * @param bool|null $banUsers
     * @param bool|null $inviteUsers
     * @param bool|null $pinMessages
     * @param bool|null $addAdmins
     * @param bool|null $anonymous
     * @param bool|null $manageCall
     * @param bool|null $other
     * @param bool|null $manageTopics
     * @param bool|null $postStories
     * @param bool|null $editStories
     * @param bool|null $deleteStories
     */
    public function __construct(
        public readonly ?bool $changeInfo = null,
        public readonly ?bool $postMessages = null,
        public readonly ?bool $editMessages = null,
        public readonly ?bool $deleteMessages = null,
        public readonly ?bool $banUsers = null,
        public readonly ?bool $inviteUsers = null,
        public readonly ?bool $pinMessages = null,
        public readonly ?bool $addAdmins = null,
        public readonly ?bool $anonymous = null,
        public readonly ?bool $manageCall = null,
        public readonly ?bool $other = null,
        public readonly ?bool $manageTopics = null,
        public readonly ?bool $postStories = null,
        public readonly ?bool $editStories = null,
        public readonly ?bool $deleteStories = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->changeInfo) $flags |= (1 << 0);
        if ($this->postMessages) $flags |= (1 << 1);
        if ($this->editMessages) $flags |= (1 << 2);
        if ($this->deleteMessages) $flags |= (1 << 3);
        if ($this->banUsers) $flags |= (1 << 4);
        if ($this->inviteUsers) $flags |= (1 << 5);
        if ($this->pinMessages) $flags |= (1 << 7);
        if ($this->addAdmins) $flags |= (1 << 9);
        if ($this->anonymous) $flags |= (1 << 10);
        if ($this->manageCall) $flags |= (1 << 11);
        if ($this->other) $flags |= (1 << 12);
        if ($this->manageTopics) $flags |= (1 << 13);
        if ($this->postStories) $flags |= (1 << 14);
        if ($this->editStories) $flags |= (1 << 15);
        if ($this->deleteStories) $flags |= (1 << 16);
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $changeInfo = ($flags & (1 << 0)) ? true : null;
        $postMessages = ($flags & (1 << 1)) ? true : null;
        $editMessages = ($flags & (1 << 2)) ? true : null;
        $deleteMessages = ($flags & (1 << 3)) ? true : null;
        $banUsers = ($flags & (1 << 4)) ? true : null;
        $inviteUsers = ($flags & (1 << 5)) ? true : null;
        $pinMessages = ($flags & (1 << 7)) ? true : null;
        $addAdmins = ($flags & (1 << 9)) ? true : null;
        $anonymous = ($flags & (1 << 10)) ? true : null;
        $manageCall = ($flags & (1 << 11)) ? true : null;
        $other = ($flags & (1 << 12)) ? true : null;
        $manageTopics = ($flags & (1 << 13)) ? true : null;
        $postStories = ($flags & (1 << 14)) ? true : null;
        $editStories = ($flags & (1 << 15)) ? true : null;
        $deleteStories = ($flags & (1 << 16)) ? true : null;
        return new self(
            $changeInfo,
            $postMessages,
            $editMessages,
            $deleteMessages,
            $banUsers,
            $inviteUsers,
            $pinMessages,
            $addAdmins,
            $anonymous,
            $manageCall,
            $other,
            $manageTopics,
            $postStories,
            $editStories,
            $deleteStories
        );
    }
}