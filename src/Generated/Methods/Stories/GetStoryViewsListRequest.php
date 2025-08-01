<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Stories\AbstractStoryViewsList;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.getStoryViewsList
 */
final class GetStoryViewsListRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2127707223;
    
    public string $_ = 'stories.getStoryViewsList';
    
    public function getMethodName(): string
    {
        return 'stories.getStoryViewsList';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStoryViewsList::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param string $offset
     * @param int $limit
     * @param bool|null $justContacts
     * @param bool|null $reactionsFirst
     * @param bool|null $forwardsFirst
     * @param string|null $q
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly string $offset,
        public readonly int $limit,
        public readonly ?bool $justContacts = null,
        public readonly ?bool $reactionsFirst = null,
        public readonly ?bool $forwardsFirst = null,
        public readonly ?string $q = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->justContacts) $flags |= (1 << 0);
        if ($this->reactionsFirst) $flags |= (1 << 2);
        if ($this->forwardsFirst) $flags |= (1 << 3);
        if ($this->q !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->q);
        }
        $buffer .= $serializer->int32($this->id);
        $buffer .= $serializer->bytes($this->offset);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}