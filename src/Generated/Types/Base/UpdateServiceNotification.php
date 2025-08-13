<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateServiceNotification
 */
final class UpdateServiceNotification extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xebe46819;
    
    public string $predicate = 'updateServiceNotification';
    
    /**
     * @param string $type
     * @param string $message
     * @param AbstractMessageMedia $media
     * @param list<AbstractMessageEntity> $entities
     * @param true|null $popup
     * @param true|null $invertMedia
     * @param int|null $inboxDate
     */
    public function __construct(
        public readonly string $type,
        public readonly string $message,
        public readonly AbstractMessageMedia $media,
        public readonly array $entities,
        public readonly ?true $popup = null,
        public readonly ?true $invertMedia = null,
        public readonly ?int $inboxDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->popup) {
            $flags |= (1 << 0);
        }
        if ($this->invertMedia) {
            $flags |= (1 << 2);
        }
        if ($this->inboxDate !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->inboxDate);
        }
        $buffer .= Serializer::bytes($this->type);
        $buffer .= Serializer::bytes($this->message);
        $buffer .= $this->media->serialize();
        $buffer .= Serializer::vectorOfObjects($this->entities);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $popup = (($flags & (1 << 0)) !== 0) ? true : null;
        $invertMedia = (($flags & (1 << 2)) !== 0) ? true : null;
        $inboxDate = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($stream) : null;
        $type = Deserializer::bytes($stream);
        $message = Deserializer::bytes($stream);
        $media = AbstractMessageMedia::deserialize($stream);
        $entities = Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']);

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