<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/businessChatLink
 */
final class BusinessChatLink extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb4ae666f;
    
    public string $predicate = 'businessChatLink';
    
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
        if ($this->entities !== null) {
            $flags |= (1 << 0);
        }
        if ($this->title !== null) {
            $flags |= (1 << 1);
        }
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $link = Deserializer::bytes($__payload, $__offset);
        $message = Deserializer::bytes($__payload, $__offset);
        $entities = (($flags & (1 << 0)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessageEntity::class, 'deserialize']) : null;
        $title = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $views = Deserializer::int32($__payload, $__offset);

        return new self(
            $link,
            $message,
            $views,
            $entities,
            $title
        );
    }
}