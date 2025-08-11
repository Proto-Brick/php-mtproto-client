<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatBannedRights
 */
final class ChatBannedRights extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9f120418;
    
    public string $_ = 'chatBannedRights';
    
    /**
     * @param int $untilDate
     * @param bool|null $viewMessages
     * @param bool|null $sendMessages
     * @param bool|null $sendMedia
     * @param bool|null $sendStickers
     * @param bool|null $sendGifs
     * @param bool|null $sendGames
     * @param bool|null $sendInline
     * @param bool|null $embedLinks
     * @param bool|null $sendPolls
     * @param bool|null $changeInfo
     * @param bool|null $inviteUsers
     * @param bool|null $pinMessages
     * @param bool|null $manageTopics
     * @param bool|null $sendPhotos
     * @param bool|null $sendVideos
     * @param bool|null $sendRoundvideos
     * @param bool|null $sendAudios
     * @param bool|null $sendVoices
     * @param bool|null $sendDocs
     * @param bool|null $sendPlain
     */
    public function __construct(
        public readonly int $untilDate,
        public readonly ?bool $viewMessages = null,
        public readonly ?bool $sendMessages = null,
        public readonly ?bool $sendMedia = null,
        public readonly ?bool $sendStickers = null,
        public readonly ?bool $sendGifs = null,
        public readonly ?bool $sendGames = null,
        public readonly ?bool $sendInline = null,
        public readonly ?bool $embedLinks = null,
        public readonly ?bool $sendPolls = null,
        public readonly ?bool $changeInfo = null,
        public readonly ?bool $inviteUsers = null,
        public readonly ?bool $pinMessages = null,
        public readonly ?bool $manageTopics = null,
        public readonly ?bool $sendPhotos = null,
        public readonly ?bool $sendVideos = null,
        public readonly ?bool $sendRoundvideos = null,
        public readonly ?bool $sendAudios = null,
        public readonly ?bool $sendVoices = null,
        public readonly ?bool $sendDocs = null,
        public readonly ?bool $sendPlain = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->viewMessages) $flags |= (1 << 0);
        if ($this->sendMessages) $flags |= (1 << 1);
        if ($this->sendMedia) $flags |= (1 << 2);
        if ($this->sendStickers) $flags |= (1 << 3);
        if ($this->sendGifs) $flags |= (1 << 4);
        if ($this->sendGames) $flags |= (1 << 5);
        if ($this->sendInline) $flags |= (1 << 6);
        if ($this->embedLinks) $flags |= (1 << 7);
        if ($this->sendPolls) $flags |= (1 << 8);
        if ($this->changeInfo) $flags |= (1 << 10);
        if ($this->inviteUsers) $flags |= (1 << 15);
        if ($this->pinMessages) $flags |= (1 << 17);
        if ($this->manageTopics) $flags |= (1 << 18);
        if ($this->sendPhotos) $flags |= (1 << 19);
        if ($this->sendVideos) $flags |= (1 << 20);
        if ($this->sendRoundvideos) $flags |= (1 << 21);
        if ($this->sendAudios) $flags |= (1 << 22);
        if ($this->sendVoices) $flags |= (1 << 23);
        if ($this->sendDocs) $flags |= (1 << 24);
        if ($this->sendPlain) $flags |= (1 << 25);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->untilDate);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $viewMessages = ($flags & (1 << 0)) ? true : null;
        $sendMessages = ($flags & (1 << 1)) ? true : null;
        $sendMedia = ($flags & (1 << 2)) ? true : null;
        $sendStickers = ($flags & (1 << 3)) ? true : null;
        $sendGifs = ($flags & (1 << 4)) ? true : null;
        $sendGames = ($flags & (1 << 5)) ? true : null;
        $sendInline = ($flags & (1 << 6)) ? true : null;
        $embedLinks = ($flags & (1 << 7)) ? true : null;
        $sendPolls = ($flags & (1 << 8)) ? true : null;
        $changeInfo = ($flags & (1 << 10)) ? true : null;
        $inviteUsers = ($flags & (1 << 15)) ? true : null;
        $pinMessages = ($flags & (1 << 17)) ? true : null;
        $manageTopics = ($flags & (1 << 18)) ? true : null;
        $sendPhotos = ($flags & (1 << 19)) ? true : null;
        $sendVideos = ($flags & (1 << 20)) ? true : null;
        $sendRoundvideos = ($flags & (1 << 21)) ? true : null;
        $sendAudios = ($flags & (1 << 22)) ? true : null;
        $sendVoices = ($flags & (1 << 23)) ? true : null;
        $sendDocs = ($flags & (1 << 24)) ? true : null;
        $sendPlain = ($flags & (1 << 25)) ? true : null;
        $untilDate = Deserializer::int32($stream);
        return new self(
            $untilDate,
            $viewMessages,
            $sendMessages,
            $sendMedia,
            $sendStickers,
            $sendGifs,
            $sendGames,
            $sendInline,
            $embedLinks,
            $sendPolls,
            $changeInfo,
            $inviteUsers,
            $pinMessages,
            $manageTopics,
            $sendPhotos,
            $sendVideos,
            $sendRoundvideos,
            $sendAudios,
            $sendVoices,
            $sendDocs,
            $sendPlain
        );
    }
}