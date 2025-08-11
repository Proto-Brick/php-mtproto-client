<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPrivacyRule;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMediaArea;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.sendStory
 */
final class SendStoryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe4e6694b;
    
    public string $_ = 'stories.sendStory';
    
    public function getMethodName(): string
    {
        return 'stories.sendStory';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputMedia $media
     * @param list<AbstractInputPrivacyRule> $privacyRules
     * @param int $randomId
     * @param bool|null $pinned
     * @param bool|null $noforwards
     * @param bool|null $fwdModified
     * @param list<AbstractMediaArea>|null $mediaAreas
     * @param string|null $caption
     * @param list<AbstractMessageEntity>|null $entities
     * @param int|null $period
     * @param AbstractInputPeer|null $fwdFromId
     * @param int|null $fwdFromStory
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputMedia $media,
        public readonly array $privacyRules,
        public readonly int $randomId,
        public readonly ?bool $pinned = null,
        public readonly ?bool $noforwards = null,
        public readonly ?bool $fwdModified = null,
        public readonly ?array $mediaAreas = null,
        public readonly ?string $caption = null,
        public readonly ?array $entities = null,
        public readonly ?int $period = null,
        public readonly ?AbstractInputPeer $fwdFromId = null,
        public readonly ?int $fwdFromStory = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) $flags |= (1 << 2);
        if ($this->noforwards) $flags |= (1 << 4);
        if ($this->fwdModified) $flags |= (1 << 7);
        if ($this->mediaAreas !== null) $flags |= (1 << 5);
        if ($this->caption !== null) $flags |= (1 << 0);
        if ($this->entities !== null) $flags |= (1 << 1);
        if ($this->period !== null) $flags |= (1 << 3);
        if ($this->fwdFromId !== null) $flags |= (1 << 6);
        if ($this->fwdFromStory !== null) $flags |= (1 << 6);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->peer->serialize();
        $buffer .= $this->media->serialize();
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::vectorOfObjects($this->mediaAreas);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->caption);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        $buffer .= Serializer::vectorOfObjects($this->privacyRules);
        $buffer .= Serializer::int64($this->randomId);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->period);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $this->fwdFromId->serialize();
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::int32($this->fwdFromStory);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}