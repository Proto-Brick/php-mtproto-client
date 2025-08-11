<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/businessChatLink
 */
final class BusinessChatLink extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb4ae666f;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->entities !== null) $flags |= (1 << 0);
        if ($this->title !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->link);
        $buffer .= Serializer::bytes($this->message);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->title);
        }
        $buffer .= Serializer::int32($this->views);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $link = Deserializer::bytes($stream);
        $message = Deserializer::bytes($stream);
        $entities = ($flags & (1 << 0)) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $title = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $views = Deserializer::int32($stream);
        return new self(
            $link,
            $message,
            $views,
            $entities,
            $title
        );
    }
}