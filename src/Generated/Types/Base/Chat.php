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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
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
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $this->photo->serialize($serializer);
        $buffer .= $serializer->int32($this->participantsCount);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int32($this->version);
        if ($flags & (1 << 6)) {
            $buffer .= $this->migratedTo->serialize($serializer);
        }
        if ($flags & (1 << 14)) {
            $buffer .= $this->adminRights->serialize($serializer);
        }
        if ($flags & (1 << 18)) {
            $buffer .= $this->defaultBannedRights->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $creator = ($flags & (1 << 0)) ? true : null;
        $left = ($flags & (1 << 2)) ? true : null;
        $deactivated = ($flags & (1 << 5)) ? true : null;
        $callActive = ($flags & (1 << 23)) ? true : null;
        $callNotEmpty = ($flags & (1 << 24)) ? true : null;
        $noforwards = ($flags & (1 << 25)) ? true : null;
        $id = $deserializer->int64($stream);
        $title = $deserializer->bytes($stream);
        $photo = AbstractChatPhoto::deserialize($deserializer, $stream);
        $participantsCount = $deserializer->int32($stream);
        $date = $deserializer->int32($stream);
        $version = $deserializer->int32($stream);
        $migratedTo = ($flags & (1 << 6)) ? AbstractInputChannel::deserialize($deserializer, $stream) : null;
        $adminRights = ($flags & (1 << 14)) ? ChatAdminRights::deserialize($deserializer, $stream) : null;
        $defaultBannedRights = ($flags & (1 << 18)) ? ChatBannedRights::deserialize($deserializer, $stream) : null;
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