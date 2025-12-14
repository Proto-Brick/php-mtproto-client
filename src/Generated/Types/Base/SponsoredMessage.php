<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/sponsoredMessage
 */
final class SponsoredMessage extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7dbf8673;
    
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
     * @param int|null $minDisplayDuration
     * @param int|null $maxDisplayDuration
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
        public readonly ?string $additionalInfo = null,
        public readonly ?int $minDisplayDuration = null,
        public readonly ?int $maxDisplayDuration = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->recommended) {
            $flags |= (1 << 5);
        }
        if ($this->canReport) {
            $flags |= (1 << 12);
        }
        if ($this->entities !== null) {
            $flags |= (1 << 1);
        }
        if ($this->photo !== null) {
            $flags |= (1 << 6);
        }
        if ($this->media !== null) {
            $flags |= (1 << 14);
        }
        if ($this->color !== null) {
            $flags |= (1 << 13);
        }
        if ($this->sponsorInfo !== null) {
            $flags |= (1 << 7);
        }
        if ($this->additionalInfo !== null) {
            $flags |= (1 << 8);
        }
        if ($this->minDisplayDuration !== null) {
            $flags |= (1 << 15);
        }
        if ($this->maxDisplayDuration !== null) {
            $flags |= (1 << 15);
        }
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
        if ($flags & (1 << 15)) {
            $buffer .= Serializer::int32($this->minDisplayDuration);
        }
        if ($flags & (1 << 15)) {
            $buffer .= Serializer::int32($this->maxDisplayDuration);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $recommended = (($flags & (1 << 5)) !== 0) ? true : null;
        $canReport = (($flags & (1 << 12)) !== 0) ? true : null;
        $randomId = Deserializer::bytes($stream);
        $url = Deserializer::bytes($stream);
        $title = Deserializer::bytes($stream);
        $message = Deserializer::bytes($stream);
        $entities = (($flags & (1 << 1)) !== 0) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $photo = (($flags & (1 << 6)) !== 0) ? AbstractPhoto::deserialize($stream) : null;
        $media = (($flags & (1 << 14)) !== 0) ? AbstractMessageMedia::deserialize($stream) : null;
        $color = (($flags & (1 << 13)) !== 0) ? PeerColor::deserialize($stream) : null;
        $buttonText = Deserializer::bytes($stream);
        $sponsorInfo = (($flags & (1 << 7)) !== 0) ? Deserializer::bytes($stream) : null;
        $additionalInfo = (($flags & (1 << 8)) !== 0) ? Deserializer::bytes($stream) : null;
        $minDisplayDuration = (($flags & (1 << 15)) !== 0) ? Deserializer::int32($stream) : null;
        $maxDisplayDuration = (($flags & (1 << 15)) !== 0) ? Deserializer::int32($stream) : null;

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
            $additionalInfo,
            $minDisplayDuration,
            $maxDisplayDuration
        );
    }
}