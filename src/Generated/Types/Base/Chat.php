<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/chat
 */
final class Chat extends AbstractChat implements PeerEntity
{
    public const CONSTRUCTOR_ID = 0x41cbf256;
    
    public string $predicate = 'chat';
    
    public function getPeerType(): string
    {
        return 'chat';
    }
    /**
     * @param int $id
     * @param string $title
     * @param AbstractChatPhoto $photo
     * @param int $participantsCount
     * @param int $date
     * @param int $version
     * @param true|null $creator
     * @param true|null $left
     * @param true|null $deactivated
     * @param true|null $callActive
     * @param true|null $callNotEmpty
     * @param true|null $noforwards
     * @param AbstractInputChannel|null $migratedTo
     * @param ChatAdminRights|null $adminRights
     * @param ChatBannedRights|null $defaultBannedRights
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly AbstractChatPhoto $photo,
        public readonly int $participantsCount,
        public readonly int $date,
        public readonly int $version,
        public readonly ?true $creator = null,
        public readonly ?true $left = null,
        public readonly ?true $deactivated = null,
        public readonly ?true $callActive = null,
        public readonly ?true $callNotEmpty = null,
        public readonly ?true $noforwards = null,
        public readonly ?AbstractInputChannel $migratedTo = null,
        public readonly ?ChatAdminRights $adminRights = null,
        public readonly ?ChatBannedRights $defaultBannedRights = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->creator) {
            $flags |= (1 << 0);
        }
        if ($this->left) {
            $flags |= (1 << 2);
        }
        if ($this->deactivated) {
            $flags |= (1 << 5);
        }
        if ($this->callActive) {
            $flags |= (1 << 23);
        }
        if ($this->callNotEmpty) {
            $flags |= (1 << 24);
        }
        if ($this->noforwards) {
            $flags |= (1 << 25);
        }
        if ($this->migratedTo !== null) {
            $flags |= (1 << 6);
        }
        if ($this->adminRights !== null) {
            $flags |= (1 << 14);
        }
        if ($this->defaultBannedRights !== null) {
            $flags |= (1 << 18);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= $this->photo->serialize();
        $buffer .= Serializer::int32($this->participantsCount);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->version);
        if ($flags & (1 << 6)) {
            $buffer .= $this->migratedTo->serialize();
        }
        if ($flags & (1 << 14)) {
            $buffer .= $this->adminRights->serialize();
        }
        if ($flags & (1 << 18)) {
            $buffer .= $this->defaultBannedRights->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $creator = (($flags & (1 << 0)) !== 0) ? true : null;
        $left = (($flags & (1 << 2)) !== 0) ? true : null;
        $deactivated = (($flags & (1 << 5)) !== 0) ? true : null;
        $callActive = (($flags & (1 << 23)) !== 0) ? true : null;
        $callNotEmpty = (($flags & (1 << 24)) !== 0) ? true : null;
        $noforwards = (($flags & (1 << 25)) !== 0) ? true : null;
        $id = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $title = Deserializer::bytes($stream);
        $photo = AbstractChatPhoto::deserialize($stream);
        $participantsCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $version = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $migratedTo = (($flags & (1 << 6)) !== 0) ? AbstractInputChannel::deserialize($stream) : null;
        $adminRights = (($flags & (1 << 14)) !== 0) ? ChatAdminRights::deserialize($stream) : null;
        $defaultBannedRights = (($flags & (1 << 18)) !== 0) ? ChatBannedRights::deserialize($stream) : null;

        return new self(
            $id,
            $title,
            $photo,
            $participantsCount,
            $date,
            $version,
            $creator,
            $left,
            $deactivated,
            $callActive,
            $callNotEmpty,
            $noforwards,
            $migratedTo,
            $adminRights,
            $defaultBannedRights
        );
    }
}