<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Api;

use Amp\Future;
use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Stickers\AddStickerToSetRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stickers\ChangeStickerPositionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stickers\ChangeStickerRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stickers\CheckShortNameRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stickers\CreateStickerSetRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stickers\DeleteStickerSetRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stickers\RemoveStickerFromSetRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stickers\RenameStickerSetRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stickers\ReplaceStickerRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stickers\SetStickerSetThumbRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stickers\SuggestShortNameRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStickerSet;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputDocumentEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetAnimatedEmoji;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetAnimatedEmojiAnimations;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetDice;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetEmojiChannelDefaultStatuses;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetEmojiDefaultStatuses;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetEmojiDefaultTopicIcons;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetEmojiGenericAnimations;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetID;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetItem;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetPremiumGifts;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetShortName;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetTonGifts;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MaskCoords;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickerSet;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\StickerSet;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\StickerSetNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Stickers\SuggestedShortName;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "stickers" group.
 */
final readonly class StickersMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param string $title
     * @param string $shortName
     * @param list<InputStickerSetItem> $stickers
     * @param bool|null $masks
     * @param bool|null $emojis
     * @param bool|null $textColor
     * @param InputDocumentEmpty|InputDocument|null $thumb
     * @param string|null $software
     * @return Future<StickerSet|StickerSetNotModified|null>
     * @see https://core.telegram.org/method/stickers.createStickerSet
     * @api
     */
    public function createStickerSetAsync(AbstractInputUser|string|int $userId, string $title, string $shortName, array $stickers, ?bool $masks = null, ?bool $emojis = null, ?bool $textColor = null, ?AbstractInputDocument $thumb = null, ?string $software = null): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new CreateStickerSetRequest(userId: $userId, title: $title, shortName: $shortName, stickers: $stickers, masks: $masks, emojis: $emojis, textColor: $textColor, thumb: $thumb, software: $software));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
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
    public function createStickerSet(AbstractInputUser|string|int $userId, string $title, string $shortName, array $stickers, ?bool $masks = null, ?bool $emojis = null, ?bool $textColor = null, ?AbstractInputDocument $thumb = null, ?string $software = null): ?AbstractStickerSet
    {
        return $this->createStickerSetAsync(userId: $userId, title: $title, shortName: $shortName, stickers: $stickers, masks: $masks, emojis: $emojis, textColor: $textColor, thumb: $thumb, software: $software)->await();
    }

    /**
     * @param InputDocumentEmpty|InputDocument $sticker
     * @return Future<StickerSet|StickerSetNotModified|null>
     * @see https://core.telegram.org/method/stickers.removeStickerFromSet
     * @api
     */
    public function removeStickerFromSetAsync(AbstractInputDocument $sticker): Future
    {
        return $this->client->call(new RemoveStickerFromSetRequest(sticker: $sticker));
    }

    /**
     * @param InputDocumentEmpty|InputDocument $sticker
     * @return StickerSet|StickerSetNotModified|null
     * @see https://core.telegram.org/method/stickers.removeStickerFromSet
     * @api
     */
    public function removeStickerFromSet(AbstractInputDocument $sticker): ?AbstractStickerSet
    {
        return $this->removeStickerFromSetAsync(sticker: $sticker)->await();
    }

    /**
     * @param InputDocumentEmpty|InputDocument $sticker
     * @param int $position
     * @return Future<StickerSet|StickerSetNotModified|null>
     * @see https://core.telegram.org/method/stickers.changeStickerPosition
     * @api
     */
    public function changeStickerPositionAsync(AbstractInputDocument $sticker, int $position): Future
    {
        return $this->client->call(new ChangeStickerPositionRequest(sticker: $sticker, position: $position));
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
        return $this->changeStickerPositionAsync(sticker: $sticker, position: $position)->await();
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @param InputStickerSetItem $sticker
     * @return Future<StickerSet|StickerSetNotModified|null>
     * @see https://core.telegram.org/method/stickers.addStickerToSet
     * @api
     */
    public function addStickerToSetAsync(AbstractInputStickerSet $stickerset, InputStickerSetItem $sticker): Future
    {
        return $this->client->call(new AddStickerToSetRequest(stickerset: $stickerset, sticker: $sticker));
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
        return $this->addStickerToSetAsync(stickerset: $stickerset, sticker: $sticker)->await();
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @param InputDocumentEmpty|InputDocument|null $thumb
     * @param int|null $thumbDocumentId
     * @return Future<StickerSet|StickerSetNotModified|null>
     * @see https://core.telegram.org/method/stickers.setStickerSetThumb
     * @api
     */
    public function setStickerSetThumbAsync(AbstractInputStickerSet $stickerset, ?AbstractInputDocument $thumb = null, ?int $thumbDocumentId = null): Future
    {
        return $this->client->call(new SetStickerSetThumbRequest(stickerset: $stickerset, thumb: $thumb, thumbDocumentId: $thumbDocumentId));
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
        return $this->setStickerSetThumbAsync(stickerset: $stickerset, thumb: $thumb, thumbDocumentId: $thumbDocumentId)->await();
    }

    /**
     * @param string $shortName
     * @return Future<bool>
     * @see https://core.telegram.org/method/stickers.checkShortName
     * @api
     */
    public function checkShortNameAsync(string $shortName): Future
    {
        return $this->client->call(new CheckShortNameRequest(shortName: $shortName));
    }

    /**
     * @param string $shortName
     * @return bool
     * @see https://core.telegram.org/method/stickers.checkShortName
     * @api
     */
    public function checkShortName(string $shortName): bool
    {
        return (bool) $this->checkShortNameAsync(shortName: $shortName)->await();
    }

    /**
     * @param string $title
     * @return Future<SuggestedShortName|null>
     * @see https://core.telegram.org/method/stickers.suggestShortName
     * @api
     */
    public function suggestShortNameAsync(string $title): Future
    {
        return $this->client->call(new SuggestShortNameRequest(title: $title));
    }

    /**
     * @param string $title
     * @return SuggestedShortName|null
     * @see https://core.telegram.org/method/stickers.suggestShortName
     * @api
     */
    public function suggestShortName(string $title): ?SuggestedShortName
    {
        return $this->suggestShortNameAsync(title: $title)->await();
    }

    /**
     * @param InputDocumentEmpty|InputDocument $sticker
     * @param string|null $emoji
     * @param MaskCoords|null $maskCoords
     * @param string|null $keywords
     * @return Future<StickerSet|StickerSetNotModified|null>
     * @see https://core.telegram.org/method/stickers.changeSticker
     * @api
     */
    public function changeStickerAsync(AbstractInputDocument $sticker, ?string $emoji = null, ?MaskCoords $maskCoords = null, ?string $keywords = null): Future
    {
        return $this->client->call(new ChangeStickerRequest(sticker: $sticker, emoji: $emoji, maskCoords: $maskCoords, keywords: $keywords));
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
        return $this->changeStickerAsync(sticker: $sticker, emoji: $emoji, maskCoords: $maskCoords, keywords: $keywords)->await();
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @param string $title
     * @return Future<StickerSet|StickerSetNotModified|null>
     * @see https://core.telegram.org/method/stickers.renameStickerSet
     * @api
     */
    public function renameStickerSetAsync(AbstractInputStickerSet $stickerset, string $title): Future
    {
        return $this->client->call(new RenameStickerSetRequest(stickerset: $stickerset, title: $title));
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
        return $this->renameStickerSetAsync(stickerset: $stickerset, title: $title)->await();
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @return Future<bool>
     * @see https://core.telegram.org/method/stickers.deleteStickerSet
     * @api
     */
    public function deleteStickerSetAsync(AbstractInputStickerSet $stickerset): Future
    {
        return $this->client->call(new DeleteStickerSetRequest(stickerset: $stickerset));
    }

    /**
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @return bool
     * @see https://core.telegram.org/method/stickers.deleteStickerSet
     * @api
     */
    public function deleteStickerSet(AbstractInputStickerSet $stickerset): bool
    {
        return (bool) $this->deleteStickerSetAsync(stickerset: $stickerset)->await();
    }

    /**
     * @param InputDocumentEmpty|InputDocument $sticker
     * @param InputStickerSetItem $newSticker
     * @return Future<StickerSet|StickerSetNotModified|null>
     * @see https://core.telegram.org/method/stickers.replaceSticker
     * @api
     */
    public function replaceStickerAsync(AbstractInputDocument $sticker, InputStickerSetItem $newSticker): Future
    {
        return $this->client->call(new ReplaceStickerRequest(sticker: $sticker, newSticker: $newSticker));
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
        return $this->replaceStickerAsync(sticker: $sticker, newSticker: $newSticker)->await();
    }
}