<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/businessChatLink
 */
final class BusinessChatLink extends AbstractBusinessChatLink
{
    public const CONSTRUCTOR_ID = 3031328367;
    
    public string $_ = 'businessChatLink';
    
    /**
     * @param string $link
     * @param string $message
     * @param int $views
     * @param list<AbstractMessageEntity>|null $entities
     * @param string|null $title
     */
    public function __construct(
        public readonly string $link,
        public readonly string $message,
        public readonly int $views,
        public readonly ?array $entities = null,
        public readonly ?string $title = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->entities !== null) $flags |= (1 << 0);
        if ($this->title !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->link);
        $buffer .= $serializer->bytes($this->message);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->title);
        }
        $buffer .= $serializer->int32($this->views);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $link = $deserializer->bytes($stream);
        $message = $deserializer->bytes($stream);
        $entities = ($flags & (1 << 0)) ? $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $title = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $views = $deserializer->int32($stream);
            return new self(
            $link,
            $message,
            $views,
            $entities,
            $title
        );
    }
}