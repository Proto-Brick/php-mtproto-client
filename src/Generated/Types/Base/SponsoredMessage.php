<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/sponsoredMessage
 */
final class SponsoredMessage extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4d93a990;
    
    public string $predicate = 'sponsoredMessage';
    
    /**
     * @param string $randomId
     * @param string $url
     * @param string $title
     * @param string $message
     * @param string $buttonText
     * @param true|null $recommended
     * @param true|null $canReport
     * @param list<AbstractMessageEntity>|null $entities
     * @param AbstractPhoto|null $photo
     * @param AbstractMessageMedia|null $media
     * @param PeerColor|null $color
     * @param string|null $sponsorInfo
     * @param string|null $additionalInfo
     */
    public function __construct(
        public readonly string $randomId,
        public readonly string $url,
        public readonly string $title,
        public readonly string $message,
        public readonly string $buttonText,
        public readonly ?true $recommended = null,
        public readonly ?true $canReport = null,
        public readonly ?array $entities = null,
        public readonly ?AbstractPhoto $photo = null,
        public readonly ?AbstractMessageMedia $media = null,
        public readonly ?PeerColor $color = null,
        public readonly ?string $sponsorInfo = null,
        public readonly ?string $additionalInfo = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->recommended) $flags |= (1 << 5);
        if ($this->canReport) $flags |= (1 << 12);
        if ($this->entities !== null) $flags |= (1 << 1);
        if ($this->photo !== null) $flags |= (1 << 6);
        if ($this->media !== null) $flags |= (1 << 14);
        if ($this->color !== null) $flags |= (1 << 13);
        if ($this->sponsorInfo !== null) $flags |= (1 << 7);
        if ($this->additionalInfo !== null) $flags |= (1 << 8);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->randomId);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->message);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $this->photo->serialize();
        }
        if ($flags & (1 << 14)) {
            $buffer .= $this->media->serialize();
        }
        if ($flags & (1 << 13)) {
            $buffer .= $this->color->serialize();
        }
        $buffer .= Serializer::bytes($this->buttonText);
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::bytes($this->sponsorInfo);
        }
        if ($flags & (1 << 8)) {
            $buffer .= Serializer::bytes($this->additionalInfo);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $recommended = ($flags & (1 << 5)) ? true : null;
        $canReport = ($flags & (1 << 12)) ? true : null;
        $randomId = Deserializer::bytes($stream);
        $url = Deserializer::bytes($stream);
        $title = Deserializer::bytes($stream);
        $message = Deserializer::bytes($stream);
        $entities = ($flags & (1 << 1)) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $photo = ($flags & (1 << 6)) ? AbstractPhoto::deserialize($stream) : null;
        $media = ($flags & (1 << 14)) ? AbstractMessageMedia::deserialize($stream) : null;
        $color = ($flags & (1 << 13)) ? PeerColor::deserialize($stream) : null;
        $buttonText = Deserializer::bytes($stream);
        $sponsorInfo = ($flags & (1 << 7)) ? Deserializer::bytes($stream) : null;
        $additionalInfo = ($flags & (1 << 8)) ? Deserializer::bytes($stream) : null;

        return new self(
            $randomId,
            $url,
            $title,
            $message,
            $buttonText,
            $recommended,
            $canReport,
            $entities,
            $photo,
            $media,
            $color,
            $sponsorInfo,
            $additionalInfo
        );
    }
}