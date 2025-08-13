<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/suggestedPost
 */
final class SuggestedPost extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe8e37e5;
    
    public string $predicate = 'suggestedPost';
    
    /**
     * @param true|null $accepted
     * @param true|null $rejected
     * @param AbstractStarsAmount|null $price
     * @param int|null $scheduleDate
     */
    public function __construct(
        public readonly ?true $accepted = null,
        public readonly ?true $rejected = null,
        public readonly ?AbstractStarsAmount $price = null,
        public readonly ?int $scheduleDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->accepted) {
            $flags |= (1 << 1);
        }
        if ($this->rejected) {
            $flags |= (1 << 2);
        }
        if ($this->price !== null) {
            $flags |= (1 << 3);
        }
        if ($this->scheduleDate !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 3)) {
            $buffer .= $this->price->serialize();
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->scheduleDate);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $accepted = (($flags & (1 << 1)) !== 0) ? true : null;
        $rejected = (($flags & (1 << 2)) !== 0) ? true : null;
        $price = (($flags & (1 << 3)) !== 0) ? AbstractStarsAmount::deserialize($stream) : null;
        $scheduleDate = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $accepted,
            $rejected,
            $price,
            $scheduleDate
        );
    }
}