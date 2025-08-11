<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chat
 */
final class Chat extends AbstractChat
{
    public const CONSTRUCTOR_ID = 0x41cbf256;
    
    public string $_ = 'chat';
    
    /**
     * @param int $id
     * @param string $title
     * @param AbstractChatPhoto $photo
     * @param int $participantsCount
     * @param int $date
     * @param int $version
     * @param bool|null $creator
     * @param bool|null $left
     * @param bool|null $deactivated
     * @param bool|null $callActive
     * @param bool|null $callNotEmpty
     * @param bool|null $noforwards
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
        public readonly ?bool $creator = null,
        public readonly ?bool $left = null,
        public readonly ?bool $deactivated = null,
        public readonly ?bool $callActive = null,
        public readonly ?bool $callNotEmpty = null,
        public readonly ?bool $noforwards = null,
        public readonly ?AbstractInputChannel $migratedTo = null,
        public readonly ?ChatAdminRights $adminRights = null,
        public readonly ?ChatBannedRights $defaultBannedRights = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->creator) $flags |= (1 << 0);
        if ($this->left) $flags |= (1 << 2);
        if ($this->deactivated) $flags |= (1 << 5);
        if ($this->callActive) $flags |= (1 << 23);
        if ($this->callNotEmpty) $flags |= (1 << 24);
        if ($this->noforwards) $flags |= (1 << 25);
        if ($this->migratedTo !== null) $flags |= (1 << 6);
        if ($this->adminRights !== null) $flags |= (1 << 14);
        if ($this->defaultBannedRights !== null) $flags |= (1 << 18);
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
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $creator = ($flags & (1 << 0)) ? true : null;
        $left = ($flags & (1 << 2)) ? true : null;
        $deactivated = ($flags & (1 << 5)) ? true : null;
        $callActive = ($flags & (1 << 23)) ? true : null;
        $callNotEmpty = ($flags & (1 << 24)) ? true : null;
        $noforwards = ($flags & (1 << 25)) ? true : null;
        $id = Deserializer::int64($stream);
        $title = Deserializer::bytes($stream);
        $photo = AbstractChatPhoto::deserialize($stream);
        $participantsCount = Deserializer::int32($stream);
        $date = Deserializer::int32($stream);
        $version = Deserializer::int32($stream);
        $migratedTo = ($flags & (1 << 6)) ? AbstractInputChannel::deserialize($stream) : null;
        $adminRights = ($flags & (1 << 14)) ? ChatAdminRights::deserialize($stream) : null;
        $defaultBannedRights = ($flags & (1 << 18)) ? ChatBannedRights::deserialize($stream) : null;
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