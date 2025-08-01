<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateServiceNotification
 */
final class UpdateServiceNotification extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 3957614617;
    
    public string $_ = 'updateServiceNotification';
    
    /**
     * @param string $type
     * @param string $message
     * @param AbstractMessageMedia $media
     * @param list<AbstractMessageEntity> $entities
     * @param bool|null $popup
     * @param bool|null $invertMedia
     * @param int|null $inboxDate
     */
    public function __construct(
        public readonly string $type,
        public readonly string $message,
        public readonly AbstractMessageMedia $media,
        public readonly array $entities,
        public readonly ?bool $popup = null,
        public readonly ?bool $invertMedia = null,
        public readonly ?int $inboxDate = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->popup) $flags |= (1 << 0);
        if ($this->invertMedia) $flags |= (1 << 2);
        if ($this->inboxDate !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->inboxDate);
        }
        $buffer .= $serializer->bytes($this->type);
        $buffer .= $serializer->bytes($this->message);
        $buffer .= $this->media->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->entities);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $popup = ($flags & (1 << 0)) ? true : null;
        $invertMedia = ($flags & (1 << 2)) ? true : null;
        $inboxDate = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $type = $deserializer->bytes($stream);
        $message = $deserializer->bytes($stream);
        $media = AbstractMessageMedia::deserialize($deserializer, $stream);
        $entities = $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']);
            return new self(
            $type,
            $message,
            $media,
            $entities,
            $popup,
            $invertMedia,
            $inboxDate
        );
    }
}