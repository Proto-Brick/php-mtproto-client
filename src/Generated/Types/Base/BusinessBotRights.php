<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/businessBotRights
 */
final class BusinessBotRights extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa0624cf7;
    
    public string $predicate = 'businessBotRights';
    
    /**
     * @param true|null $reply
     * @param true|null $readMessages
     * @param true|null $deleteSentMessages
     * @param true|null $deleteReceivedMessages
     * @param true|null $editName
     * @param true|null $editBio
     * @param true|null $editProfilePhoto
     * @param true|null $editUsername
     * @param true|null $viewGifts
     * @param true|null $sellGifts
     * @param true|null $changeGiftSettings
     * @param true|null $transferAndUpgradeGifts
     * @param true|null $transferStars
     * @param true|null $manageStories
     */
    public function __construct(
        public readonly ?true $reply = null,
        public readonly ?true $readMessages = null,
        public readonly ?true $deleteSentMessages = null,
        public readonly ?true $deleteReceivedMessages = null,
        public readonly ?true $editName = null,
        public readonly ?true $editBio = null,
        public readonly ?true $editProfilePhoto = null,
        public readonly ?true $editUsername = null,
        public readonly ?true $viewGifts = null,
        public readonly ?true $sellGifts = null,
        public readonly ?true $changeGiftSettings = null,
        public readonly ?true $transferAndUpgradeGifts = null,
        public readonly ?true $transferStars = null,
        public readonly ?true $manageStories = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->reply) $flags |= (1 << 0);
        if ($this->readMessages) $flags |= (1 << 1);
        if ($this->deleteSentMessages) $flags |= (1 << 2);
        if ($this->deleteReceivedMessages) $flags |= (1 << 3);
        if ($this->editName) $flags |= (1 << 4);
        if ($this->editBio) $flags |= (1 << 5);
        if ($this->editProfilePhoto) $flags |= (1 << 6);
        if ($this->editUsername) $flags |= (1 << 7);
        if ($this->viewGifts) $flags |= (1 << 8);
        if ($this->sellGifts) $flags |= (1 << 9);
        if ($this->changeGiftSettings) $flags |= (1 << 10);
        if ($this->transferAndUpgradeGifts) $flags |= (1 << 11);
        if ($this->transferStars) $flags |= (1 << 12);
        if ($this->manageStories) $flags |= (1 << 13);
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
        $reply = ($flags & (1 << 0)) ? true : null;
        $readMessages = ($flags & (1 << 1)) ? true : null;
        $deleteSentMessages = ($flags & (1 << 2)) ? true : null;
        $deleteReceivedMessages = ($flags & (1 << 3)) ? true : null;
        $editName = ($flags & (1 << 4)) ? true : null;
        $editBio = ($flags & (1 << 5)) ? true : null;
        $editProfilePhoto = ($flags & (1 << 6)) ? true : null;
        $editUsername = ($flags & (1 << 7)) ? true : null;
        $viewGifts = ($flags & (1 << 8)) ? true : null;
        $sellGifts = ($flags & (1 << 9)) ? true : null;
        $changeGiftSettings = ($flags & (1 << 10)) ? true : null;
        $transferAndUpgradeGifts = ($flags & (1 << 11)) ? true : null;
        $transferStars = ($flags & (1 << 12)) ? true : null;
        $manageStories = ($flags & (1 << 13)) ? true : null;

        return new self(
            $reply,
            $readMessages,
            $deleteSentMessages,
            $deleteReceivedMessages,
            $editName,
            $editBio,
            $editProfilePhoto,
            $editUsername,
            $viewGifts,
            $sellGifts,
            $changeGiftSettings,
            $transferAndUpgradeGifts,
            $transferStars,
            $manageStories
        );
    }
}