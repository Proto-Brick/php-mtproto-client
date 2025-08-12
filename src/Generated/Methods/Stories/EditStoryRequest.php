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
 * @see https://core.telegram.org/method/stories.editStory
 */
final class EditStoryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb583ba46;
    
    public string $predicate = 'stories.editStory';
    
    public function getMethodName(): string
    {
        return 'stories.editStory';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param AbstractInputMedia|null $media
     * @param list<AbstractMediaArea>|null $mediaAreas
     * @param string|null $caption
     * @param list<AbstractMessageEntity>|null $entities
     * @param list<AbstractInputPrivacyRule>|null $privacyRules
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly ?AbstractInputMedia $media = null,
        public readonly ?array $mediaAreas = null,
        public readonly ?string $caption = null,
        public readonly ?array $entities = null,
        public readonly ?array $privacyRules = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->media !== null) $flags |= (1 << 0);
        if ($this->mediaAreas !== null) $flags |= (1 << 3);
        if ($this->caption !== null) $flags |= (1 << 1);
        if ($this->entities !== null) $flags |= (1 << 1);
        if ($this->privacyRules !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $this->media->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->mediaAreas);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->caption);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::vectorOfObjects($this->privacyRules);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}