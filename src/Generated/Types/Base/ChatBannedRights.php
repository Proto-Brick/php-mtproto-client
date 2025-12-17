<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/chatBannedRights
 */
final class ChatBannedRights extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9f120418;
    
    public string $predicate = 'chatBannedRights';
    
    /**
     * @param int $untilDate
     * @param true|null $viewMessages
     * @param true|null $sendMessages
     * @param true|null $sendMedia
     * @param true|null $sendStickers
     * @param true|null $sendGifs
     * @param true|null $sendGames
     * @param true|null $sendInline
     * @param true|null $embedLinks
     * @param true|null $sendPolls
     * @param true|null $changeInfo
     * @param true|null $inviteUsers
     * @param true|null $pinMessages
     * @param true|null $manageTopics
     * @param true|null $sendPhotos
     * @param true|null $sendVideos
     * @param true|null $sendRoundvideos
     * @param true|null $sendAudios
     * @param true|null $sendVoices
     * @param true|null $sendDocs
     * @param true|null $sendPlain
     */
    public function __construct(
        public readonly int $untilDate,
        public readonly ?true $viewMessages = null,
        public readonly ?true $sendMessages = null,
        public readonly ?true $sendMedia = null,
        public readonly ?true $sendStickers = null,
        public readonly ?true $sendGifs = null,
        public readonly ?true $sendGames = null,
        public readonly ?true $sendInline = null,
        public readonly ?true $embedLinks = null,
        public readonly ?true $sendPolls = null,
        public readonly ?true $changeInfo = null,
        public readonly ?true $inviteUsers = null,
        public readonly ?true $pinMessages = null,
        public readonly ?true $manageTopics = null,
        public readonly ?true $sendPhotos = null,
        public readonly ?true $sendVideos = null,
        public readonly ?true $sendRoundvideos = null,
        public readonly ?true $sendAudios = null,
        public readonly ?true $sendVoices = null,
        public readonly ?true $sendDocs = null,
        public readonly ?true $sendPlain = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->viewMessages) {
            $flags |= (1 << 0);
        }
        if ($this->sendMessages) {
            $flags |= (1 << 1);
        }
        if ($this->sendMedia) {
            $flags |= (1 << 2);
        }
        if ($this->sendStickers) {
            $flags |= (1 << 3);
        }
        if ($this->sendGifs) {
            $flags |= (1 << 4);
        }
        if ($this->sendGames) {
            $flags |= (1 << 5);
        }
        if ($this->sendInline) {
            $flags |= (1 << 6);
        }
        if ($this->embedLinks) {
            $flags |= (1 << 7);
        }
        if ($this->sendPolls) {
            $flags |= (1 << 8);
        }
        if ($this->changeInfo) {
            $flags |= (1 << 10);
        }
        if ($this->inviteUsers) {
            $flags |= (1 << 15);
        }
        if ($this->pinMessages) {
            $flags |= (1 << 17);
        }
        if ($this->manageTopics) {
            $flags |= (1 << 18);
        }
        if ($this->sendPhotos) {
            $flags |= (1 << 19);
        }
        if ($this->sendVideos) {
            $flags |= (1 << 20);
        }
        if ($this->sendRoundvideos) {
            $flags |= (1 << 21);
        }
        if ($this->sendAudios) {
            $flags |= (1 << 22);
        }
        if ($this->sendVoices) {
            $flags |= (1 << 23);
        }
        if ($this->sendDocs) {
            $flags |= (1 << 24);
        }
        if ($this->sendPlain) {
            $flags |= (1 << 25);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->untilDate);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $viewMessages = (($flags & (1 << 0)) !== 0) ? true : null;
        $sendMessages = (($flags & (1 << 1)) !== 0) ? true : null;
        $sendMedia = (($flags & (1 << 2)) !== 0) ? true : null;
        $sendStickers = (($flags & (1 << 3)) !== 0) ? true : null;
        $sendGifs = (($flags & (1 << 4)) !== 0) ? true : null;
        $sendGames = (($flags & (1 << 5)) !== 0) ? true : null;
        $sendInline = (($flags & (1 << 6)) !== 0) ? true : null;
        $embedLinks = (($flags & (1 << 7)) !== 0) ? true : null;
        $sendPolls = (($flags & (1 << 8)) !== 0) ? true : null;
        $changeInfo = (($flags & (1 << 10)) !== 0) ? true : null;
        $inviteUsers = (($flags & (1 << 15)) !== 0) ? true : null;
        $pinMessages = (($flags & (1 << 17)) !== 0) ? true : null;
        $manageTopics = (($flags & (1 << 18)) !== 0) ? true : null;
        $sendPhotos = (($flags & (1 << 19)) !== 0) ? true : null;
        $sendVideos = (($flags & (1 << 20)) !== 0) ? true : null;
        $sendRoundvideos = (($flags & (1 << 21)) !== 0) ? true : null;
        $sendAudios = (($flags & (1 << 22)) !== 0) ? true : null;
        $sendVoices = (($flags & (1 << 23)) !== 0) ? true : null;
        $sendDocs = (($flags & (1 << 24)) !== 0) ? true : null;
        $sendPlain = (($flags & (1 << 25)) !== 0) ? true : null;
        $untilDate = Deserializer::int32($__payload, $__offset);

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