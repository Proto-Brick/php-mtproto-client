<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/storyFwdHeader
 */
final class StoryFwdHeader extends AbstractStoryFwdHeader
{
    public const CONSTRUCTOR_ID = 3089555792;
    
    public string $_ = 'storyFwdHeader';
    
    /**
     * @param bool|null $modified
     * @param AbstractPeer|null $from
     * @param string|null $fromName
     * @param int|null $storyId
     */
    public function __construct(
        public readonly ?bool $modified = null,
        public readonly ?AbstractPeer $from = null,
        public readonly ?string $fromName = null,
        public readonly ?int $storyId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->modified) $flags |= (1 << 3);
        if ($this->from !== null) $flags |= (1 << 0);
        if ($this->fromName !== null) $flags |= (1 << 1);
        if ($this->storyId !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->from->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->fromName);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->storyId);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $modified = ($flags & (1 << 3)) ? true : null;
        $from = ($flags & (1 << 0)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $fromName = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $storyId = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
            return new self(
            $modified,
            $from,
            $fromName,
            $storyId
        );
    }
}