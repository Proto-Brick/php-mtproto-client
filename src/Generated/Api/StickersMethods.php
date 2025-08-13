<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Stickers\AddStickerToSetRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stickers\ChangeStickerPositionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stickers\ChangeStickerRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stickers\CheckShortNameRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stickers\CreateStickerSetRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stickers\DeleteStickerSetRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stickers\RemoveStickerFromSetRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stickers\RenameStickerSetRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stickers\ReplaceStickerRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stickers\SetStickerSetThumbRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stickers\SuggestShortNameRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStickerSet;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputDocumentEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetAnimatedEmoji;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetAnimatedEmojiAnimations;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetDice;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetEmojiChannelDefaultStatuses;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetEmojiDefaultStatuses;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetEmojiDefaultTopicIcons;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetEmojiGenericAnimations;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetID;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetItem;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetPremiumGifts;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetShortName;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetTonGifts;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\MaskCoords;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractStickerSet;
use DigitalStars\MtprotoClient\Generated\Types\Messages\StickerSet;
use DigitalStars\MtprotoClient\Generated\Types\Messages\StickerSetNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Stickers\SuggestedShortName;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "stickers" group.
 */
final readonly class StickersMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param string $title
     * @param string $shortName
     * @param list<InputStickerSetItem> $stickers
     * @param bool|null $masks
     * @param bool|null $emojis
     * @param bool|null $textColor
     * @param InputDocumentEmpty|InputDocument|null $thumb
     * @param string|null $software
     * @return StickerSet|StickerSetNotModified|null
     * @see https://core.telegram.org/method/stickers.createStickerSet
     * @api
     */
    public function createStickerSet(AbstractInputUser $userId, string $title, string $shortName, array $stickers, ?bool $masks = null, ?bool $emojis = null, ?bool $textColor = null, ?AbstractInputDocument $thumb = null, ?string $software = null): ?AbstractStickerSet
    {
        return $this->client->callSync(new CreateStickerSetRequest($userId, $title, $shortName, $stickers, $masks, $emojis, $textColor, $thumb, $software));
    }

    /**
     * @param InputDocumentEmpty|InputDocument $sticker
     * @return StickerSet|StickerSetNotModified|null
     * @see https://core.telegram.org/method/stickers.removeStickerFromSet
     * @api
     */
    public function removeStickerFromSet(AbstractInputDocument $sticker): ?AbstractStickerSet
    {
        return $this->client->callSync(new RemoveStickerFromSetRequest($sticker));
    }

    /**
     * @param InputDocumentEmpty|InputDocument $sticker
     * @param int $position
     * @return StickerSet|StickerSetNotModified|null
     * @see https://core.telegram.org/method/stickers.changeStickerPosition
     * @api
     */
    public function changeStickerPosition(AbstractInputDocument $sticker, int $position): ?AbstractStickerSet
    {
        return $this->client->callSync(new ChangeStickerPositionRequest($sticker, $position));
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @param InputStickerSetItem $sticker
     * @return StickerSet|StickerSetNotModified|null
     * @see https://core.telegram.org/method/stickers.addStickerToSet
     * @api
     */
    public function addStickerToSet(AbstractInputStickerSet $stickerset, InputStickerSetItem $sticker): ?AbstractStickerSet
    {
        return $this->client->callSync(new AddStickerToSetRequest($stickerset, $sticker));
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @param InputDocumentEmpty|InputDocument|null $thumb
     * @param int|null $thumbDocumentId
     * @return StickerSet|StickerSetNotModified|null
     * @see https://core.telegram.org/method/stickers.setStickerSetThumb
     * @api
     */
    public function setStickerSetThumb(AbstractInputStickerSet $stickerset, ?AbstractInputDocument $thumb = null, ?int $thumbDocumentId = null): ?AbstractStickerSet
    {
        return $this->client->callSync(new SetStickerSetThumbRequest($stickerset, $thumb, $thumbDocumentId));
    }

    /**
     * @param string $shortName
     * @return bool
     * @see https://core.telegram.org/method/stickers.checkShortName
     * @api
     */
    public function checkShortName(string $shortName): bool
    {
        return (bool) $this->client->callSync(new CheckShortNameRequest($shortName));
    }

    /**
     * @param string $title
     * @return SuggestedShortName|null
     * @see https://core.telegram.org/method/stickers.suggestShortName
     * @api
     */
    public function suggestShortName(string $title): ?SuggestedShortName
    {
        return $this->client->callSync(new SuggestShortNameRequest($title));
    }

    /**
     * @param InputDocumentEmpty|InputDocument $sticker
     * @param string|null $emoji
     * @param MaskCoords|null $maskCoords
     * @param string|null $keywords
     * @return StickerSet|StickerSetNotModified|null
     * @see https://core.telegram.org/method/stickers.changeSticker
     * @api
     */
    public function changeSticker(AbstractInputDocument $sticker, ?string $emoji = null, ?MaskCoords $maskCoords = null, ?string $keywords = null): ?AbstractStickerSet
    {
        return $this->client->callSync(new ChangeStickerRequest($sticker, $emoji, $maskCoords, $keywords));
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @param string $title
     * @return StickerSet|StickerSetNotModified|null
     * @see https://core.telegram.org/method/stickers.renameStickerSet
     * @api
     */
    public function renameStickerSet(AbstractInputStickerSet $stickerset, string $title): ?AbstractStickerSet
    {
        return $this->client->callSync(new RenameStickerSetRequest($stickerset, $title));
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @return bool
     * @see https://core.telegram.org/method/stickers.deleteStickerSet
     * @api
     */
    public function deleteStickerSet(AbstractInputStickerSet $stickerset): bool
    {
        return (bool) $this->client->callSync(new DeleteStickerSetRequest($stickerset));
    }

    /**
     * @param InputDocumentEmpty|InputDocument $sticker
     * @param InputStickerSetItem $newSticker
     * @return StickerSet|StickerSetNotModified|null
     * @see https://core.telegram.org/method/stickers.replaceSticker
     * @api
     */
    public function replaceSticker(AbstractInputDocument $sticker, InputStickerSetItem $newSticker): ?AbstractStickerSet
    {
        return $this->client->callSync(new ReplaceStickerRequest($sticker, $newSticker));
    }
}