<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/chatAdminRights
 */
final class ChatAdminRights extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5fb224d5;
    
    public string $predicate = 'chatAdminRights';
    
    /**
     * @param true|null $changeInfo
     * @param true|null $postMessages
     * @param true|null $editMessages
     * @param true|null $deleteMessages
     * @param true|null $banUsers
     * @param true|null $inviteUsers
     * @param true|null $pinMessages
     * @param true|null $addAdmins
     * @param true|null $anonymous
     * @param true|null $manageCall
     * @param true|null $other
     * @param true|null $manageTopics
     * @param true|null $postStories
     * @param true|null $editStories
     * @param true|null $deleteStories
     * @param true|null $manageDirectMessages
     */
    public function __construct(
        public readonly ?true $changeInfo = null,
        public readonly ?true $postMessages = null,
        public readonly ?true $editMessages = null,
        public readonly ?true $deleteMessages = null,
        public readonly ?true $banUsers = null,
        public readonly ?true $inviteUsers = null,
        public readonly ?true $pinMessages = null,
        public readonly ?true $addAdmins = null,
        public readonly ?true $anonymous = null,
        public readonly ?true $manageCall = null,
        public readonly ?true $other = null,
        public readonly ?true $manageTopics = null,
        public readonly ?true $postStories = null,
        public readonly ?true $editStories = null,
        public readonly ?true $deleteStories = null,
        public readonly ?true $manageDirectMessages = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->changeInfo) {
            $flags |= (1 << 0);
        }
        if ($this->postMessages) {
            $flags |= (1 << 1);
        }
        if ($this->editMessages) {
            $flags |= (1 << 2);
        }
        if ($this->deleteMessages) {
            $flags |= (1 << 3);
        }
        if ($this->banUsers) {
            $flags |= (1 << 4);
        }
        if ($this->inviteUsers) {
            $flags |= (1 << 5);
        }
        if ($this->pinMessages) {
            $flags |= (1 << 7);
        }
        if ($this->addAdmins) {
            $flags |= (1 << 9);
        }
        if ($this->anonymous) {
            $flags |= (1 << 10);
        }
        if ($this->manageCall) {
            $flags |= (1 << 11);
        }
        if ($this->other) {
            $flags |= (1 << 12);
        }
        if ($this->manageTopics) {
            $flags |= (1 << 13);
        }
        if ($this->postStories) {
            $flags |= (1 << 14);
        }
        if ($this->editStories) {
            $flags |= (1 << 15);
        }
        if ($this->deleteStories) {
            $flags |= (1 << 16);
        }
        if ($this->manageDirectMessages) {
            $flags |= (1 << 17);
        }
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $changeInfo = (($flags & (1 << 0)) !== 0) ? true : null;
        $postMessages = (($flags & (1 << 1)) !== 0) ? true : null;
        $editMessages = (($flags & (1 << 2)) !== 0) ? true : null;
        $deleteMessages = (($flags & (1 << 3)) !== 0) ? true : null;
        $banUsers = (($flags & (1 << 4)) !== 0) ? true : null;
        $inviteUsers = (($flags & (1 << 5)) !== 0) ? true : null;
        $pinMessages = (($flags & (1 << 7)) !== 0) ? true : null;
        $addAdmins = (($flags & (1 << 9)) !== 0) ? true : null;
        $anonymous = (($flags & (1 << 10)) !== 0) ? true : null;
        $manageCall = (($flags & (1 << 11)) !== 0) ? true : null;
        $other = (($flags & (1 << 12)) !== 0) ? true : null;
        $manageTopics = (($flags & (1 << 13)) !== 0) ? true : null;
        $postStories = (($flags & (1 << 14)) !== 0) ? true : null;
        $editStories = (($flags & (1 << 15)) !== 0) ? true : null;
        $deleteStories = (($flags & (1 << 16)) !== 0) ? true : null;
        $manageDirectMessages = (($flags & (1 << 17)) !== 0) ? true : null;

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
            $deleteStories,
            $manageDirectMessages
        );
    }
}