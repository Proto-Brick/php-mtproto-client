<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/autoSaveSettings
 */
final class AutoSaveSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc84834ce;
    
    public string $_ = 'autoSaveSettings';
    
    /**
     * @param bool|null $photos
     * @param bool|null $videos
     * @param int|null $videoMaxSize
     */
    public function __construct(
        public readonly ?bool $photos = null,
        public readonly ?bool $videos = null,
        public readonly ?int $videoMaxSize = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->photos) $flags |= (1 << 0);
        if ($this->videos) $flags |= (1 << 1);
        if ($this->videoMaxSize !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int64($this->videoMaxSize);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $photos = ($flags & (1 << 0)) ? true : null;
        $videos = ($flags & (1 << 1)) ? true : null;
        $videoMaxSize = ($flags & (1 << 2)) ? Deserializer::int64($stream) : null;
        return new self(
            $photos,
            $videos,
            $videoMaxSize
        );
    }
}